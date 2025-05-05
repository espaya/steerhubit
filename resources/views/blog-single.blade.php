
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="description" content="Your Ultimate Job HTML Template">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="https://html.themewant.com/jobpath">
      <meta name="robots" content="index, follow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- for open graph social media -->
      <meta property="og:title" content="Your Ultimate Job HTML Template">
      <meta property="og:description" content="Your Ultimate Job HTML Template">
      <meta property="og:image" content="https://www.example.com/image.jpg">
      <meta property="og:url" content="https://html.themewant.com/jobpath/">
      <!-- for twitter sharing -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Your Ultimate Job HTML Template">
      <meta name="twitter:description" content="Your Ultimate Job HTML Template">

      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">

      <!-- fabicon -->
      <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
      <title> {{ $post->title }} - SteerHubIt</title>
      <!-- rt icons -->
      <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
      <!-- fontawesome -->
      <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
      <!-- all plugin css -->
      <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   </head>
   <body>
      <!-- header area -->
      @include('templates/header')
      <!-- header area end -->
      <!-- breadcrumb area -->
      <div class="rts__section breadcrumb__background">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 position-relative d-flex justify-content-between align-items-center">
                  <div class="breadcrumb__area max-content breadcrumb__padding z-2">
                     <h1 class="breadcrumb-title h3 mb-3">Blog</h1>
                     <nav>
                        <ul class="breadcrumb m-0 lh-1">
                           <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page"> {{ $post->title }} </li>
                        </ul>
                     </nav>
                  </div>
                  <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                     <div class="shape__one common">
                        <img src="assets/img/breadcrumb/shape-1.svg" alt="">
                     </div>
                     <div class="shape__two common">
                        <img src="assets/img/breadcrumb/shape-2.svg" alt="">
                     </div>
                     <div class="shape__three common">
                        <img src="assets/img/breadcrumb/shape-3.svg" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->
      <div class="rts__section section__padding">
         <div class="container">
            <div class="row g-30">
               <div class="col-xl-4 col-lg-5">
                @include('templates/blog-sidebar')
               </div>
               <div class="col-lg-7 col-xl-8">
                  <div class="row g-30">
                     <!-- single blog -->

                     <div class="rts__blog__details">
                        <img src="{{ asset('uploads/posts/' . $post->featured_image) }}" alt="" class="rounded-3 mb-30 mb-md-5">
                        <div>
                        {!! html_entity_decode($post->description) !!}
                        </div>

                        <p hidden id="post-slug">{{ $post->slug }}</p>
                        <p hidden id="post-id">{{ $post->id }}</p>

                        <h6 class="mt-30 mb-20 font-20 fw-medium">Tags</h6>
                        <div class="job__tags is__blog__details mb-30 d-flex flex-wrap gap-3">
                            @if($post && $post->tags)
                                @php
                                    $tags = json_decode($post->tags, true); // decode JSON to PHP array
                                @endphp
                                @if(is_array($tags))
                                    @foreach($tags as $tag)
                                        <a href="#">{{ $tag }}</a>
                                    @endforeach
                                @endif
                            @endif
                        </div>

                        <!-- share -->
                         <div class="d-flex gap-4 mb-20 align-items-center mt-20">
                            <h6 class="fw-semibold">Share</h6>
                            <div class="rts__social d-flex gap-3">
                                <a target="_blank" href="https://facebook.com" aria-label="facebook">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a target="_blank" href="https://instagram.com" aria-label="instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a target="_blank" href="https://linkedin.com" aria-label="linkedin">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                                <a target="_blank" href="https://pinterest.com" aria-label="pinterest">
                                    <i class="fa-brands fa-pinterest"></i>
                                </a>
                                <a target="_blank" href="https://youtube.com" aria-label="youtube">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </div>
                         </div>
                         <!-- share end -->

                         @include('templates/comments')

                    </div>
                     
                     <!-- single blog end -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      @include('templates/login_temp')
      
      @include('templates/footer')
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
         <div class="offcanvas-header p-0 mb-5 mt-4">
            <a href="{{ url('/') }}" class="offcanvas-title" id="offcanvasLabel">
            <img src="assets/img/logo/header__one.svg" alt="logo">
            </a> 
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <!-- login offcanvas -->
         <div class="mb-4 d-block d-sm-none">
            <div class="header__right__btn d-flex justify-content-center gap-3">
               <a href="#" class="small__btn no__fill__btn border-6 font-xs" aria-label="Login Button" data-bs-toggle="modal" data-bs-target="#loginModal"> <i class="rt-login"></i>Sign In</a>
               <a href="#" class="small__btn d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
            </div>
         </div>
         <div class="offcanvas-body p-0">
            <div class="rts__offcanvas__menu overflow-hidden">
               <div class="offcanvas__menu"></div>
            </div>
            <p class="max-auto font-20 fw-medium text-center text-decoration-underline mt-4">Our Social Links</p>
            <div class="rts__social d-flex justify-content-center gap-3 mt-3">
               <a target="_blank" href="https://facebook.com" aria-label="facebook">
               <i class="fa-brands fa-facebook"></i>
               </a>
               <a target="_blank" href="https://instagram.com" aria-label="instagram">
               <i class="fa-brands fa-instagram"></i>
               </a>
               <a target="_blank" href="https://linkedin.com" aria-label="linkedin">
               <i class="fa-brands fa-linkedin"></i>
               </a>
               <a target="_blank" href="https://pinterest.com" aria-label="pinterest">
               <i class="fa-brands fa-pinterest"></i>
               </a>
               <a target="_blank" href="https://youtube.com" aria-label="youtube">
               <i class="fa-brands fa-youtube"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- THEME PRELOADER START -->
      <div class="loader-wrapper">
         <div class="loader">
         </div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- THEME PRELOADER END -->
      <button type="button" class="rts__back__top" id="rts-back-to-top">
      <i class="fas fa-arrow-up"></i>
      </button>
      <!-- all plugin js -->
      <script src="{{asset('assets/js/plugins.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
      
      
      <script src="{{ asset('assets/js/new-otp.js') }}"></script>
      <script src="{{ asset('assets/js/signup.js') }}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
      <script src="{{ asset('assets/js/signin.js') }}"></script>
      <script src="{{ asset('assets/js/otp-verification.js')}}"></script>
      <script src="{{asset('assets/js/add-comment.js')}}"></script>
      <script src="{{asset('assets/js/reply-comment.js')}}"></script>
      <script>
         $('#loginAgain').on('click', function () {
            $('#otpModal').modal('hide');
            $('#loginModal').modal('show');
         });
      </script>
      <script>
         $(document).on('click', '.comment-reply-link', function(e) {
            e.preventDefault();
            
            // Get the comment details
            const commentId = $(this).data('comment-id');
            const commentName = $(this).closest('.is__content').find('#get-comment-name').text();
            
            // Hide/show elements
            $('#comment-form').hide();
            $('#reply-comment').show();
            $('#cancel-reply').show();
            
            // Set parent_id and show comment name
            $('#reply-post-comment-form input[name="parent_id"]').val(commentId);
            $('#show-comment-name').html(`Replying to: <b>${commentName}</b>`);
            
            // Smooth scroll to reply form
            $('html, body').animate({
               scrollTop: $('#reply-comment').offset().top - 100
            }, 100);
            
            // Focus on the comment textarea
            $('#reply-comment textarea').focus();
         });

         $(document).on('click', '#cancel-reply', function() {
            $('#reply-comment').hide();
            $('#comment-form').show();
            $('#cancel-reply').hide();
            
            // Clear the parent_id and comment name
            $('#reply-post-comment-form input[name="parent_id"]').val('');
            $('#show-comment-name').html('');
         });
      </script>
   </body>
</html>