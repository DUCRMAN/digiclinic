@extends('layouts/app')
@section('patient list content')



      <!-- Main container starts -->
      <div class="main-container">

        <!-- Sidebar wrapper starts -->
      @include('layouts/partials/_general-sidebar')
        <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-center">

            <!-- Breadcrumb starts -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Patients List
              </li>
            </ol>
            <!-- Breadcrumb ends -->

            <!-- Sales stats starts -->
            <div class="ms-auto d-lg-flex d-none flex-row">
              <div class="d-flex flex-row gap-1 day-sorting">
                <button class="btn btn-sm btn-primary">Today</button>
                <button class="btn btn-sm">7d</button>
                <button class="btn btn-sm">2w</button>
                <button class="btn btn-sm">1m</button>
                <button class="btn btn-sm">3m</button>
                <button class="btn btn-sm">6m</button>
                <button class="btn btn-sm">1y</button>
              </div>
            </div>
            <!-- Sales stats ends -->

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Patients List</h5>
                    <a href="add-patient.html" class="btn btn-primary ms-auto">Add Patient</a>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-responsive">
                      <table id="basicExample" class="table truncate m-0 align-middle">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Treatment</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>#89990</td>
                            <td>
                              <img src="{{asset('assets/images/patient.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Allan Stuart
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>67</td>
                            <td>O+</td>
                            <td>
                              Diabetes
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>377 McGlynn, Orchard</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#89992</td>
                            <td>
                              <img src="{{asset('assets/images/patient1.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Katie Robinson
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning">Female</span></td>
                            <td>33</td>
                            <td>B+</td>
                            <td>
                              Pediatric
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>229 Hills Courts, Doyleland</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#89995</td>
                            <td>
                              <img src="{{asset('assets/images/patient2.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Pam Higgins
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>28</td>
                            <td>AB+</td>
                            <td>
                              Asthma
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>59 Graham Fall, Nickville</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#89345</td>
                            <td>
                              <img src="{{asset('assets/images/patient3.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Ashley Clay
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>77</td>
                            <td>A+</td>
                            <td>
                              Chancroid
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>491 Towne Parkway</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#87690</td>
                            <td>
                              <img src="{{asset('assets/images/patient4.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Keith Coleman
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning">Female</span></td>
                            <td>49</td>
                            <td>O+</td>
                            <td>
                              Diphtheria
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>289 Markus Turnpike</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#82894</td>
                            <td>
                              <img src="{{asset('assets/images/patient5.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Nick Morrow
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>69</td>
                            <td>A+</td>
                            <td>
                              Thyroid
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>835 Lorena Stream</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#80762</td>
                            <td>
                              <img src="{{asset('assets/images/patient4.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Wendi Combs
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning">Female</span></td>
                            <td>28</td>
                            <td>AB+</td>
                            <td>
                              Cyclospora
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>360 Branden Knoll</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#83308</td>
                            <td>
                              <img src="{{asset('assets/images/patient1.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Carole Dodson
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning">Female</span></td>
                            <td>95</td>
                            <td>A+</td>
                            <td>
                              Conjunctivitis
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>Suite 510 Kiana Track</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#83306</td>
                            <td>
                              <img src="{{asset('assets/images/patient.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Juan Meyers
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>55</td>
                            <td>B+</td>
                            <td>
                              Diabetes
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>6921 Geoffrey Spur</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#86345</td>
                            <td>
                              <img src="{{asset('assets/images/patient5.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Naomi Dawson
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>32</td>
                            <td>AB+</td>
                            <td>
                              Celiac
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>352 Raynor Junction</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#83349</td>
                            <td>
                              <img src="{{asset('assets/images/patient2.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Emmitt Macias
                            </td>
                            <td><span class="badge bg-info-subtle text-info">Male</span></td>
                            <td>93</td>
                            <td>A+</td>
                            <td>
                              Cervical
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>834 Quitzon Dale Connie</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>#82348</td>
                            <td>
                              <img src="{{asset('assets/images/patient4.png')}}" class="img-shadow img-2x rounded-5 me-1"
                                alt="Medical Admin Template">
                              Reba Fisher
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning">Female</span></td>
                            <td>59</td>
                            <td>A+</td>
                            <td>
                              Alphaviruses
                            </td>
                            <td>0987654321</td>
                            <td>test@testing.com</td>
                            <td>806 Je Alley, Robelfurt</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <a href="edit-patient.html" class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details">
                                  <i class="ri-edit-box-line"></i>
                                </a>
                                <a href="patient-dashboard.html" class="btn btn-outline-info btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Dashboard">
                                  <i class="ri-eye-line"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- Table ends -->

                    <!-- Modal Delete Row -->
                    <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="delRowLabel">
                              Confirm
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete the patient?
                          </div>
                          <div class="modal-footer">
                            <div class="d-flex justify-content-end gap-2">
                              <button class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">No</button>
                              <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Yes</button>
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