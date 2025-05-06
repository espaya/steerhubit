
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Job - SteerHubIT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                            <h4 class="text-capitalize breadcrumb-title">Edit: {{ $job->title }}</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                               
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            
                            <div class="card-body py-md-30">
                                <form id="update-job-form" method="POST" action="{{ route('management.add.new.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <label for="">Job Title *</label>
                                            <input value="{{ $job->title }}" id="title" name="title" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" autocomplete="off">
                                            <small style="color: red;" id="error-title"></small>
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <label for="">Job Description *</label>
                                            <textarea id="description" name="description" rows="20"  style="height: 300px;" class="form-control ih-medium ip-gray radius-xs b-light px-15"> {{ html_entity_decode($job->description) }} </textarea>
                                            <small style="color: red;" id="error-description"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Category *</label>
                                            <select id="working_schedule" name="category" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option {{ $job->category == 'Certified Nursing Assistant' ? 'selected' : '' }} value="Certified Nursing Assistant">Certified Nursing Assistant (CNA)</option>
                                                <option {{ $job->category == 'Licensed Practical Nurse' ? 'selected' : '' }} value="Licensed Practical Nurse">Licensed Practical Nurse (LPN)</option>
                                                <option {{ $job->category == 'Home Health Aide' ? 'selected' : '' }} value="Home Health Aide">Home Health Aide (HHA)</option>
                                            </select>
                                            <small style="color: red;" id="error-category"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Schedule *</label>
                                            <select id="working_schedule" name="working_schedule" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option {{ $job->working_schedule == 'Day Shift' ? 'selected' : '' }} value="Day Shift" >Day Shift</option>
                                                <option {{ $job->working_schedule == 'Night Shift' ? 'selected' : '' }} value="Night Shift" >Night Shift</option>
                                            </select>
                                            <small style="color: red;" id="error-working_schedule"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Day *</label>
                                            <select id="working_day" name="working_day" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option {{ $job->working_day == 'Day Shift' ? 'selected' : '' }} value="Day Shift" >Monday - Sunday</option>
                                                <option {{ $job->working_day == 'Night Shift' ? 'selected' : '' }} value="Night Shift" >Monday - Saturday</option>
                                            </select>
                                            <small style="color: red;" id="error-working_day"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Pay (USD)*</label>
                                            <input id="pay" name="pay" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->pay }}" autocomplete="off">
                                            <small style="color: red;" id="error-pay"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Experience *</label>
                                            <input id="experience" name="experience" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->experience }}" autocomplete="off">
                                            <small style="color: red;" id="error-experience"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Application Deadline *</label>
                                            <input id="deadline" value="{{ $job->deadline }}" name="deadline" type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15" autocomplete="off">
                                            <small style="color: red;" id="error-deadline"></small>
                                        </div>
                                        <div class="col-md-4 mb-25">
                                            <label for="">Qualification *</label>
                                            <input id="qualification" name="qualification" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->qualification }}" autocomplete="off">
                                            <small style="color: red;" id="error-qualification"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Introduction Video (YouTube) Url (Optional)</label>
                                            <input id="video" name="video" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->video ?? $job->video }}" autocomplete="off">
                                                <small style="color: red;" id="error-video"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Job Website</label>
                                            <input id="website" name="website" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->website }}" autocomplete="off">
                                                <small style="color: red;" id="error-website"></small>
                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <label for="country">Country</label>
                                            <select id="country" name="country" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                <option value="">Select a country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}" {{ $job->country == $country ? 'selected' : '' }}>
                                                        {{ $country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-6 mb-25">
                                            <label for="">State</label>
                                            <input id="state" name="state" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->state }}" autocomplete="off">
                                            <small style="color: red;" id="error-state"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Address</label>
                                            <input id="address" name="address" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->address }}" autocomplete="off">
                                            <small style="color: red;" id="error-address"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Postal Code</label>
                                            <input id="postal_code" name="postal_code" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{ $job->postal_code }}" autocomplete="off">
                                            <small style="color: red;" id="error-postal_code"></small>
                                        </div>
                                        
                                        <div class="col-md-12 mb-25">
                                            <label for="">Status *</label>
                                            <select id="status" name="status" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option {{ $job->status == 'APPROVED' ? 'selected' : '' }} value="APPROVED" >Approved</option>
                                                <option {{ $job->status == 'PENDING' ? 'selected' : '' }} value="PENDING" >Pending</option>
                                                <option {{ $job->status == 'REJECTED' ? 'selected' : '' }} value="REJECTED" >Rejected</option>
                                            </select>
                                            <small style="color: red;" id="error-status"></small>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="layout-button mt-0">
                                                <button onclick="window.history.back();" type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">save</button>
                                            </div>
                                        </div>
                                        <div id="job-error-message" class="col-md-12 mt-20"></div>
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
    <script src="{{asset('assets/js/mgt-update-job.js')}}"></script>
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
</body>

</html>