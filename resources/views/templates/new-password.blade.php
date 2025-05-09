<div class="modal similar__modal fade " id="resetModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div class="d-flex mb-3 align-items-center justify-content-between">
                     <h6 class="mb-0">New Password</h6>
                     <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-regular fa-xmark text-primary"></i>
                     </button>

                  </div>
                  <small id="messages" style="color: red !important;"></small>
                  <form id="reset-password-form" action="#" class="d-flex flex-column gap-3">
                     <div class="form-group">
                        <label for="new_password" class="fw-medium text-dark mb-3">New Password</label>
                        <div class="position-relative">
                           <input type="password" name="new_password" id="new_password" autocomplete="off">
                           <i class="fa-sharp fa-light fa-envelope icon"></i>
                        </div>
                        <small id="error-new_password" style="color: red !important;"></small>
                     </div>
                     <div class="form-group">
                        <label for="reenter_new_password" class="fw-medium text-dark mb-3">Re-Enter New Password</label>
                        <div class="position-relative">
                           <input type="password" name="reenter_new_password" id="reenter_new_password" autocomplete="off">
                           <i class="fa-sharp fa-light fa-envelope icon"></i>
                        </div>
                        <small id="error-reenter_new_password" style="color: red !important;"></small>
                     </div>
                     <div class="form-group my-3">
                        <button class="rts__btn w-100 fill__btn">Reset Password</button>
                     </div>
                  </form>
                  <span class="d-block text-center fw-medium">Remember Your Password? <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
               </div>
            </div>
         </div>
      </div>