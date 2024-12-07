@extends('layout')
@section('user_content')
<?php  
 $user_role_id=Session::get('user_role_id');
 $user_id=Session::get('user_id');
 $centre_id=Session::get('centre_id');
?>
    <div class="app-body">
     <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card mb-3">
          <div class="card-header">
              <h5 class="card-title">Analyses - Enregistrer des analyses</h5>
          </div>

          <div class="card-body">
              <form class="row" action="{{ url('/save-analyse') }}" method="POST">
                  {{csrf_field()}}
              <input type="hidden" name="centre_id" value="{{$centre_id}}">
              <div class="row col-md-12 mb-3" id="enleverEE">
              <label class="classItems" for="selectError1"> Clients </label>
              <div class="controls col-10">
              <select class="form-control form-select" id="patient_id" name="patient_id" data-target="#serv" data-source="get-detail/id">
                   <?php 

                      $all_patients=DB::table('tbl_patient')
                        ->orderBy('patient_id','ASC')  
                      ->get(); 
                            foreach ($all_patients as $v_patient){ ?>  
              <option value="{{$v_patient->patient_id}}">{{$v_patient->prenom_patient}} {{$v_patient->nom_patient}} -- {{$v_patient->nip}} -- {{$v_patient->telephone}}</option>
            <?php } ?>
                </select>
              </div>
            <div class="controls col-2">
              <a class="btn btn-warning btn-pill" href="#" onClick="THEFUNCTION2(this.selectedIndex);">Nouveau Client</a>
            </div>
          </div> 


        <div class="row" style="display:none;" id="enleverR">
        <a  href="javascript:window.location.reload(history.go(-1))">Retour</a>
               <div class="col-md-6">
                  <label for="phone1">Télephone du client</label><br>
                  <input type="tel" class="form-control" type="tel" placeholder="Contact Whatsapp/Appel" id="phone1" name="mobile_number" required="" />
                  <input type="hidden" id='lnai' name="telephone">
               </div>

               <div class="col-md-3">
               <label for="validationCustom01" class="form-label">Nom</label>
                <input type="text" name="nom_patient" class="form-control" id="validationCustom01" value="Mark"/>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Prénom</label>
                <input type="text" name="prenom_patient" class="form-control" id="validationCustom02" value="Otto"/>
                <div class="valid-feedback">Looks good!</div>
              </div>
          </div>

          <div class="row g-2" id="enleverE">

                    <div class="col-md-6">
                      <div class="form-floating">
                        <select class="link-select form-control" name="id_type_analyse" data-target="#service" data-source="get-analyse/id">

                            <option style="font-weight: bold;"> Selectionner </option>                             
                                <?php
                                    $all_analyse = DB::table('tbl_type_analyse')
                                        ->where('id_centre',$centre_id)     
                                        ->get();

                                  foreach ($all_analyse as $key => $v_sd){ ?>
                  
                                  <option value="{{$v_sd->id_type_analyse}}" style="font-weight: bold; color:green;">{{$v_sd->libelle_analyse}}</option>
                                <?php }  ?>
                                                                            
                                </select>
                        <label for="address">Type d'analyses</label>
                      </div>
                    </div>
                    <!-- contrevenant -->


                      <!-- contrevenant -->
                    <div class="col-md-6">
                      <div class="form-floating">
                          <select class="link-select form-control" name="prix" id="service">

                          </select>  
                        <label for="address">Prix de l'analyse</label>
                      </div>
                    </div>
                    <div class="col-md-12 align-items-center">
                      <a  href="#" onClick="THEFUNCTION(this.selectedIndex);">Saisir manuellement le type et le prix de l'analyse</a>
                    </div>       
                  </div>
                          <!-- contrevenant -->

                    <div class="row g-2"style="display:none; "id="enlever">
                        <div class="col-md-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="analyse">
                              <label for="address">Saisir l'analyse</label>
                            </div>
                        </div>
                          <!-- contrevenant -->


                            <!-- contrevenant -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="prix_manuel"> 
                              <label for="address">Saisir le prix de l'analyse</label>
                            </div>
                        </div>

                        <a  href="javascript:window.location.reload(history.go(-1))">Annuler</a>
                    </div>

                    <div class="col-md-12">
                    <div class="form-floating">
                    <select id="myDropdown" class=" drop form-select btn btn-outline-" name="specialiste">
<<<<<<< HEAD
                        <option selected>Envoyer au</option>
                       <optgroup label="Laboratoire">
=======
                        <option selected>Affecter à</option>
                       <optgroup label="Spécialistes">
