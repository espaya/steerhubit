<div class="modal similar__modal fade " id="signupModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div class="d-flex mb-3 align-items-center justify-content-between">
                     <h6 class="mb-0">Create A Free Account</h6>
                     <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-regular fa-xmark text-primary"></i>
            I         </button>
                  </div>

                  <div class="d-block has__line text-center">
                     <p>Choose your Account Type</p>
                  </div>

                  <!-- General Error Message -->
                  <div id="error-message" class="alert alert-danger d-none"></div>
                  <small class="text-danger error-role" id="role-error"></small>
                  <!-- Success Message -->
                  <div id="success-message" class="alert alert-success d-none"></div>

                  <!-- Role Selection Buttons -->
                  <div class="tab__switch flex-wrap flex-sm-nowrap nav-tab mt-30 mb-30">
                     <button id="candidate-role" class="rts__btn nav-link active"><i class="fa-light fa-user"></i> Candidate</button>
                     <button id="employer-role" class="rts__btn nav-link"><i class="rt-briefcase"></i> Employer</button>
                      <!-- Error Message -->
                  </div>

                  <!-- Registration Form -->
                  <form id="candidate-register-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
                     @csrf
                     <input type="hidden" name="role" id="role" value="Candidate"> <!-- Hidden Input for Role -->

                     <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="sname" class="fw-medium text-dark mb-3">Your Username</label>
                        <div class="position-relative">
                              <input type="text" name="name" id="sname" placeholder="Enter your username" autocomplete="off">
                              <i class="fa-light fa-user icon"></i>
                        </div>
                        <small class="text-danger error-message" id="name-error"></small> <!-- Error Message -->
                     </div>

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="signemail" class="fw-medium text-dark mb-3">Your Email</label>
                        <div class="position-relative">
                              <input type="email" name="email" id="email" placeholder="Enter your email" autocomplete="off">
                              <i class="fa-sharp fa-light fa-envelope icon"></i>
                        </div>
                        <small class="text-danger error-message" id="email-error"></small> <!-- Error Message -->
                     </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                                 <label for="spassword" class="fw-medium text-dark mb-3">Password</label>
                                 <div class="position-relative">
                                    <input type="password" name="password" id="spassword" class="form-control" placeholder="Enter your password">
                                    <i class="fa-light fa-lock icon"></i>
                                 </div>
                                 <small class="text-danger error-message" id="password-error"></small> <!-- Error Message -->
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                                 <label for="spassword_confirmation" class="fw-medium text-dark mb-3">Confirm Password</label>
                                 <div class="position-relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repeat your password">
                                    <i class="fa-light fa-lock icon"></i>
                                 </div>
                                 <small class="text-danger error-message" id="password_confirmation-error"></small> <!-- Error Message -->
                           </div>
                        </div>
                     </div>


                     <div class="form-group my-3">
                        <button id="register-button" type="submit" class="rts__btn w-100 fill__btn">Register</button>
                     </div>
                  </form>

                  <div class="d-block has__line text-center">
                     <p>Or</p>
                  </div>
                  <span class="d-block text-center fw-medium">Have an account? <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
               </div>
            </div>
         </div>
      </div>