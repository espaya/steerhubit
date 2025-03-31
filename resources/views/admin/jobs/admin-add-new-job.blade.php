
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Job - SteerHubIT</title>


    <!-- inject:css-->

    <link rel="stylesheet" href="{{asset('assets/mgt/css/plugin.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/mgt/style.css')}}">

    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search">
        <form class="search-form">
            <span data-feather="search"></span>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
        </form>
    </div>

    <div class="mobile-author-actions"></div>
    @include('admin/admin_temp/header')
    <main class="main-content">

        @include('admin/admin_temp/sidebar')

        <div class="contents">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Add New Job</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                               
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            
                            <div class="card-body py-md-30">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <div class="gc">
                                                <div class="gc__img">
                                                    <img style="width: 250px !important;" id="preview-img" src="{{ asset('assets/img/placeholder.avif') }}" alt="img" class="radius-xl">
                                                </div>
                                                <div class="card-body px-25 py-20">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="gc__title">
                                                                <label for="">Upload company logo</label>
                                                                <input id="file-input" name="file" hidden type="file" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <button id="upload-button" type="button" class="btn btn-primary btn-default btn-squared px-30">Upload</button>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button id="remove-upload-button" type="button" class="btn btn-danger btn-default btn-squared px-30">
                                                                            <i class="fas fa-trash-alt"></i> Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <label for="">Company Name *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Job Title *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <label for="">Job Description *</label>
                                            <textarea rows="20"  style="height: 300px;" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Job Description"></textarea>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Schedule *</label>
                                            <select class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="Day Shift" >Day Shift</option>
                                                <option value="Night Shift" >Night Shift</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Day *</label>
                                            <select class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="Day Shift" >Monday - Sunday</option>
                                                <option value="Night Shift" >Monday - Saturday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Salary *</label>
                                            <select class="form-control px-15" name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Hourly</option>
                                                <option value="">Daily</option>
                                                <option value="">Weekly</option>
                                                <option value="">Monthly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">How you want to pay? *</label>
                                            <select class="form-control px-15" name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Monthly</option>
                                                <option value="">Yearly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Salary Min *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="50.5">
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Salary Max *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="120.6">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Experience *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Experience">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Qualification *</label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Qualification">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Application Deadline *</label>
                                            <input type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15" >
                                        </div>
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30">save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
                </div>
            </div>

        </div>
        @include('admin/admin_temp/footer')
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>


    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    <!-- inject:js-->
    <script src="{{asset('assets/mgt/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/mgt/js/script.min.js')}}"></script>
    <!-- endinject-->
     <script>
        $(document).ready(function () {
            const fileInput = $("#file-input");
            const previewImg = $("#preview-img");

            // Upload button triggers file input
            $("#upload-button").click(function () {
                fileInput.click();
            });

            // Show selected image preview
            fileInput.change(function (event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.attr("src", e.target.result); // Set preview image
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove uploaded image and clear input
            $("#remove-upload-button").click(function () {
                previewImg.attr("src", "{{  asset('assets/img/placeholder.avif') }}"); // Reset to default image
                fileInput.val(""); // Clear input field
            });
        });
     </script>
</body>

</html>