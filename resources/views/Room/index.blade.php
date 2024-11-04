@extends('layout')
@section('title')
    Admin
@endsection
@section('user_content')
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
                    <h5 class="card-title">Rooms by Department</h5>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-outer">
                      <div class="table-responsive">
                        <table class="table truncate align-middle m-0">
                          <thead>
                            <tr>
                              <th width="60px">&nbsp;</th>
                              <th width="100px">Department</th>
                              <th width="100px">Total</th>
                              <th width="100px">Occupées</th>
                              <th width="100px">Réservées</th>
                              <th width="100px">Disponibles</th>
                              <th width="100px">LIbérées</th>
                              <th width="100px">Autres </th>
                              <th width="100px">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <img src="{{asset('frontend/images/products/1.jpg')}}" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Cardiologie</td>
                              <td>
                                <span class="badge bg-primary text-white">25</span>
                              </td>
                              <td>
                                <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
                                  9</span>
                              </td>
                              <td>
                                <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <span class="badge border border-info text-info"><i class="ri-circle-fill"></i>
                                  7</span>
                              </td>
                              <td>
                                <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <span class="badge border border-secondary text-dark"><i class="ri-circle-fill"></i>
                                  4</span>
                              </td>
                              <td>
                                <a href="available-rooms.html" class="btn btn-primary">Voir les chambres</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="{{asset('frontend/images/products/3.jpg')}}" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Orthopedics</td>
                              <td>
                                <span class="badge bg-primary text-white">21</span>
                              </td>
                              <td>
                                <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
                                  6</span>
                              </td>
                              <td>
                                <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i>
                                  5</span>
                              </td>
                              <td>
                                <span class="badge border border-info text-info"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
                                  5</span>
                              </td>
                              <td>
                                <span class="badge border border-secondary text-dark"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <a href="available-rooms.html" class="btn btn-primary">Voir les chambres</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="{{asset('frontend/images/products/4.jpg')}}" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Neurology</td>
                              <td>
                                <span class="badge bg-primary text-white">15</span>
                              </td>
                              <td>
                                <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i>
                                  4</span>
                              </td>
                              <td>
                                <span class="badge border border-info text-info"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
                                  4</span>
                              </td>
                              <td>
                                <span class="badge border border-secondary text-dark"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <a href="available-rooms.html" class="btn btn-primary">Voir les chambres</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="{{asset('frontend/images/products/6.jpg')}}" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Gastroenterology</td>
                              <td>
                                <span class="badge bg-primary text-white">19</span>
                              </td>
                              <td>
                                <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
                                  1</span>
                              </td>
                              <td>
                                <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i>
                                  5</span>
                              </td>
                              <td>
                                <span class="badge border border-info text-info"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <span class="badge border border-secondary text-dark"><i class="ri-circle-fill"></i>
                                  7</span>
                              </td>
                              <td>
                                <a href="available-rooms.html" class="btn btn-primary">Voir les chambres</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="{{asset('frontend/images/products/2.jpg')}}" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Anatomy</td>
                              <td>
                                <span class="badge bg-primary text-white">13</span>
                              </td>
                              <td>
                                <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i>
                                  2</span>
                              </td>
                              <td>
                                <span class="badge border border-info text-info"><i class="ri-circle-fill"></i>
                                  1</span>
                              </td>
                              <td>
                                <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
                                  5</span>
                              </td>
                              <td>
                                <span class="badge border border-secondary text-dark"><i class="ri-circle-fill"></i>
                                  3</span>
                              </td>
                              <td>
                                <a href="available-rooms.html" class="btn btn-primary">Voir les chambres</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Table ends -->

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->
@endsection
