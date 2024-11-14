<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Validation\ValidationException;

class PriseEnChargeController extends Controller
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


    public function CaisseAuthCheck()
   {
    $user_role_id=Session::get('user_role_id');
    if ($user_role_id == 1) {
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

    public function index()
    {
        $this->UserAuthCheck();
        $this->AccueilAuthCheck();
        $centre_id=Session::get('centre_id');
        $all_prisenc=DB::table('tbl_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('last_consult_user_role_id',Null)
                ->where('tbl_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->orderBy('etat_consultation','DESC')
                ->get(); 

        $all_consult=DB::table('tbl_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('last_consult_user_role_id','!=',Null)
                ->where('tbl_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
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



        return view('prise_enc.all_prise_enc')->with(array(
                    'all_prisenc'=>$all_prisenc,             
                    'all_consult'=>$all_consult,             
                    'all_patient_h'=>$all_patient_h,             
                ));
    }


    public function caisse_analyses()
    {
       $this->CaisseAuthCheck();
       $centre_id=Session::get('centre_id');
       $all_analyse_nt=DB::table('tbl_analyse')
                ->join('tbl_patient','tbl_analyse.patient_id','=','tbl_patient.patient_id')
                ->join('tbl_type_analyse','tbl_analyse.id_type_analyse','=','tbl_type_analyse.id_type_analyse')
                ->where('statut_analyse',0)
                ->where('tbl_analyse.id_centre',$centre_id)
                ->select('tbl_analyse.*','tbl_patient.*','tbl_type_analyse.*')
                ->orderBy('created_at','DESC')
                ->get(); 

        $all_analyse_t=DB::table('tbl_analyse')
                ->join('tbl_patient','tbl_analyse.patient_id','=','tbl_patient.patient_id')
                ->join('tbl_type_analyse','tbl_analyse.id_type_analyse','=','tbl_type_analyse.id_type_analyse')
                ->where('statut_analyse',1)
                ->where('tbl_analyse.id_centre',$centre_id)
                ->select('tbl_analyse.*','tbl_patient.*','tbl_type_analyse.*')
                ->get();

       return view('prise_enc.all_analyses')->with(array(
                    'all_analyse_nt'=>$all_analyse_nt,             
                    'all_analyse_t'=>$all_analyse_t,                         
                ));
          
    }


    public function get_analyse(Request $request, $id)
    {
        $this->CaisseAuthCheck();

        $all_detail = DB::table('tbl_type_analyse')
                    ->where('id_type_analyse', $id)
                    ->first();

        $data=['prix' => $all_detail->prix_analyse];     
      
        return response()->json(array($data));
    }


    public function save_analyse(Request $request)
    {
        $this->CaisseAuthCheck();
        $tel=$request->telephone;

        if ($tel) {
        $data['telephone']=$request->telephone; 
        $data['nom_patient']=$request->nom_patient;
        $data['prenom_patient']=$request->prenom_patient; 
            $get_patient=DB::table('tbl_patient')->where('telephone',$tel)->first();

              if ($get_patient){
                  return back()->withInput()->with('error', 'Echec de validation : Veuillez rechercher le patient car il existe déjà sous le numéro renseigné');
              }

        $patient_id = DB::table('tbl_patient')->insertGetId($data);
        }else{
        $patient_id=$request->patient_id;
        }

        $datap['patient_id']=$patient_id; 
        $datap['id_centre']=$request->centre_id;
        $datap['user_id']=$request->specialiste;
        if ($request->id_type_analyse) {
        $datap['id_type_analyse']=$request->id_type_analyse; 
        $datap['prix']=$request->prix;
        }else{
        $datap['analyse']=$request->analyse; 
        $datap['prix_manuel']=$request->prix_manuel; 
        }
        DB::table('tbl_analyse')->insertGetId($datap);

        
        Alert::success('Info', 'Analyse enregistré dans le système.');
           return Redirect::to ('/prises-en-charges');

        
    }

    

    public function record_prisenc()
    {
        $this->UserAuthCheck();
        $this->AccueilAuthCheck();
        return view('prise_enc.add_prise_enc');
    }

    
    public function save_prisenc(Request $request)
    {
    $this->UserAuthCheck(); 
    $this->AccueilAuthCheck();
            
            $tel=$request->telephone;

            if ($tel) {
            $data['telephone']=$request->telephone; 
            $data['nom_patient']=$request->nom_patient;
            $data['prenom_patient']=$request->prenom_patient; 
            $data['nip']=$request->nip; 
            $data['email_patient']=$request->email_patient; 
            $data['nationalite']=$request->nationalite;
            $data['smatrimonial']=$request->smatrimonial; 
            $data['contact_urgence']=$request->contact_urgence; 
            $data['datenais']=$request->datenais; 
            $data['adresse']=$request->adresse; 
                $get_patient=DB::table('tbl_patient')->where('telephone',$tel)->first();

                  if ($get_patient){
                      return back()->withInput()->with('error', 'Echec de validation : Veuillez rechercher le patient car il existe déjà sous le numéro renseigné');
                  }

            $patient_id = DB::table('tbl_patient')->insertGetId($data);
            }else{
            $patient_id=$request->patient_id;
            }

            $user_role_id=Session::get('user_role_id');
            $user_id=Session::get('user_id');
            $datap['user_role_id']=$user_role_id; 
            $datap['patient_id']=$patient_id; 
            $datap['user_id']=$user_id; 
            $datap['id_centre']=$request->centre_id;
            $datap['maux']=$request->maux; 
            $datap['temp']=$request->temp; 
            $datap['observation']=$request->observation; 
            $id_prise_en_charge = DB::table('tbl_prise_en_charge')->insertGetId($datap);

            $datac['id_prise_en_charge']=$id_prise_en_charge; 
            $datac['id_centre']=$request->centre_id;
            $id_prise_en_charge = DB::table('tbl_caisse_prise_en_charge')->insertGetId($datac);
            
            
            Alert::success('Info', 'Nouveau patient enregistré dans les prises en charges.');
               return Redirect::to ('/prises-en-charges');
                

    }


    public function caisse_conslt()
    {
        $this->UserAuthCheck();
        $this->CaisseAuthCheck();
        $centre_id=Session::get('centre_id');
        $all_consulti=DB::table('tbl_caisse_prise_en_charge')  
                ->join('tbl_prise_en_charge','tbl_caisse_prise_en_charge.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('frais_consultation',NULL)
                ->where('tbl_caisse_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->get(); 

        $all_consultp=DB::table('tbl_caisse_prise_en_charge')
                ->join('tbl_prise_en_charge','tbl_caisse_prise_en_charge.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('frais_consultation','!=',NULL)
                ->where('tbl_caisse_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->get();



        return view('prise_enc.caisse_consultation')->with(array(
                    'all_consultp'=>$all_consultp,             
                    'all_consulti'=>$all_consulti,             
                ));;
    }



    public function pay_consult(Request $request)
    {
        $this->UserAuthCheck();
        $this->CaisseAuthCheck();
        $patient=DB::table('tbl_caisse_prise_en_charge')  
                ->join('tbl_prise_en_charge','tbl_caisse_prise_en_charge.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('tbl_caisse_prise_en_charge.id_prise_en_charge',$request->id_prise_en_charge)
                ->first();

       

        $user_role_id=Session::get('user_role_id');
        $user_id=Session::get('user_id');
        $data['id_prise_en_charge']=$request->id_prise_en_charge; 
        $data['frais_consultation']=$request->frais_consultation;
        $data['user_role_id']=$user_role_id;
        $data['user_id']=$user_id;
        DB::table('tbl_caisse_prise_en_charge')
        ->where('id_prise_en_charge',$request->id_prise_en_charge)
        ->update($data);

        
       
        DB::table('tbl_prise_en_charge')
        ->where('id_prise_en_charge',$request->id_prise_en_charge)
        ->update(['etat_consultation'=>1]);

    Alert::success('Info', $patient->prenom_patient.' '.$patient->nom_patient.' a payé ses frais de consultation');
        return Redirect::to ('/caisse-consultations');
    }


    public function caisse_hospt()
    {
        $this->UserAuthCheck();
        $this->CaisseAuthCheck();
        $centre_id=Session::get('centre_id');
        $all_hospiti=DB::table('tbl_caisse_prise_en_charge')  
                ->join('tbl_prise_en_charge','tbl_caisse_prise_en_charge.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('tbl_caisse_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->get(); 

        $all_hospitp=DB::table('tbl_caisse_prise_en_charge')
                ->join('tbl_prise_en_charge','tbl_caisse_prise_en_charge.id_prise_en_charge','=','tbl_prise_en_charge.id_prise_en_charge')
                ->join('tbl_patient','tbl_prise_en_charge.patient_id','=','tbl_patient.patient_id')
                ->where('frais_hospitalisation','!=',Null)
                ->where('tbl_caisse_prise_en_charge.id_centre',$centre_id)
                ->select('tbl_prise_en_charge.*','tbl_patient.*')
                ->get();



        return view('prise_enc.caisse_hospitalisation')->with(array(
                    'all_hospiti'=>$all_hospiti,             
                    'all_hospitp'=>$all_hospitp,             
                ));;
    }
    

    public function save_chambre(Request $request)
    {
    $this->UserAuthCheck(); 
    $this->AccueilAuthCheck();
                           
    $data['libelle_chambre']=$request->libelle_chambre; 
    $data['type_chambre']=$request->type_chambre; 
    $data['service']=$request->id_services; 
    $data['is_vip']=$request->is_vip; 
    $nbre_lits=$request->nbre_lit;
  dd($data);
    $chambre_id = DB::table('tbl_chambre')->insertGetId($data);

    for ($i=0; $i < $nbre_lits ; $i++) { 
    $datac['id_chambre']=$chambre_id;
    $datac['lit']="lit".$i+1; 
    DB::table('tbl_lits')->insertGetId($datac);
    }

    Alert::success('Info', 'Nouvelle chambre enregistrée');
    return Redirect::to ('/dashboard');
                

    }


    public function hospitaliser(Request $request)
    {
    $this->UserAuthCheck(); 
    $this->AccueilAuthCheck();

    $id_consultation=$request->id_consultation;
    $id_lit=$request->id_lit;

    DB::table('tbl_consultation')
            ->where('id_consultation',$id_consultation)
            ->update(['id_lit'=>$id_lit]);

    DB::table('tbl_lits')
            ->where('id_lit',$id_lit)
            ->update(['statut'=>1]);

     Alert::success('Info', 'Le patient a été hospitalisé.');
               return Redirect::to ('/dashboard');
    }


}
