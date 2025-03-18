
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
                    <nav>
                        <div class="nav nav-tabs">
                            <a class="nav-link active" href="#info">CV File</a>
                            <a class="nav-link " href="#social">Education</a>
                            <a class="nav-link" href="#address">Skills & Experience</a>                         
                            <a class="nav-link" href="#address">Portfolio </a>                         
                            <a class="nav-link" href="#address">Award</a>                         
                        </div>
                    </nav>
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
                                <input type="file" class="file-upload__input__two" id="file" required="">
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
                        </div>                        
                    </div>
                </div>
                
                <!-- education -->
                <h6 class="fw-medium mt-30 mb-20">Education</h6>
                <div class="my__education radius-16 p-30 bg-white" id="education">
                    <div class="accordion" id="rts-accordion">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c8" aria-expanded="false" aria-controls="c8">
                                SSC
                            </button>
                            <div id="c8" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                                <div class="accordion-body p-0 mt-3 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title">Title</label>
                                                <select name="Title" id="title" class="form-select">
                                                    <option value="*" selected="">SSC</option>
                                                    <option value="1">SSC</option>
                                                    <option value="2">HSC</option>
                                                    <option value="3">Diploma</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Post Graduation</option>
                                                </select>
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="std">Start date</label>
                                                <input type="text" id="std" placeholder="05/08/2021" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="ltd">End Date</label>
                                                <input type="text" id="ltd" placeholder="05/09/2021" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="un">University Name</label>
                                                <input type="text" id="un" placeholder="Massachusetts Institute of Technology" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="grade">GPA 5</label>
                                                <input type="text" id="grade" placeholder="GPA-5" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc">Description</label>
                                            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove Education</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c6" aria-expanded="false" aria-controls="c6">
                                HSC
                            </button>
                            <div id="c6" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                                <div class="accordion-body mt-3 p-0 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-2">Title</label>
                                                <select name="Title" id="title-2" class="form-select">
                                                    <option value="*" selected="">SSC</option>
                                                    <option value="1">SSC</option>
                                                    <option value="2">HSC</option>
                                                    <option value="3">Diploma</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Post Graduation</option>
                                                </select>
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="std-2">Start date</label>
                                                <input type="text" id="std-2" placeholder="05/08/2021" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="ltd-2">End Date</label>
                                                <input type="text" id="ltd-2" placeholder="05/09/2021" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="un-2">University Name</label>
                                                <input type="text" id="un-2" placeholder="Massachusetts Institute of Technology" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="grade-2">GPA 5</label>
                                                <input type="text" id="grade-2" placeholder="GPA-5" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-2">Description</label>
                                            <textarea name="desc" id="desc-2" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove Education</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Diploma
                            </button>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#rts-accordion">
                                <div class="accordion-body p-0 mt-3">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-3">Title</label>
                                                <select name="Title" id="title-3" class="form-select">
                                                    <option value="*" selected="">SSC</option>
                                                    <option value="1">SSC</option>
                                                    <option value="2">HSC</option>
                                                    <option value="3">Diploma</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Post Graduation</option>
                                                </select>
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="std-3">Start date</label>
                                                <input type="text" id="std-3" placeholder="05/08/2021" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="ltd-3">End Date</label>
                                                <input type="text" id="ltd-3" placeholder="05/09/2021" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="un-3">University Name</label>
                                                <input type="text" id="un-3" placeholder="Massachusetts Institute of Technology" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="grade-3">GPA 5</label>
                                                <input type="text" id="grade-3" placeholder="GPA-5" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-3">Description</label>
                                            <textarea name="desc" id="desc-3" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove Education</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <a href="#" class="added__social__link">Remove Education</a>
                        </div>
                    </div>
                </div>
                <!-- education end -->

                <!-- education -->
                <h6 class="fw-medium mt-30 mb-20">Skill & Experience</h6>
                <div class="my__education radius-16 p-30 bg-white" id="education-1">
                    <div class="my__skillset">
                        <ul class="skill__tags">
                            <li><span class="skill__item">HTML</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">C++</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">Wordpress</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">JQuery</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">Website Development</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">Figma</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item">CSS</span> <span><i class="fa-regular fa-xmark"></i></span> </li>
                            <li><span class="skill__item__add"><i class="fa-regular fa-plus"></i></span></li>
                        </ul>
                    </div>
                    <div class="accordion" id="rts-accordion-2">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1" aria-expanded="false" aria-controls="c1">
                                Software Engineer
                            </button>
                            <div id="c1" class="accordion-collapse collapse" data-bs-parent="#rts-accordion-2">
                                <div class="accordion-body p-0 mt-3 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-4">Title</label>
                                                <input type="text" id="title-4" placeholder="Software Engineer" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="cm-4">Company</label>
                                                <input type="text" id="cm-4" placeholder="Reactheme" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="de-4">end date</label>
                                                <input type="text" id="de-4" placeholder="DD/ MM/ YY" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="sd-4">Start Date</label>
                                                <input type="text" id="sd-4" placeholder="DD/MM/YY" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-4">Description</label>
                                            <textarea name="desc" id="desc-4" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove EXperience</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2" aria-expanded="false" aria-controls="c2">
                               Django Developer
                            </button>
                            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#rts-accordion-2">
                                <div class="accordion-body p-0 mt-3 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-5">Title</label>
                                                <input type="text" id="title-5" placeholder="Software Engineer" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="cm-5">Company</label>
                                                <input type="text" id="cm-5" placeholder="Reactheme" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="de-5">end date</label>
                                                <input type="text" id="de-5" placeholder="DD/ MM/ YY" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="sd-5">Start Date</label>
                                                <input type="text" id="sd-5" placeholder="DD/MM/YY" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-5">Description</label>
                                            <textarea name="desc" id="desc-5" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove EXperience</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c3" aria-expanded="false" aria-controls="collapseThree">
                               Wordpress Developer
                            </button>
                            <div id="c3" class="accordion-collapse collapse" data-bs-parent="#rts-accordion-2">
                                <div class="accordion-body p-0 mt-3 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-6">Title</label>
                                                <input type="text" id="title-6" placeholder="Software Engineer" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="cm-6">Company</label>
                                                <input type="text" id="cm-6" placeholder="Reactheme" required="">
                                            </div>
                                        </div>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="de-6">end date</label>
                                                <input type="text" id="de-6" placeholder="DD/ MM/ YY" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="sd-6">Start Date</label>
                                                <input type="text" id="sd-6" placeholder="DD/MM/YY" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-6">Description</label>
                                            <textarea name="desc" id="desc-6" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove EXperience</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <a href="#" class="added__social__link">Add Skill</a>
                        </div>
                    </div>
                </div>
                <!-- education end -->

                <!-- Portfolio -->
                <h6 class="fw-medium mt-30 mb-20">My Portfolio</h6>
                <div class="my__education radius-16 p-30 bg-white" id="education-2">
                    <div class="my__portfolio">
                        <div class="row row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-30">
                            <div class="single__portfolio">
                                <div class="delete__icon">
                                    <button type="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <figure class="portfolio__thumb">
                                    <img src="{{asset('assets/img/dashboard/p-1.webp')}}" alt="">
                                </figure>
                            </div>
                            <div class="single__portfolio">
                                <div class="delete__icon">
                                    <button type="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <figure class="portfolio__thumb">
                                    <img src="{{asset('assets/img/dashboard/p-2.webp')}}" alt="">
                                </figure>
                            </div>
                            <div class="single__portfolio">
                                <div class="delete__icon">
                                    <button type="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <figure class="portfolio__thumb">
                                    <img src="{{asset('assets/img/dashboard/p-3.webp')}}" alt="">
                                </figure>
                            </div>
                            <div class="single__portfolio">
                                <div class="delete__icon">
                                    <button type="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <figure class="portfolio__thumb">
                                    <img src="{{asset('assets/img/dashboard/p-4.webp')}}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-30">
                            <a href="#" class="added__social__link">Add Portfolio</a>
                        </div>
                    </div>
                </div>
                <!-- Portfolio end -->

                <!-- Award -->
                <h6 class="fw-medium mt-30 mb-20">Award</h6>
                <div class="my__education radius-16 p-30 bg-white" id="education-3">
                    <div class="accordion" id="rts-accordion-3">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c4" aria-expanded="false" aria-controls="c4">
                               Best Employee Award
                            </button>
                            <div id="c4" class="accordion-collapse collapse" data-bs-parent="#rts-accordion-3">
                                <div class="accordion-body p-0 mt-3 mb-20">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="titlea">Title</label>
                                                <input type="text" id="titlea" placeholder="McMaster Center for Software Certification" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="ye-7">Year</label>
                                                <input type="text" id="ye-7" placeholder="dd/mm/yy" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-7">Description</label>
                                            <textarea name="desc" id="desc-7" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove Award</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c5" aria-expanded="false" aria-controls="c5">
                              Best Candidate
                            </button>
                            <div id="c5" class="accordion-collapse collapse" data-bs-parent="#rts-accordion-3">
                                <div class="accordion-body p-0 mt-3">
                                    <div class="info__field">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="rt-input-group">
                                                <label for="title-8">Title</label>
                                                <input type="text" id="title-8" placeholder="McMaster Center for Software Certification" required="">
                                            </div>
                                            <div class="rt-input-group">
                                                <label for="ye-8">Year</label>
                                                <input type="text" id="ye-8" placeholder="dd/mm/yy" required="">
                                            </div>
                                        </div>
                                        <div class="rt-input-group">
                                            <label for="desc-8">Description</label>
                                            <textarea name="desc" id="desc-8" cols="30" rows="5" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-30">
                                        <a href="#" class="added__social__link">Remove Award</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-20">
                            <a href="#" class="added__social__link">Add Award</a>
                        </div>
                    </div>
                </div>
                <!-- Award end -->
                 
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
    
</body>
</html>