<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="description" content="Your Ultimate Job HTML Template">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="https://html.themewant.com/jobpath">
      <meta name="robots" content="index, follow">
      <!-- for open graph social media -->
      <meta property="og:title" content="Your Ultimate Job HTML Template">
      <meta property="og:description" content="Your Ultimate Job HTML Template">
      <meta property="og:image" content="https://www.example.com/image.jpg">
      <meta property="og:url" content="https://html.themewant.com/jobpath/">
      <!-- for twitter sharing -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Your Ultimate Job HTML Template">
      <meta name="twitter:description" content="Your Ultimate Job HTML Template">
      <!-- fabicon -->
      <link rel="shortcut-icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
      <title>SteerHubIT - Resume</title>
      <!-- rt icons -->
      <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
      <!-- fontawesome -->
      <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
      <!-- all plugin css -->
      <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   </head>
   <body class="template-dashboard">
      <!-- header area -->
      @include('employee/employee_temp/emp-header');
      <!-- header area end -->
      <!-- content area -->
      <div class="dashboard__content d-flex">
      @include('employee/employee_temp/emp-sidebar');
      <div class="dashboard__right">
         <div class="dash__content ">
            <!-- sidebar menu -->
            <div class="sidebar__menu d-md-block d-lg-none">
               <div class="sidebar__action"><i class="fa-sharp fa-regular fa-bars"></i> Sidebar</div>
            </div>
            <!-- sidebar menu end -->
            <div class="my__profile__tab radius-16 bg-white">
               <div class="my__details" id="info">
                  <div class="info__top align-items-start flex-column">
                     <div class="select__image">
                        <label for="file" class="file-upload__label__two">
                        <span>
                        <i class="fa-light fa-file-arrow-up"></i>
                        <b><u>Click To Upload</u></b> Or Drag and Drop
                        <br>
                        Meximum File Size 10 Mb
                        </span>
                        </label>
                        <input type="file" name="file" class="file-upload__input__two" id="file">
                     </div>
                     <div class="cv__included d-flex gap-30">
                        <div class="single__item">
                           <div class="d-flex justify-content-between">
                              <span>Resume</span>
                              <span><i class="fa-regular fa-xmark"></i></span>
                           </div>
                           <div class="file__type font-20 mt-2 fw-semibold">
                              PDF
                           </div>
                        </div>
                        <div class="single__item">
                           <div class="d-flex justify-content-between">
                              <span>Cover Letter</span>
                              <span><i class="fa-regular fa-xmark"></i></span>
                           </div>
                           <div class="file__type font-20 mt-2 fw-semibold">
                              PDF
                           </div>
                        </div>
                     </div>
                     <div class="d-flex justify-content-start">
                        <a href="javascript::void();" class="added__social__link">Save File</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- education -->
            <h6 class="fw-medium mt-30 mb-20">Education</h6>
            <div class="my__education radius-16 p-30 bg-white" id="education">
               <div class="accordion" id="rts-accordion">
                  <div class="accordion-item">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c8" aria-expanded="false" aria-controls="c8">
                     DEGREE
                     </button>
                     <div id="c8" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                        <div class="accordion-body p-0 mt-3 mb-20">
                           <div class="info__field">
                              <div class="row row-cols-sm-2  row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="title">Institution Name</label>
                                    <input type="text" id="institution" name="degree_institution_name"  placeholder="Massachusetts Institute of Technology" autocomplete="off">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="std">Location</label>
                                    <input type="text" id="location" name="degree_institution_location" placeholder="Massachusetts" autocomplete="off">
                                 </div>
                              </div>
                              <div class="row row-cols-sm-2 row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="un">Year Started</label>
                                    <input name="degree_year_started" type="date" id="un">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="grade">Year Completed (or Present)</label>
                                    <input name="degree_year_completed" type="date" id="grade">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c6" aria-expanded="false" aria-controls="c6">
                     CERTIFICATION
                     </button>
                     <div id="c6" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                        <div class="accordion-body mt-3 p-0 mb-20">
                           <div class="info__field">
                              <div class="row row-cols-sm-2  row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="title">Institution Name</label>
                                    <input type="text" id="institution" name="cert_institution_name"  placeholder="Massachusetts Institute of Technology" autocomplete="off">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="std">Location</label>
                                    <input type="text" id="location" name="cert_institution_location" placeholder="Massachusetts" autocomplete="off">
                                 </div>
                              </div>
                              <div class="row row-cols-sm-2 row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="un">Year Started</label>
                                    <input name="cert_year_started" type="date" id="un">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="grade">Year Completed (or Present)</label>
                                    <input name="cert_year_completed" type="date" id="grade">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     HIGH SCHOOL
                     </button>
                     <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                        <div class="accordion-body p-0 mt-3">
                           <div class="info__field">
                              <div class="row row-cols-sm-2  row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="title">Institution Name</label>
                                    <input type="text" id="institution" name="high_school_name"  placeholder="Massachusetts High School" autocomplete="off">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="std">Location</label>
                                    <input type="text" id="location" name="high_school_location" placeholder="Massachusetts" autocomplete="off">
                                 </div>
                              </div>
                              <div class="row row-cols-sm-2 row-cols-1">
                                 <div class="rt-input-group">
                                    <label for="un">Year Started</label>
                                    <input name="high_school_year_started" type="date" id="un">
                                 </div>
                                 <div class="rt-input-group">
                                    <label for="grade">Year Completed (or Present)</label>
                                    <input type="date" id="grade" name="high_school_year_completed">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex justify-content-start">
                     <a href="javascript::void();" class="added__social__link">Save Education</a>
                  </div>
               </div>
            </div>
            <!-- education end -->
            <!-- education -->
            <h6 class="fw-medium mt-30 mb-20">Skills</h6>
            <div class="my__education radius-16 p-30 bg-white" id="education-1">
               <div class="my__skillset">
                  <ul class="skill__tags" id="skillTags">
                     <!-- Skills will be added here dynamically -->
                  </ul>
                  <div style="margin-top: 20px" class="skill-input-container">
                     <div class="info__field">
                        <div class="row row-cols-sm-1  row-cols-1">
                           <div class="rt-input-group">
                              <input type="text" id="skillInput" name="skills"  placeholder="Type a skill and press Enter" autocomplete="off">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion" style="margin-top: 20px" id="rts-accordion-2">
                     <div class="d-flex justify-content-start">
                        <a href="#" class="added__social__link">Add Skill</a>
                     </div>
                  </div>
               </div>
               <!-- education end -->
            </div>
            @include('employee/employee_temp/emp-footer')
         </div>
      </div>
      <!-- content area end -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
         <div class="offcanvas-header p-0 mb-5 mt-4">
            <a href="index.html" class="offcanvas-title" id="offcanvasLabel">
            <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo">
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
      <script>
         document.addEventListener('DOMContentLoaded', function() {
             const skillInput = document.getElementById('skillInput');
             const skillTags = document.getElementById('skillTags');
             
             // Add delete functionality to existing skills
             document.querySelectorAll('.skill__tags .fa-xmark').forEach(btn => {
                 btn.addEventListener('click', function() {
                 this.closest('li').remove();
                 });
             });
             
             skillInput.addEventListener('keydown', function(e) {
                 if (e.key === 'Enter' && this.value.trim() !== '') {
                 addSkill(this.value.trim());
                 this.value = '';
                 }
             });
             
             function addSkill(skillName) {
                 const skillItem = document.createElement('li');
                 skillItem.innerHTML = `
                 <span class="skill__item">${skillName}</span>
                 <span><i class="fa-regular fa-xmark"></i></span>
                 `;
                 
                 skillItem.querySelector('.fa-xmark').addEventListener('click', function() {
                 skillItem.remove();
                 });
                 
                 // Insert before the "add" button if it exists
                 const addButton = document.querySelector('.skill__item__add');
                 if (addButton) {
                 addButton.closest('li').before(skillItem);
                 } else {
                 skillTags.appendChild(skillItem);
                 }
             }
             });
      </script>
   </body>
</html>