<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
         <div class="offcanvas-header p-0 mb-5 mt-4">
            <a href="{{ url('/') }}" class="offcanvas-title" id="offcanvasLabel">
            <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo">
            </a> 
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <!-- login offcanvas -->
         <div class="mb-4 d-block d-sm-none">
            <div class="header__right__btn d-flex justify-content-center gap-3">
               @if(Auth::check() && Auth::user()->role == 'EMPLOYER')
               <a href="{{ route('employer.dashboard') }}" class="small__btn no__fill__btn border-6 font-xs"> 
                  <i class="rt-login"></i>Welcome, {{ Auth::user()->name }}
               </a>
               <a href="{{ route('employer.job.submit') }}" class="small__btn d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
               @elseif(Auth::check() && Auth::user()->role == 'Candidate')
               <a href="{{ route('employee') }}" class="small__btn no__fill__btn border-6 font-xs"> <i class="rt-login"></i>Welcome, {{ Auth::user()->name }}</a>
               @else 
               <a href="{{ route('login') }}" class="small__btn no__fill__btn border-6 font-xs" aria-label="Login Button"> 
                  <i class="rt-login"></i>Sign In</a>
               <a href="{{ route('showRegistrationForm') }}" class="small__btn d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button"><i class="fa-light fa-user-plus">Register</a>
               @endif
            </div>
         </div>
         <div class="offcanvas-body p-0">
            <div class="rts__offcanvas__menu overflow-hidden">
               <div class="offcanvas__menu"></div>
            </div>
            <p class="max-auto font-20 fw-medium text-center text-decoration-underline mt-4">Our Social Links</p>
            <div class="rts__social d-flex justify-content-center gap-3 mt-3">
               <a target="_blank" href="#" aria-label="facebook">
               <i class="fa-brands fa-facebook"></i>
               </a>
               <a target="_blank" href="#" aria-label="instagram">
               <i class="fa-brands fa-instagram"></i>
               </a>
               <a target="_blank" href="#" aria-label="linkedin">
               <i class="fa-brands fa-linkedin"></i>
               </a>
            </div>
         </div>
      </div>