>>>>>>> dce8b8f07c046481e7dfa6b85125c0dfb5d04f36
                       
                      <?php 

                        $all_specialiste=DB::table('user_roles')
                        ->join('users','user_roles.user_role_id','=','users.user_role_id')
                        ->join('personnel','users.email','=','personnel.email')
                        ->where('is_consult',2)
                        ->get(); 
                        foreach ($all_specialiste as $v_specialist){ ?>  
<<<<<<< HEAD
                        <option value="{{$v_specialist->user_id}}">{{$v_specialist->title}}.
=======
                        <option value="{{$v_specialist->user_id}}">{{$v_specialist->designation}}.
>>>>>>> dce8b8f07c046481e7dfa6b85125c0dfb5d04f36
                        {{$v_specialist->prenom}}
                        {{$v_specialist->nom}}</option>
                      <?php } ?>
                       </optgroup>
                      </select>
                     </div> 
                   </div>
                   </form> 
                  </div> 
                </div>
              </div>
             </div>
            </div>
           <!-- Row ends -->

    <div class="app-body">
     <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card mb-3">
          <div class="card-header">
              <h5 class="card-title">Analyses</h5>
          </div>
          
          <div class="card-body">
            <div class="custom-tabs-container">
              <ul class="nav nav-tabs justify-content-center" id="customTab4" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="tab-oneAAA" data-bs-toggle="tab" href="#oneAAA" role="tab"
                    aria-controls="oneAAA" aria-selected="true">Analyses non traités</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="tab-twoAAA" data-bs-toggle="tab" href="#twoAAA" role="tab"
                    aria-controls="twoAAA" aria-selected="false">Analyses traités</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                  <a class="nav-link" id="tab-threeAAA" data-bs-toggle="tab" href="#threeAAA" role="tab"
                    aria-controls="threeAAA" aria-selected="false">Tab Three</a>
                </li> -->
              </ul>
              <div class="tab-content" id="customTabContent">
                <div class="tab-pane fade show active" id="oneAAA" role="tabpanel">
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-sm-12">
                        <div class="card mb-3">
                          <div class="card-header">
                            <h5 class="card-title">Analyses en attente de traitement</h5>
                          </div>
                          <div class="card-body">
                            <div class="">
                              <div class="table-responsive">
                                <table class="table truncate align-middle" id="example">
                                  <thead>
                                    <tr>
                                    <th></th>
                                    <th>Patient</th>
                                    <th>Analyse</th>
                                    <th>Contact</th>
                                    <th>Spécialiste actuel</th>
                                    <th>Date Hospitalisation</th>
                                      <th width="100px">Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   @foreach($all_analyse_nt as $v_analyse) 
                                    <tr>
                                      <td>
                                        @if($v_analyse->sexe_patient == 'F')
                                        <img style="width:30px; height:30px;" src="{{asset('frontend/F.png')}}" alt="sexe')}}" class="rounded-circle img-3x">
                                        @else
                                        <img style="width:30px; height:30px;" src="{{asset('frontend/M.png')}}" alt="sexe" class="rounded-circle img-3x">
                                        @endif
                                      </td>
                                      <td>{{$v_analyse->prenom_patient}}{{$v_analyse->nom_patient}}</td>
                                      <td><h4><span class="badge bg-danger">{{$v_analyse->analyse}}{{$v_analyse->libelle_analyse}}</span></h4></td>
                                      <td>{{$v_analyse->telephone}}</td>
                                      <?php 
                                      $all_specialiste=DB::table('users')
                                            ->join('personnel','users.email','=','personnel.email')
                                            ->join('user_roles','users.user_role_id','=','user_roles.user_role_id')
                                            ->join('tbl_analyse','users.user_id','=','tbl_analyse.user_id')
                                            ->select('users.*','personnel.*','user_roles.*','tbl_analyse.*')
                                            ->where('users.user_id',$v_analyse->user_id)
                                            ->get();
                                      ?>   
                                      <td>
                                        @foreach($all_specialiste as $v_specialist)
                                        {{$v_specialist->designation}}. {{$v_specialist->prenom}} {{$v_specialist->nom}}
                                        @endforeach
                                      </td>
                                      <td>{{$v_analyse->created_at}}</td>    
                                      <td></td>
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
                        <h5 class="card-title">Analyses traitées</h5>
                      </div>
                      <div class="card-body">
                        <div class="table-outer">
                          <div class="table-responsive">
                            <table class="table table-striped truncate m-0">
                              <thead>
                                 <tr>
                                    <th></th>
                                    <th>Patient</th>
                                    <th>Analyse</th>
                                    <th>Contact</th>
                                    <th>Spécialiste actuel</th>
                                    <th>Date Hospitalisation</th>
                                      <th width="100px">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($all_analyse_t as $v_analyse) 
                                <tr>
                                  <td>
                                        @if($v_analys->sexe_patient == 'F')
                                        <img style="width:30px; height:30px;" src="{{asset('frontend/F.png')}}" alt="sexe')}}" class="rounded-circle img-3x">
                                        @else
                                        <img style="width:30px; height:30px;" src="{{asset('frontend/M.png')}}" alt="sexe" class="rounded-circle img-3x">
                                        @endif
                                      </td>
                                      <td>{{$v_analys->prenom_patient}}{{$v_analys->nom_patient}}</td>
                                      <td><h4><span class="badge bg-danger">{{$v_analys->analyse}}{{$v_analyse->libelle_analyse}}</span></h4></td>
                                      <td>{{$v_analys->telephone}}</td>
                                      <?php 
                                      $all_specialiste=DB::table('users')
                                            ->join('personnel','users.email','=','personnel.email')
                                            ->join('user_roles','users.user_role_id','=','user_roles.user_role_id')
                                            ->join('tbl_analyse','users.user_id','=','tbl_analyse.user_id')
                                            ->select('users.*','personnel.*','user_roles.*','tbl_analyse.*')
                                            ->where('users.user_id',$v_analys->user_id)
                                            ->get();
                                      ?>   
                                      <td>
                                        @foreach($all_specialiste as $v_specialist)
                                        {{$v_specialist->designation}}. {{$v_specialist->prenom}} {{$v_specialist->nom}}
                                        @endforeach
                                      </td>
                                      <td>{{$v_analys->created_at}}</td>    
                                      <td></td>
                                
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
    </div>
   <!-- Row ends -->








  


	@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" crossorigin="anonymous"></script>



      <script>                                      
      var input = document.querySelector("#phone1");
      window.intlTelInput(input, {
        initialCountry: "BJ",
        separateDialCode: true,
        hiddenInput: "telephone",
        utilsScript: "intl/build/js/utils.js?1537727621611" // just for formatting/placeholders etc

      });

      var iti = window.intlTelInputGlobals.getInstance(input);

        input.addEventListener('input', function() {
          var fullNumber = iti.getNumber();
          document.getElementById('lnai').value = fullNumber;
        });



      </script>

      <script>                                      
      var inputt = document.querySelector("#phone2");
      window.intlTelInput(inputt, {
        initialCountry: "BJ",
        separateDialCode: true,
        hiddenInput: "telephone",
        utilsScript: "intl/build/js/utils.js?1537727621611" // just for formatting/placeholders etc

      });

      var itii = window.intlTelInputGlobals.getInstance(inputt);

        inputt.addEventListener('input', function() {
          var fullNumberr = itii.getNumber();
          document.getElementById('lnaii').value = fullNumberr;
        });



      </script>
