@extends('layout')
@section('admin')
<?php  
 $user_role_id=Session::get('user_role_id');
 $user_id=Session::get('user_id');
?>

<!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
               <div class="col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Rayons de {{$get_category}}</h5>
                  </div>
                  <div class="card-body">
                      </div>
                      <div class="card-body">
                        <div class="">
                          <div class="table-responsive">
                          <table class="table truncate align-middle" id="example">
                          <thead>
                            <tr>
                              <th>Rayon libellé</th>
              							  <th>Rayon description</th>
              							  <th>Statut</th>
              							  <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($all_rayon as $v_rayon) 
              							<tr>
              								<td class="center"><a href="{{URL::to('/sous-rayon-par-rayon-entite/'.$v_rayon->rayon_id)}}">{{$v_rayon->rayon_name}}</a></td>
              								<td class="center">{{$v_rayon->rayon_description}}</td>
              								<td class="center">
              									@if($v_rayon->publication_status == 1)
              									
              									<span class="label label-success">Active</span>
              									@else
              										<span class="label label-danger">Unactive</span>
              									@endif
              								</td>
              								<td class="center">
              									@if($v_rayon->publication_status == 1)
              									<a title="Désactiver" class="btn btn-danger" href="{{URL::to('/unactive_rayon/'.$v_rayon->rayon_id)}}">		
              										<i class="mdi mdi-thumb-down"></i>	  
              									</a>
              									@else
              									<a title="Activer" class="btn btn-success" href="{{URL::to('/active_rayon/'.$v_rayon->rayon_id)}}">		
              										<i class="mdi mdi-thumb-up"></i>	  
              									</a>
              									@endif
              									<a title="Modifier" class="btn btn-info" href="{{URL::to('/edit-rayon/'.$v_rayon->rayon_id)}}">
              										<i class="mdi mdi-folder-edit"></i> 
              									</a>
              									<a title="Supprimer" class="btn btn-danger" href="{{URL::to('/delete-rayon/'.$v_rayon->rayon_id)}}" id="delete">
              										<i class="mdi mdi-trash-can"></i> 
              									</a>
              								</td>
                            </tr>

													@endforeach

                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>










 <!-- Basic Checkbox -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Ajouter Rayon</h2>
      </div>
      <div class="card-body">
        <div class="collapse" id="collapse-from-validation">
          
        </div>

        <form class="form-horizontal" method="post" action="{{url('/save-rayon')}}">
							{{csrf_field()}}
		<input type="hidden" name="category_id" value="{{$get_category_id}}" />
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="validationServer01">Rayon libellé</label>
              <input type="text" class="form-control border-success" id="validationServer01" placeholder="libellé" name="rayon_name" required>
              <div class="text-success small mt-1">
                Looks good!
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="validationServer02">Rayon description</label>
              <input type="text" name="rayon_description" rows="3" class="form-control border-info" id="validationServer02" placeholder="description" required>
              <div class="text-info small mt-1">
                Looks good!
              </div>
            </div>
            
           
          </div>
          <button class="btn btn-primary btn-pill mr-2" type="submit">Submit</button>
          <button class="btn btn-light btn-pill" type="submit">Cancel</button>
        </form>

      </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@section('Datatable')
    <script>
      $(document).ready(function() {
      $("#example").DataTable();
    });
      
    </script>
   
@endsection

@endsection