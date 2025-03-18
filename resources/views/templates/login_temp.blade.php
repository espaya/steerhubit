<div class="modal similar__modal fade " id="loginModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div class="d-flex mb-3 align-items-center justify-content-between">
                     <h6 class="mb-0">Login To SteerHubIT</h6>
                     <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-regular fa-xmark text-primary"></i>
                     </button>
                  </div>

                  <div id="login-error-message"></div>
                  
                  <div class="tab-content" id="">
                  </div>
                  <form id="login-form-ajax" action="{{ route('login') }}" method="post" class="d-flex flex-column gap-3">
                     @csrf
                     <div class="form-group">
                        <label for="email" class="fw-medium text-dark mb-3">Your Email</label>
                        <div class="position-relative">
                              <input type="email" name="email" id="login-email" placeholder="Enter your email" autocomplete="off">
                              <i class="fa-light fa-user icon"></i>
                        </div>
                        <span class="text-danger" id="login-error-email"></span>
                     </div>

                     <input type="hidden" id="timezone" name="timezone">

                     <div class="form-group">
                        <label for="password" class="fw-medium text-dark mb-3">Password</label>
                        <div class="position-relative">
                              <input type="password" name="password" id="login-password" placeholder="Enter your password">
                              <i class="fa-light fa-lock icon"></i>
                        </div>
                        <span class="text-danger" id="login-error-password"></span>
                     </div>

                     <div class="d-flex flex-wrap justify-content-between align-items-center fw-medium">
                        <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember">
                              <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot__password text-para" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
                     </div>

                     <div class="form-group my-3">
                        <button id="login-button" type="submit" class="rts__btn w-100 fill__btn">Login</button>
                     </div>
                  </form>

                  <div class="d-block has__line text-center">
                     <p>Or</p>
                  </div>
                  <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                     <div class="is__social google">
                        <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                     </div>
                     <div class="is__social facebook">
                        <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
                     </div>
                  </div>
                  <span class="d-block text-center fw-medium">Don`t have an account? <a href="#" data-bs-target="#signupModal" data-bs-toggle="modal" class="text-primary">Sign Up</a> </span>
               </div>
            </div>
         </div>
      </div>
      <!-- signup form -->
      @include('templates/signup_temp')
      <!-- forgot password form -->
      @include('templates/forgotpassword_temp')