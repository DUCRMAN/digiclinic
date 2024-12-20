@extends('layout')
@section('admin_content')
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
                    <h5 class="card-title">Revenu Mensuel</h5>
                  </div>
                  <div class="card-body">

                    <div class="chart-height-lg">
                      <div id="income"></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-sm-12">

                <!-- Card start -->
                <div class="card">
                  <div class="card-header">

                    <!-- List start -->
                    {{-- <div class="d-flex flex-wrap gap-1">
                      <div class="d-flex align-items-center box-shadow px-3 py-1 rounded-2">
                        <i class="ri-pie-chart-2-fill text-success fs-4"></i>
                        <span class="me-1 fw-semibold ps-1">$24,590.00</span>
                        <span class="text-success">Total Income</span>
                      </div>
                      <div class="d-flex align-items-center box-shadow px-3 py-1 rounded-2">
                        <i class="ri-pie-chart-2-fill text-danger fs-4"></i>
                        <span class="me-1 fw-semibold ps-1">$12,300.00</span>
                        <span class="text-danger">Total Expenses</span>
                      </div>
                      <div class="d-flex align-items-center box-shadow px-3 py-1 rounded-2">
                        <i class="ri-pie-chart-2-fill text-info fs-4"></i>
                        <span class="me-1 fw-semibold ps-1">$14,290.00</span>
                        <span class="text-info">Total Revenue</span>
                      </div>
                    </div> --}}
                    <!-- List end -->

                  </div>
                  <div class="card-body">

                    <!-- Table start -->
                    <div class="table-responsive">
                      <table id="scrollVertical" class="table m-0 randomTableColors">
                        <thead>
                          <tr>
                            <th>Service</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Avr</th>
                            <th>Mai</th>
                            <th>Juin</th>
                            <th>Juil</th>
                            <th>Aout</th>
                            <th>Sept</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                            <th>Année</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="badge bg-primary">Analyses</span></td>
                            <td>$1339.00</td>
                            <td>$2220.00</td>
                            <td>$5755.00</td>
                            <td>$1318.00</td>
                            <td>$3320.00</td>
                            <td>$3983.00</td>
                            <td>$9229.00</td>
                            <td>$5546.00</td>
                            <td>$5660.00</td>
                            <td>$1789.00</td>
                            <td>$2329.00</td>
                            <td>$7097.00</td>
                            <td>$34300.00</td>
                          </tr>
                          <tr>
                            <td><span class="badge bg-info">Consulations</span></td>
                            <td>$1032.00</td>
                            <td>$2084.00</td>
                            <td>$3364.00</td>
                            <td>$7130.00</td>
                            <td>$2182.00</td>
                            <td>$6961.00</td>
                            <td>$1890.00</td>
                            <td>$8422.00</td>
                            <td>$4465.00</td>
                            <td>$7634.00</td>
                            <td>$5190.00</td>
                            <td>$4532.00</td>
                            <td>$58200.00</td>
                          </tr>
                          <tr>
                            <td><span class="badge bg-danger">Pharmacie</span></td>
                            <td>$2230.00</td>
                            <td>$3036.00</td>
                            <td>$4221.00</td>
                            <td>$7656.00</td>
                            <td>$2226.00</td>
                            <td>$1166.00</td>
                            <td>$6120.00</td>
                            <td>$1709.00</td>
                            <td>$9932.00</td>
                            <td>$8776.00</td>
                            <td>$6593.00</td>
                            <td>$9991.00</td>
                            <td>$83700.00</td>
                          </tr>
                          <tr>
                            <td><span class="badge bg-warning">Hospitalisation</span></td>
                            <td>$4339.00</td>
                            <td>$8739.00</td>
                            <td>$5529.00</td>
                            <td>$6138.00</td>
                            <td>$2239.00</td>
                            <td>$2933.00</td>
                            <td>$3389.00</td>
                            <td>$8739.00</td>
                            <td>$7663.00</td>
                            <td>$9236.00</td>
                            <td>$9125.00</td>
                            <td>$6631.00</td>
                            <td>$74100.00</td>
                          </tr>
                          <tr>
                            <td><span class="badge bg-success">Scanner</span></td>
                            <td>$2980.00</td>
                            <td>$3480.00</td>
                            <td>$1980.00</td>
                            <td>$2080.00</td>
                            <td>$2480.00</td>
                            <td>$7680.00</td>
                            <td>$8480.00</td>
                            <td>$6680.00</td>
                            <td>$1080.00</td>
                            <td>$3280.00</td>
                            <td>$2080.00</td>
                            <td>$1680.00</td>
                            <td>$95900.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- Table end -->

                  </div>
                </div>
                <!-- Card end -->

              </div>
            </div>
            <!-- Row end -->

          </div>
          <!-- App body ends -->

    @endsection