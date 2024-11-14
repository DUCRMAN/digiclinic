@extends('layout')
@section('service content')
<?php  
 $user_role_id=Session::get('user_role_id');
 $user_id=Session::get('user_id');
?>

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xxl-6 col-sm-12">
                <div class="card mb-3 bg-1">
                  <div class="card-body mh-230">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-sm-3">
                        <img src="{{ asset('frontend/images/user2.png') }}" class="img-fluid rounded-3" alt="Medical Dashboard">
                      </div>
                      <div class="col-sm-9">
                        <div class="text-white mt-3">
                          <h6>Je suis le,</h6>
                          <h3>Direct. {{ $directeur->nom }} {{ $directeur->prenom }}</h3>
                          <h6>MBBS, MS - General Surgery, General Physician</h6>
                          <h6>16 Years Experience Overall</h6>
                          <div class="rating-stars">
                            <div class="readonly5"></div>
                          </div>
                          <div class="mt-1">2896 Reviews</div>
                        </div>
                      </div>
                    </div>
                    <!-- Row ends -->

                  </div>
                </div>
              </div>
              <div class="col-xxl-2 col-sm-4">
                <div class="card mb-3">
                  <div class="card-body mh-230">

                    <!-- Card details start -->
                    <div>
                      <div class="d-flex flex-column align-items-center">
                        <div class="icon-box xl bg-primary-subtle rounded-5 mb-2 no-shadow">
                          <i class="ri-empathize-line fs-1 text-primary"></i>
                        </div>
                        <h1 class="text-primary">3605</h1>
                        <h6>Patients</h6>
                        <span class="badge bg-primary">68% High</span>
                      </div>
                    </div>
                    <!-- Card details end -->

                  </div>
                </div>
              </div>
              <div class="col-xxl-2 col-sm-4">
                <div class="card mb-3">
                  <div class="card-body mh-230">

                    <!-- Card details start -->
                    <div>
                      <div class="d-flex flex-column align-items-center">
                        <div class="icon-box xl bg-danger-subtle rounded-5 mb-2 no-shadow">
                          <i class="ri-lungs-line fs-1 text-danger"></i>
                        </div>
                        <h1 class="text-danger">507</h1>
                        <h6>Surgeries</h6>
                        <span class="badge bg-danger">26% High</span>
                      </div>
                    </div>
                    <!-- Card details end -->

                  </div>
                </div>
              </div>
              <div class="col-xxl-2 col-sm-4">
                <div class="card mb-3">
                  <div class="card-body mh-230">

                    <!-- Card details start -->
                    <div>
                      <div class="d-flex flex-column align-items-center">
                        <div class="icon-box xl bg-success-subtle rounded-5 mb-2 no-shadow">
                          <i class="ri-star-line fs-1 text-success"></i>
                        </div>
                        <h1 class="text-success">2896</h1>
                        <h6>Reviews</h6>
                        <span class="badge bg-success">30% High</span>
                      </div>
                    </div>
                    <!-- Card details end -->

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xl-8 col-sm-12">

                <!-- Row starts -->
                <div class="row gx-3">
                  <div class="col-sm-12">
                    <div class="card mb-3">
                      <div class="card-header">
                        <h5 class="card-title">A propos</h5>
                      </div>
                      <div class="card-body">

                        <p>
                          Direct. {{ $directeur->nom }} {{ $directeur->prenom }} is an eminent Endocrinologist associated with med hospitals who is specially
                          trained to diagnose diseases related to glands. She specialises in treating people
                          who suffer from hormonal imbalances, typically from glands in the endocrine system. The most
                          common conditions treated by Dr. Linda are Diabetes, Metabolic disorders, Lack of
                          growth, Osteoporosis, Thyroid diseases, Cancers of the endocrine glands, Over- or
                          under-production of hormones, Cholesterol disorders, Hypertension and Infertility. Also
                          available for consultation at Med hospital. Dr. Linda's approach lies in understanding
                          patients diseases and the procedure recommended along with care.</p>

                        <div class="">
                          <h6>Specialized in</h6>
                          <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary">Diabetes</span>
                            <span class="badge bg-primary">Thyroid</span>
                            <span class="badge bg-primary">Osteoporosis</span>
                            <span class="badge bg-primary">Surgeon</span>
                            <span class="badge bg-primary">General</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="card mb-3">
                      {{-- <div class="card-header">
                        <h5 class="card-title">Reviews</h5>
                      </div>
                      <div class="card-body"> --}}

                        <!-- Reviews starts -->
                        {{-- <div class="d-grid gap-5">
                          <div class="d-flex">
                            <img src="{{ asset('frontend/images/patient1.png') }}" class="img-4x rounded-2" alt="Medical Admin Template">
                            <div class="ms-3">
                              <span class="badge border border-primary text-primary mb-3">Excellent</span>
                              <h6>Wendi Combs</h6>
                              <p class="mb-2">I am consulting with her for last 10 years and she is really good in
                                thyroid. Her experience has greatest strength. By looking at the report she will
                                diagnosis the problem and listen to us. We might think she is in a hurry to complete the
                                patient but her experience makes her 100%.</p>
                              <p><i class="ri-thumb-up-line"></i> I recommend the doctor.</p>
                              <div class="rating-stars">
                                <div class="readonly5"></div>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex">
                            <img src="{{ asset('frontend/images/patient2.png') }}" class="img-4x rounded-2" alt="Medical Admin Template">
                            <div class="ms-3">
                              <span class="badge border border-primary text-primary mb-3">Excellent</span>
                              <h6>Nick Morrow</h6>
                              <p class="mb-2">Dr.Jessika is my physician from past four years. Till now, whatever
                                treatment and advice she has given me is of the best kind. I am extremely satisfied with
                                it. There may be about 10 minutes of waiting period before consultation. The hospital
                                and staff are good as well.</p>
                              <p><i class="ri-thumb-up-line"></i> I recommend the doctor.</p>
                              <div class="rating-stars">
                                <div class="readonly5"></div>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex">
                            <img src="assets/images/patient3.png" class="img-4x rounded-2" alt="Medical Admin Template">
                            <div class="ms-3">
                              <span class="badge border border-danger text-danger mb-3">Bad</span>
                              <h6>Carole Dodson</h6>
                              <p class="mb-2">Its a not recommerded example. Its a not recommerded example. Its a not
                                recommerded example. Its a not recommerded example.
                              </p>
                              <p><i class="ri-thumb-down-line"></i> I do not recommend the doctor.</p>
                              <div class="rating-stars">
                                <div class="readonly2"></div>
                              </div>
                            </div>
                          </div>
                          <div class="d-grid">
                            <button class="btn btn-primary">Load More</button>
                          </div>
                        </div> --}}
                        <!-- Reviews ends -->

                      {{-- </div> --}}
                    </div>
                  </div>
                </div>
                <!-- Row ends -->

              </div>
              <div class="col-xl-4 col-sm-12">

                <!-- Row starts -->
                <div class="row gx-3">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card mb-3">
                      <div class="card-header">
                        <h5 class="card-title">Avalibility</h5>
                      </div>
                      <div class="card-body">

                        <div class="d-flex flex-wrap gap-1 mb-3">
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Mon - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Tue - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Wed - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Thu - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Fri - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Sat - 9:AM - 2:PM</span>
                          <span class="p-2 lh-1 bg-light rounded-2 box-shadow">Sun - NA</span>
                        </div>

                        <a href="book-appointment.html" class="btn btn-primary">
                          Book Appointment
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-sm-6">
                    <div class="card mb-3">
                      <div class="card-header">
                        <h5 class="card-title">Awards</h5>
                      </div>
                      <div class="card-body">

                        <div>
                          <div id="carouselAwards" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                              <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                              <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                              <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('frontend/images/award/award.svg') }}" class="d-block w-100" alt="Medical Templates">
                              </div>
                              <div class="carousel-item" data-bs-interval="5000">
                                <img src="{{ asset('frontend/images/award/award.svg') }}" class="d-block w-100" alt="Medical Templates">
                              </div>
                              <div class="carousel-item" data-bs-interval="2500">
                                <img src="{{ asset('frontend/images/award/award.svg') }}" class="d-block w-100" alt="Medical Templates">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAwards"
                              data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselAwards"
                              data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                          </div>

                          <div class="text-center">
                            <h1 class="text-primary">4</h1>
                            Awards received in 2024.
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row ends -->

              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

        @endsection