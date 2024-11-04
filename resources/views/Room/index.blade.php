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
                              <th width="100px">Occupied</th>
                              <th width="100px">Reserved</th>
                              <th width="100px">Available</th>
                              <th width="100px">Cleanup</th>
                              <th width="100px">Other</th>
                              <th width="100px">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <img src="assets/images/products/1.jpg" alt="Bootstrap Themes" class="rounded-2 img-3x">
                              </td>
                              <td>Cardiology</td>
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
                                <a href="available-rooms.html" class="btn btn-primary">View Rooms</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="assets/images/products/3.jpg" alt="Bootstrap Themes" class="rounded-2 img-3x">
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
                                <a href="available-rooms.html" class="btn btn-primary">View Rooms</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="assets/images/products/4.jpg" alt="Bootstrap Themes" class="rounded-2 img-3x">
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
                                <a href="available-rooms.html" class="btn btn-primary">View Rooms</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="assets/images/products/6.jpg" alt="Bootstrap Themes" class="rounded-2 img-3x">
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
                                <a href="available-rooms.html" class="btn btn-primary">View Rooms</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="assets/images/products/2.jpg" alt="Bootstrap Themes" class="rounded-2 img-3x">
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
                                <a href="available-rooms.html" class="btn btn-primary">View Rooms</a>
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

          <!-- App footer starts -->
          <div class="app-footer bg-white">
            <span>© Medflex admin 2024</span>
          </div>
          <!-- App footer ends -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
  </body>

</html>
