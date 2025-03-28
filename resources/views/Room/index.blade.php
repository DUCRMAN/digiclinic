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
                    <h5 class="card-title">Statistics</h5>
                  </div>
                  <div class="card-body">

                    <div class="chart-height-xxl">
                      <div id="admissions"></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Beds Availability</h5>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-outer">
                      <div class="table-responsive">
                        <table class="table truncate align-middle m-0">
                          <thead>
                            <tr>
                              <th width="60px">Bed No</th>
                              <th width="100px">Patient</th>
                              <th width="100px">Department</th>
                              <th width="100px">Admission Date</th>
                              <th width="100px">Age</th>
                              <th width="100px">Gender</th>
                              <th width="100px">Availablity</th>
                              <th width="100px">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Liza Morrison</td>
                              <td>Cardiology</td>
                              <td>20/02/2024</td>
                              <td>65</td>
                              <td>Female</td>
                              <td><span class="badge border border-success text-success">Occupied</span></td>
                              <td>
                                <button class="btn btn-primary" disabled>Discharge</button>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Kirsten Downs</td>
                              <td>Neurology</td>
                              <td>25/02/2024</td>
                              <td>86</td>
                              <td>Male</td>
                              <td><span class="badge border border-danger text-danger">Reserved</span></td>
                              <td>
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                  data-bs-target="#confirmModalSm">Confirm</button>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xx</td>
                              <td>xxx</td>
                              <td><span class="badge border border-info text-info">Available</span></td>
                              <td>
                                <a href="book-room.html" class="btn btn-primary">View</a>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Vanessa Lowery</td>
                              <td>Orthopedics</td>
                              <td>28/02/2024</td>
                              <td>38</td>
                              <td>Female</td>
                              <td><span class="badge border border-secondary text-dark">Other</span></td>
                              <td>
                                <button class="btn btn-primary" disabled>Not Available</button>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Malik Holder</td>
                              <td>Neurology</td>
                              <td>23/02/2024</td>
                              <td>59</td>
                              <td>Male</td>
                              <td><span class="badge border border-danger text-danger">Reserved</span></td>
                              <td>
                                <button class="btn btn-secondary">Confirm</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Table ends -->

                    <!-- Modal starts -->
                    <div class="modal fade" id="confirmModalSm" tabindex="-1" aria-labelledby="confirmModalSmLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalSmLabel">
                              Confirm
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="d-flex gap-2 justify-content-end">
                              <button type="button" class="btn btn-outline-secondary">
                                Cancel
                              </button>
                              <button type="button" class="btn btn-primary">
                                Book
                              </button>
                              
                            </div>
                          </div>
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

    @endsection