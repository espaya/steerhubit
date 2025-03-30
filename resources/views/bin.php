<div class="modal similar__modal fade " id="otpModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div class="d-flex mb-3 align-items-center justify-content-between">
                     <h6 class="mb-0">Please enter the OTP code</h6>
                  </div>
                  <div id="otp-error-message"></div>                  
                  <div class="tab-content" id="">
                  </div>
                  <form id="otp-form-ajax" action="{{ route('verify-otp.submit') }}" method="post" class="d-flex flex-column gap-3">
                     @csrf
                     <div class="form-group">
                        <label for="otp" class="fw-medium text-dark mb-3">Your OTP</label>
                        <div class="position-relative">
                              <input type="text" name="opt" id="login-otp" placeholder="Enter your otp" autocomplete="off">
                              <i class="fa-light fa-user icon"></i>
                        </div>
                        <span class="text-danger" id="login-error-otp"></span>
                     </div>

                     <input type="hidden" id="timezone" name="timezone">

                     <div class="form-group my-3">
                        <button id="otp-button" type="submit" class="rts__btn w-100 fill__btn">Submit</button>
                     </div>
                  </form>
                  <span class="d-block text-center fw-medium">Request new <a href="#" data-bs-target="#signupModal" data-bs-toggle="modal" class="text-primary">code</a> </span>
               </div>
            </div>
         </div>
      </div>