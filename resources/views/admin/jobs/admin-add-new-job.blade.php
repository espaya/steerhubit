
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Job - SteerHubIT</title>
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
                                <form id="add-job-form" method="POST" action="{{ route('management.add.new.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <label for="">Job Title *</label>
                                            <input id="title" name="title" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Enter Job Title" autocomplete="off">
                                            <small style="color: red;" id="error-title"></small>
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <label for="">Job Description *</label>
                                            <textarea id="description" name="description" rows="20"  style="height: 300px;" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Enter Job Description"></textarea>
                                            <small style="color: red;" id="error-description"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Category *</label>
                                            <select id="working_schedule" name="category" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="Certified Nursing Assistant">Certified Nursing Assistant (CNA)</option>
                                                <option value="Licensed Practical Nurse">Licensed Practical Nurse (LPN)</option>
                                                <option value="Home Health Aide">Home Health Aide (HHA)</option>
                                            </select>
                                            <small style="color: red;" id="error-category"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Schedule *</label>
                                            <select id="working_schedule" name="working_schedule" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="Day Shift" >Day Shift</option>
                                                <option value="Night Shift" >Night Shift</option>
                                            </select>
                                            <small style="color: red;" id="error-working_schedule"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Working Day *</label>
                                            <select id="working_day" name="working_day" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="Day Shift" >Monday - Sunday</option>
                                                <option value="Night Shift" >Monday - Saturday</option>
                                            </select>
                                            <small style="color: red;" id="error-working_day"></small>
                                        </div>
                                        <div class="col-md-3 mb-25">
                                            <label for="">Pay (USD)*</label>
                                            <input id="pay" name="pay" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="50.5" autocomplete="off">
                                            <small style="color: red;" id="error-pay"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Experience *</label>
                                            <input id="experience" name="experience" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Enter Job Experience" autocomplete="off">
                                            <small style="color: red;" id="error-experience"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Application Deadline *</label>
                                            <input id="deadline" name="deadline" type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15" autocomplete="off">
                                            <small style="color: red;" id="error-deadline"></small>
                                        </div>
                                        <div class="col-md-4 mb-25">
                                            <label for="">Qualification *</label>
                                            <input id="qualification" name="qualification" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Enter Job Qualification" autocomplete="off">
                                            <small style="color: red;" id="error-qualification"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Introduction Video (YouTube) Url (Optional)</label>
                                            <input id="video" name="video" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="https://www.youtube.com/watch?v=YEzM4mU9aiM" autocomplete="off">
                                                <small style="color: red;" id="error-video"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Job Website</label>
                                            <input id="website" name="website" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="https://example.com" autocomplete="off">
                                                <small style="color: red;" id="error-website"></small>
                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <label for="country">Country</label>
                                            <select id="country" name="country" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                <option value="">Select a country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cabo Verde">Cabo Verde</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Eswatini">Eswatini</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="North Macedonia">North Macedonia</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City">Vatican City</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                            <small style="color: red;" id="error-country"></small>
                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <label for="">State</label>
                                            <input id="state" name="state" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="NY" autocomplete="off">
                                            <small style="color: red;" id="error-state"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Address</label>
                                            <input id="address" name="address" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="140 Elgar Plc, MYC" autocomplete="off">
                                            <small style="color: red;" id="error-address"></small>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="">Postal Code</label>
                                            <input id="postal_code" name="postal_code" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="2648" autocomplete="off">
                                            <small style="color: red;" id="error-postal_code"></small>
                                        </div>

                                        
                                        <div class="col-md-12 mb-25">
                                            <label for="">Status *</label>
                                            <select id="status" name="status" class="form-control px-15"  data-select2-id="exampleFormControlSelect1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Select</option>
                                                <option value="APPROVED" >Approved</option>
                                                <option value="PENDING" >Pending</option>
                                                <option value="REJECTED" >Rejected</option>
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
    <script src="{{asset('assets/js/mgt-add-job.js')}}"></script>
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