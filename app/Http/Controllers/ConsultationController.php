<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Validation\ValidationException;
use Session;
use DB;
use Alert;

class ConsultationController extends Controller
{
    public function UserAuthCheck()
   {
    $user_id=Session::get('user_id');
    if ($user_id) {
        return;
        }
        else 
        {
            return Redirect::to('/')->send();
        }

    }

    public function AccueilAuthCheck()
   {
    $user_role_id=Session::get('user_role_id');
    if ($user_role_id == 0) {
        return;
        }
        else 
        {
            return Redirect::to('/')->send();
        }

    }

    public function SpecialisteAuthCheck()
   {
    $user_role_id=Session::get('user_role_id');
    if ($user_role_id != 0 && $user_role_id != 1 && $user_role_id != 9) {
        return;
        }
        else 
        {
            return Redirect::to('/')->send();
        }

    }



    public function send_consult(Request $request)
    {
            $this->UserAuthCheck(); 
            $this->AccueilAuthCheck();
            $user_id=$request->specialiste;
            $id_prise_en_charge=$request->id_prise_en_charge;  
            $get_user_role=DB::table('users')
                            ->join('personnel','users.email','=','personnel.email')
                            ->select('users.*','personnel.*')
                            ->where('user_id',$user_id)
                            ->first();

            $user_role_id=$get_user_role->user_role_id;
            $qualification=$get_user_role->qualification;
            $prenom=$get_user_role->prenom;
            $nom=$get_user_role->nom;

            $data['id_prise_en_charge']=$id_prise_en_charge; 
            $data['user_id']=$user_id; 
            $data['user_role_id']=$user_role_id;
            
            DB::table('tbl_consultation')->insertGetId($data);

            $datac['last_consult_user_role_id']=$user_role_id; 
            $datac['last_consult_user_id']=$user_id; 
            DB::table('tbl_prise_en_charge')
                ->where('id_prise_en_charge',$id_prise_en_charge)
                ->update($datac);
   
            Alert::success('Info', 'Patient affecté pour consultation vers '.$qualification.' '.$prenom.' '.$nom);
               return Redirect::to ('/prises-en-charges');
                

    }



    public function consultation()
    {
        
        $this->SpecialisteAuthCheck();
        $user_id=Session::get('user_id');
        $centre_id=Session::get('centre_id');
        $all_patient_nt=DB::table('tbl_consultation')
                ->join('tbl_prise_en_charge','tbl_consultation.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')              
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('etat_traitement',0)
                ->where([
                      ['tbl_consultation.user_id',$user_id],
                      ['tbl_prise_en_charge.id_centre',$centre_id],
                  ]) 
               
                ->select('tbl_prise_en_charge.*','tbl_patient.*','tbl_consultation.*')
                ->orderBy('etat_consultation','DESC')
                ->get(); 

        $all_patient_t=DB::table('tbl_consultation')
                ->join('tbl_prise_en_charge','tbl_consultation.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')             
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where([
                      ['tbl_consultation.user_id',$user_id],
                      ['tbl_prise_en_charge.id_centre',$centre_id],
                  ]) 
                ->where('etat_hospitalisation',1)
                ->select('tbl_prise_en_charge.*','tbl_patient.*','tbl_consultation.*')
                ->groupBy('tbl_prise_en_charge.patient_id')
                ->orderBy('etat_consultation','DESC')
                ->get();

        $all_patient_h=DB::table('tbl_consultation')
                  ->join('tbl_lits','tbl_consultation.id_lit','=','tbl_lits.id_lit')
                  ->join('tbl_chambre','tbl_lits.id_chambre','=','tbl_chambre.id_chambre')
                  ->join('tbl_prise_en_charge','tbl_consultation.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')              
                  ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                  ->where('is_hospitalisation',1)
                  ->where('tbl_prise_en_charge.id_centre',$centre_id)
                  ->select('tbl_prise_en_charge.*','tbl_patient.*','tbl_consultation.*','tbl_chambre.*','tbl_lits.*')
                  ->groupBy('tbl_prise_en_charge.patient_id')
                  ->orderBy('etat_consultation','DESC')
                  ->get();



        return view('Consult.patients_nt')->with(array(
                    'all_patient_nt'=>$all_patient_nt,             
                    'all_patient_t'=>$all_patient_t,             
                    'all_patient_h'=>$all_patient_h,             
                ));;
    }