@endpush         
 <script>
        class LinkedSelect {


          constructor (element){
              this.select = element
              this.onChange = this.onChange.bind(this)
              this.target = document.querySelector(this.select.getAttribute("data-target"))
              this.loader = null
              this.select.addEventListener('change', this.onChange);
          }

          onChange (e) {

              this.showLoader()
              let request = new XMLHttpRequest();
              request.open('GET', this.select.getAttribute("data-source").replace('id', e.target.value) , true);
              request.onload = () => {
                  if(request.status >= 200 && request.status < 400);
         			console.log(request.responseText) 
                  let data = JSON.parse(request.responseText);

                    
                  let options = data.reduce(function (acc, option) {
                      return acc + '<option value="' + option.prix + ' " style="font-weight: bold; color:green;">' + option.prix + ' F CFA</option>'
                  }, '')
                  
                
                window.setTimeout( () => {
                    this.hideLoader();
                    let firs = this.target.firstElementChild
                      this.target.innerHTML = options;
                     
                      this.target.parentNode.style.display = null
                }, 100)


              }

              request.onerror = function() {
                alert('Impossible')
              }
              request.send();
          }


            showLoader(){
                this.loader = document.createTextNode('Chargement...')
                this.target.parentNode.parentNode.appendChild(this.loader)
                console.log(this.loader, this.target.parentNode.parentNode)
             

            }

            hideLoader(){
                if(this.loader !==  null){
                    this.loader.parentNode.removeChild(this.loader)
                    this.loader = null;
                }
            }



        }


        let selects = document.querySelectorAll('.link-select');
        selects.forEach(function(selected) {
            new LinkedSelect(selected)
        })
</script> 
<script type="text/javascript">
        function THEFUNCTION(i)
   {
        var enlever = document.getElementById('enlever');
        switch(i) {
            case 1 : enlever.style.display = ''; break;
            default: enlever.style.display = ''; break;
     
        }
    var enleverE = document.getElementById('enleverE');
        switch(i) {
            case 2 : enleverE.style.display = 'none'; break;
            default: enleverE.style.display = 'none'; break;
     
     
        }
    }
</script>

@section('Datatable')
    <script>
      $(document).ready(function() {
      $("#example").DataTable();
    });
      $(".drop").change(function(){
      if(confirm('Cliquez OK pour enregistrer l\'analyse demandée')){
          {this.form.submit()} 
      }
      else $(".drop option:selected").prop("selected", false);
    });
    </script>
@endsection

<script type="text/javascript">
          function THEFUNCTION2(i)
     {
          var enlever = document.getElementById('enleverR');
          switch(i) {
              case 1 : enlever.style.display = ''; break;
              default: enlever.style.display = ''; break;
       
          }
      var enleverE = document.getElementById('enleverEE');
          switch(i) {
              case 2 : enleverE.style.display = 'none'; break;
              default: enleverE.style.display = 'none'; break;
       
       
          }
      }
</script>
@endsection