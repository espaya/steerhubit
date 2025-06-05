<div class="edit-profile edit-social mt-25">
    <div class="card">
        <div class="card-header  px-sm-25 px-3">
            <div class="edit-profile__title">
                <h6>social profiles</h6>
                <span class="fs-13 color-light fw-400">Add elsewhere links to your
                    profile</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-8 col-sm-10">
                    <div class="edit-profile__body mx-lg-20">
                        <!-- Error and success message div -->
                        <div id="form-error" class="alert alert-danger d-none"></div>
                        <div id="form-success" class="alert alert-success d-none"></div>

                        <form id="socials-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-30">
                                <label for="socialUrl">Facebook</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-facebook bg-facebook text-white wh-44 radius-xs justify-content-center" id="addon-wrapping1">
                                            <i class="lab la-facebook-f fs-18"></i>
                                        </span>
                                    </div>
                                    <input value="{{ $socials && $socials->facebook ? $socials->facebook : ''  }}" name="facebook" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping1" id="facebook">
                                </div>
                                <small id="facebook-error" class="error-message text-danger"></small>
                            </div>
                            <div class="mb-30">
                                <label for="twitterUrl">Twitter</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-twitter bg-twitter text-white wh-44 radius-xs justify-content-center" id="addon-wrapping2">
                                            <i class="lab la-twitter fs-18"></i>
                                        </span>
                                    </div>
                                    <input value="{{ $socials && $socials->twitter ? $socials->twitter : ''  }}" name="twitter" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping2" id="twitter">
                                </div>
                                <small id="twitter-error" class="error-message text-danger"></small>
                            </div>
                            <div class="mb-30">
                                <label for="instagramUrl">Instagram</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-instagram bg-instagram text-white wh-44 radius-xs justify-content-center" id="addon-wrapping4">
                                            <i class="lab la-instagram fs-18"></i>
                                        </span>
                                    </div>
                                    <input value="{{ $socials && $socials->instagram ? $socials->instagram : ''  }}" name="instagram" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-describedby="addon-wrapping4" id="instagram">
                                </div>
                                <small id="instagram-error" class="error-message text-danger"></small>
                            </div>
                            <div class="mb-30">
                                <label for="githubUrl">YouTube</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-youtube bg-youtube text-white wh-44 radius-xs justify-content-center" id="addon-wrapping5">
                                            <i class="lab la-youtube fs-18"></i>
                                        </span>
                                    </div>
                                    <input value="{{ $socials && $socials->youtube ? $socials->youtube : ''  }}" name="youtube" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping5" id="youtube">
                                </div>
                                 <small id="youtube-error" class="error-message text-danger"></small>
                            </div>
                            <div class="mb-30">
                                <label for="githubUrl">LinkedIn</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-linkedin bg-linkedin text-white wh-44 radius-xs justify-content-center" id="addon-wrapping5">
                                            <i class="lab la-linkedin fs-18"></i>
                                        </span>
                                    </div>
                                    <input value="{{ $socials && $socials->linkedin ? $socials->linkedin : ''  }}" name="linkedin" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping5" id="linkedin">
                                </div>
                                 <small id="linkedin-error" class="error-message text-danger"></small>
                            </div>
                            <div class="button-group d-flex flex-wrap pt-50 mb-15">
                                <button type="button" id="socials-button" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Update Social Profiles</button>
                                <button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>