@extends('layout')
@section('user_content')
<?php  
 $user_role_id=Session::get('user_role_id');
 $user_id=Session::get('user_id');
 $centre_id=Session::get('centre_id');

?>

<!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
               <div class="col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Gestion des prises en charge de patients</h5>
                  </div>
                  <div class="card-body">
                     <a href="{{URL::to('enregistrer-prise-en-charge')}}" class="btn btn-primary btn-lg">
                        Enregistrer une nouvelle prise en charge
                      </a>
                    <div class="custom-tabs-container">
                      <ul class="nav nav-tabs justify-content-center" id="customTab4" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="tab-oneAAA" data-bs-toggle="tab" href="#oneAAA" role="tab"
                            aria-controls="oneAAA" aria-selected="true">Patients en attente</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-twoAAA" data-bs-toggle="tab" href="#twoAAA" role="tab"
                            aria-controls="twoAAA" aria-selected="false">Patients en consultation</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-threeAAA" data-bs-toggle="tab" href="#threeAAA" role="tab"
                            aria-controls="threeAAA" aria-selected="false">En observation</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="customTabContent">
                        <div class="tab-pane fade show active" id="oneAAA" role="tabpanel">
                          <!-- Row starts -->
                          <div class="row gx-3">
                             <div class="col-sm-12">
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <h5 class="card-title">Patients en attente</h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="">
                                      <div class="table-responsive">
                                        <table class="table truncate align-middle" id="example">
                                          <thead>
                                            <tr>
                                              <th width="30px">&nbsp;</th>
                                              <th width="60px">Patient</th>
                                              <th width="100px">Mal/Maux </th>
                                              <th width="100px">nip/numero</th>
                                              <th width="100px">Adresse</th>
                                              <th width="100px">G Sanguin</th>
                                              <th width="100px">Naissance</th>
                                              </th>
                                              <th width="100px">
                                              Observation
                                              </th>
                                              <th width="100px">Actions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                           @foreach($all_prisenc as $v_prisenc) 
                                            <tr>
                                              <td>
                                                <a href="#" class="me-1 icon-box sm bg-light rounded-circle">
                                                @if($v_prisenc->sexe_patient == 'F')
                                                <img style="width:30px; height:30px;" src="{{asset('frontend/F.png')}}" alt="sexe')}}" class="rounded-circle img-3x">
                                                @else
                                                <img style="width:30px; height:30px;" src="{{asset('frontend/M.png')}}" alt="sexe" class="rounded-circle img-3x">
                                                @endif
                                                </a>
                                              </td>
                                              <td>
                                                {{$v_prisenc->prenom_patient}}
                                                {{$v_prisenc->nom_patient}}
                                              </td>
                                              <td><h4><span class="badge bg-danger">{{$v_prisenc->maux}}</span></h4></td>
                                              <td>{{$v_prisenc->telephone}}</td>
                                              <td>{{$v_prisenc->adresse}}</td>
                                              <td><h4><span class="badge bg-primary">O+</span></h4></td>
                                              <td>
                                                {{$v_prisenc->datenais}}
                                              </td>
                                              <td>{{$v_prisenc->observation}}</td>
                                              
                                              <td>
                                              @if($v_prisenc->last_consult_user_role_id == NULL && $v_prisenc->etat_consultation == 0)
                                              <form action="{{url('send-consult')}}" method="POST">
                                                  {{csrf_field()}}
                                              <input type="hidden" name="id_prise_en_charge" value="{{$v_prisenc->id_prise_en_charge}}">
                                              <select id="myDropdown" class="form-select btn btn-outline-danger" name="specialiste">
                                                <option selected>Urgence</option>
                                               <optgroup label="Spécialistes">
                                               
                                              <?php 

                                                $all_specialiste=DB::table('user_roles')
                                                ->join('users','user_roles.user_role_id','=','users.user_role_id')
                                                ->join('personnel','users.email','=','personnel.email')
                                                ->where('is_consult',1)
                                                ->where('personnel.id_centre',$centre_id)
                                                ->get(); 
                                                foreach ($all_specialiste as $v_specialist){ ?>  
                                                <option value="{{$v_specialist->user_id}}">{{$v_specialist->designation}}
                                                {{$v_specialist->prenom}}
                                                {{$v_specialist->nom}}</option>
                                              <?php } ?>
                                               </optgroup>
                                              </select>
                                            </form>
                                              @else
                                              <form action="{{url('send-consult')}}" method="POST">
                                                  {{csrf_field()}}
                                              <input type="hidden" name="id_prise_en_charge" value="{{$v_prisenc->id_prise_en_charge}}">
                                              <select id="myDropdown" class="form-select btn btn-outline-info" name="specialiste">
                                                <option selected>Envoyer vers</option>
                                               <optgroup label="Spécialistes">
                                               
                                              <?php 

                                                $all_specialiste=DB::table('user_roles')
                                                ->join('users','user_roles.user_role_id','=','users.user_role_id')
                                                ->join('personnel','users.email','=','personnel.email')
                                                ->where('is_consult',1)
                                                ->where('personnel.id_centre',$centre_id)
                                                ->get(); 
                                                foreach ($all_specialiste as $v_specialist){ ?>  
                                                <option value="{{$v_specialist->user_id}}">{{$v_specialist->designation}}.
                                                {{$v_specialist->prenom}}
                                                {{$v_specialist->nom}}</option>
                                              <?php } ?>
                                               </optgroup>
                                              </select>
                                            </form>
                                              
                                              @endif

                                              </td>
                                            </tr>
                                          @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!-- Row ends -->
                        </div>
                        <div class="tab-pane fade" id="twoAAA" role="tabpanel">
                          <!-- Row starts -->
                          <div class="row gx-3">
                          <div class="col-sm-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <h5 class="card-title">Patients en consultation</h5>
                              </div>
                              <div class="card-body">
                                <div class="table-outer">
                                  <div class="table-responsive">
                                    <table class="table table-striped truncate m-0">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th>Patient</th>
                                          <th>Mal/Maux</th>
                                          <th>Situation matrimonial</th>
                                          <th>Contact à appeller</th>
                                          <th>Spécialiste actuel</th>
                                          <th>Date consultation</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($all_consult as $v_consult)    
                                        <tr>
                                          <td>
                                          </td>
                                          <td>{{$v_consult->nom_patient}}
                                          {{$v_consult->prenom_patient}}</td>
                                          <td>{{$v_consult->maux}}</td>
                                          <td>{{$v_consult->smatrimonial}}</td>
                                          <td>{{$v_consult->contact_urgence}}</td>
                                          <?php 
                                          $all_specialiste=DB::table('users')
                                                ->join('personnel','users.email','=','personnel.email')
                                                ->join('user_roles','users.user_role_id','=','user_roles.user_role_id')
                                                ->join('tbl_consultation','users.user_id','=','tbl_consultation.user_id')
                                                ->select('users.*','personnel.*','user_roles.*','tbl_consultation.*')
                                                ->where('users.user_id',$v_consult->last_consult_user_id)
                                                ->first();


                                          ?>   
                                          <td>
                                            @if($all_specialiste != NULL)
                                            {{$all_specialiste->designation}}. {{$all_specialiste->prenom}} {{$all_specialiste->nom}}
                                            @endif
                                          </td>
                                          <td>
                                            @if($all_specialiste != NULL)
                                            {{$all_specialiste->conslt_created_at}}
                                            @endif
                                          </td>
                                        <?php ?>
                                        </tr>
                                      @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                          <!-- Row ends -->
                        </div>


                         <div class="tab-pane fade" id="threeAAA" role="tabpanel">
                          <!-- Row starts -->
                          <div class="row gx-3">
                          <div class="col-sm-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <h5 class="card-title">Patients en observation</h5>
                              </div>
                              <div class="card-body">
                                <div class="table-outer">
                                  <div class="table-responsive">
                                    <table class="table table-striped truncate m-0">
                                      <thead>
                                        <tr>
                                          <th>CHAMBRE</th>
                                          <th>LIT</th>
                                          <th>Patient</th>
                                          <th>Mal/Maux</th>
                                          <th>Situation matrimonial</th>
                                          <th>Contact à appeller</th>
                                          <th>Spécialiste actuel</th>
                                          <th>Date consultation</th>
                                          <th></th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($all_patient_h as $v_consulted)    
                                        <tr>
                                          <td>CH-{{$v_consulted->libelle_chambre}}</td>
                                          <td>{{$v_consulted->libelle_chambre}}</td>
                                          <td>{{$v_consulted->nom_patient}}
                                          {{$v_consulted->prenom_patient}}</td>
                                          <td>{{$v_consulted->maux}}</td>
                                          <td>{{$v_consulted->smatrimonial}}</td>
                                          <td>{{$v_consulted->contact_urgence}}</td>
                                          <?php 
                                          $all_special=DB::table('users')
                                                ->join('personnel','users.email','=','personnel.email')
                                                ->join('user_roles','users.user_role_id','=','user_roles.user_role_id')
                                                ->join('tbl_consultation','users.user_id','=','tbl_consultation.user_id')
                                                ->select('users.*','personnel.*','user_roles.*','tbl_consultation.*')
                                                ->where('users.user_id',$v_consulted->last_consult_user_id)
                                                ->first();
                                          ?>   
                                          <td>
                                            {{$all_special->designation}}. {{$all_special->prenom}} {{$all_special->nom}}
                                          </td>
                                          <td>
                                            {{$all_special->conslt_created_at}}
                                          </td>
                                           <td>
                                              
                                              <a title="Dossier medial du patient" class="btn btn-outline-success" href="{{URL::to('traitement-patient/'.$v_consulted->id_consultation.'/'.$v_consulted->patient_id)}}">
                                              <i class="ri-file-edit-fill"></i></a>                    
                                              </td>
                                        <?php ?>
                                        </tr>
                                      @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                          <!-- Row ends -->
                        </div>


                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>





              
              
              
            
              
            
              
            
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

          
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@section('Datatable')
    <script>
      $(document).ready(function() {
      $("#example").DataTable();
    });
      $("select").change(function(){
      if(confirm('Cliquez OK pour envoyer le patient vers le spécialiste')){
          {this.form.submit()} 
      }
      else $("select option:selected").prop("selected", false);
    });
    </script>
    </script>
    @endsection
@endsection