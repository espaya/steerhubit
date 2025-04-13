
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Post - SteerHubIT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- inject:css-->
    <link rel="stylesheet" href="{{asset('assets/mgt/css/plugin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mgt/style.css')}}">
    <!-- endinject -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body class="layout-light side-menu overlayScroll">


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
                                <form id="add-blog-form" method="POST" action="{{ route('management.blog.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <label for="">Title</label>
                                            <input id="title" name="title" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" autocomplete="off">
                                            <small style="color: red;" id="error-title"></small>
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <label for=""> Description</label>
                                            <textarea id="description" name="description" rows="20"  style="height: 300px;" class="form-control ih-medium ip-gray radius-xs b-light px-15"></textarea>
                                            <small style="color: red;" id="error-description"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Category</label>
                                            <select id="cateogry" name="category" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                @forelse($categories as $category) 
                                                <option value="{{ $category->category_name }}" > {{ $category->category_name }} </option>
                                                @empty
                                                <option value="" >Please add categories</option>
                                                @endforelse
                                            </select>
                                            <small style="color: red;" id="error-category"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Tags</label>
                                            <select id="tags" name="tags[]" class="form-control px-15" multiple></select>
                                            <small style="color: red;" id="error-tags"></small>
                                        </div>
                              
                                        <div class="col-md-6 mb-25">
                                            <label for="">Status </label>
                                            <select id="status" name="status" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="Publish" >Publish</option>
                                                <option value="Draft" >Draft</option>
                                                <option value="Schedule" >Schedule</option>
                                            </select>
                                            <small style="color: red;" id="error-status"></small>
                                        </div>
                                        
                                        <div class="col-md-6 mb-25" id="schedule-container" style="display: none;">
                                            <label for="">Schedule</label>
                                            <input id="schedule" name="schedule" type="datetime-local" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                            <small style="color: red;" id="error-schedule"></small>
                                        </div>

                                        
                                        <div class="col-md-6 mb-25">
                                            <label for="">Featured Image <span style="font-size: 12px;">(Drag and drop image here)</span> </label>
                                            <input id="featured-image" name="featured_image" type="file" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                            <small style="color: red;" id="error-featured_image"></small>
                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <div class="gc__img">
                                                <img id="display-featured-image" src="" alt="" class="w-50 radius-xl" style="max-width: 200px; height: auto; object-fit: contain;">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="layout-button mt-0">
                                                <button onclick="window.history.back();" type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">save</button>
                                            </div>
                                        </div>
                                        <div class="post-error-message col-md-12 mt-20"></div>
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

    <!-- inject:js-->
     
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('assets/mgt/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/mgt/js/script.min.js')}}"></script>
    <script src="{{asset('assets/js/mgt-featured-image.js')}}"></script>
    
    <!-- endinject-->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function () {
            $('#tags').select2({
                tags: true,
                tokenSeparators: [',', 'Enter'],
                placeholder: "Type and press Enter...",
                width: '100%' // optional: make it fit nicely
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status');
            const scheduleContainer = document.getElementById('schedule-container');

            function toggleScheduleField() {
                if (statusSelect.value === 'Schedule') {
                    scheduleContainer.style.display = 'block';
                } else {
                    scheduleContainer.style.display = 'none';
                }
            }

            // Run on page load
            toggleScheduleField();

            // Run on status change
            statusSelect.addEventListener('change', toggleScheduleField);
        });
    </script>
    <script src="{{asset('assets/js/mgt-add-post.js')}}"></script>

</body>

</html>