    public function gestion_analyses()
    {
        $this->SpecialisteAuthCheck();
        $user_id=Session::get('user_id');
        $centre_id=Session::get('centre_id');
        $all_analyse_nt=DB::table('tbl_analyse')       
                ->join('tbl_patient','tbl_analyse.patient_id','=','tbl_patient.patient_id') 
                ->join('tbl_type_analyse','tbl_analyse.id_type_analyse','=','tbl_type_analyse.id_type_analyse')
                ->where('statut_analyse',0)
                ->where([
                      ['user_id',$user_id],
                      ['tbl_analyse.id_centre',$centre_id],
                  ]) 
               
                ->select('tbl_analyse.*','tbl_patient.*','tbl_type_analyse.*')
                ->orderBy('created_at','DESC')
                ->get(); 

        $all_analyse_t=DB::table('tbl_analyse')       
                ->join('tbl_patient','tbl_analyse.patient_id','=','tbl_patient.patient_id')
                ->join('tbl_type_analyse','tbl_analyse.id_type_analyse','=','tbl_type_analyse.id_type_analyse')
                ->where('statut_analyse',1)
                ->where([
                      ['user_id',$user_id],
                      ['tbl_analyse.id_centre',$centre_id],
                  ]) 
                ->select('tbl_analyse.*','tbl_patient.*','tbl_type_analyse.*')
                ->orderBy('created_at','DESC')
                ->get(); 

        return view('Analys.gestion_analyse')->with(array(
                    'all_analyse_nt'=>$all_analyse_nt,             
                    'all_analyse_t'=>$all_analyse_t,                  
                ));;
    }



     public function traitement_patient($id_consultation,$patient_id)
    {
        $this->SpecialisteAuthCheck();
        $user_id=Session::get('user_id');
    

        $all_details=DB::table('tbl_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('tbl_prise_en_charge.patient_id',$patient_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->orderBy('created_at','DESC')
                ->get();
        
        return view('Consult.traitement_patient')->with(array(
                    'all_details'=>$all_details,                         
                    'id_consultation'=>$id_consultation,                         
                ));;
    }



    public function save_traitement(Request $request)
    {
        $this->UserAuthCheck(); 
        $this->SpecialisteAuthCheck();

        $etat_hospitalisation=$request->etat_hospitalisation;
        $id_consultation=$request->id_consultation;
        $id_prise_en_charge=$request->id_prise_en_charge;
        $ordonnance=$request->ordonnance;
        $user_id=$request->specialiste;
        $patient_id=$request->patient_id;
        $observation=$request->observation;
        $diagnostic=$request->diagnostic;

        $file=$request->file('fichier_joint');
        

        
        if ($etat_hospitalisation == 0 && $user_id > 0) {
        $get_user_role=DB::table('users')
            ->join('personnel','users.email','=','personnel.email')
            ->select('users.*','personnel.*')
            ->where('user_id',$user_id)
            ->first();

            $user_role_id=$get_user_role->user_role_id;
            $qualification=$get_user_role->qualification;
            $prenom=$get_user_role->prenom;
            $nom=$get_user_role->nom;

            
            
            $datau['diagnostic']=$diagnostic;
            $datau['observation']=$observation;
            $datau['etat_traitement']=1;
                if ($file) {
                $file_name=$file->getClientOriginalName();
                $ext=strtolower($file->getClientOriginalExtension());
                $file_full_name=$file_name;
                $upload_path= "Uploads/consultations/";
                $file_url=$upload_path.$file_full_name;
                
                $success=$file->move($upload_path,$file_full_name);
                if ($success) {
            $datau['fichier_joint']=$file_url;
                    }
                }      
            DB::table('tbl_consultation')
                ->where('id_consultation',$id_consultation)
                ->update($datau);

            $datap['last_consult_user_role_id']=$user_role_id; 
            $datap['last_consult_user_id']=$user_id; 
            DB::table('tbl_prise_en_charge')
                ->where('id_prise_en_charge',$id_prise_en_charge)
                ->update($datap);

            $datac['user_id']=$user_id; 
            $datac['user_role_id']=$user_role_id;
            $datac['id_prise_en_charge']=$id_prise_en_charge;
            DB::table('tbl_consultation')->insertGetId($datac);
            

            Alert::success('Info', 'Patient affecté pour consultation vers '.$qualification.' '.$prenom.' '.$nom);
               return Redirect::to ('/consultations');
        }elseif ($etat_hospitalisation == 1 || $user_id == 0) {
            
        $get_patient=DB::table('tbl_patient')
            ->where('patient_id',$patient_id)
            ->first();
            $prenom_patient=$get_patient->prenom_patient;
            $nom_patient=$get_patient->nom_patient;

            if ($user_id == 0) {
            $data['is_hospitalisation']=1;
            }
            $data['diagnostic']=$diagnostic;
            $data['observation']=$observation;
            $data['etat_traitement']=1;
                if ($file) {
                $file_name=$file->getClientOriginalName();
                $ext=strtolower($file->getClientOriginalExtension());
                $file_full_name=$file_name;
                $upload_path= "Uploads/consultations/";
                $file_url=$upload_path.$file_full_name;
                
                $success=$file->move($upload_path,$file_full_name);
                if ($success) {
            $data['fichier_joint']=$file_url;
                    }
                }      
            DB::table('tbl_consultation')
                ->where('id_consultation',$id_consultation)
                ->update($data);

            $datap['ordonnance']=$ordonnance;
            $datap['etat_hospitalisation']=$etat_hospitalisation;
            DB::table('tbl_prise_en_charge')
                ->where('id_prise_en_charge',$id_prise_en_charge)
                ->update($datap);

            Alert::success('Info', 'Prise en charge du patient '.$prenom_patient.' '.$nom_patient.' terminée. Le traitement est cloturé');
               return Redirect::to ('/consultations');

        }
            
       
                

    }




        


}
