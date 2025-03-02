<footer class="rts__section  footer__home__one">
    <div class="container">
        <div class="row">
            <div class="footer__wrapper d-flex flex-wrap flex-column flex-sm-row gap-4 gap-md-0 gap-sm-3 justify-content-between pt-60 pb-60">
                <div class="rts__footer__widget max-320">
                    <a href="{{ url('/') }}" class="footer__logo" aria-label="logo">
                        <img src="{{asset('assets/img/logo/logo.png')}}" width="180" height="40" alt="logo">
                    </a>
                    <p class="mt-4">Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.
                    </p>
                </div>

                <!-- footer menu -->
                 <div class="rts__footer__widget max-content">
                    <div class="font-20 fw-medium mb-3 h6">Links</div>
                    <ul class="list-unstyled">
                        <li><a href="#" aria-label="footer__menu__link">Browse Employees</a></li>
                        <li><a href="{{ route('pricing') }}" aria-label="footer__menu__link">Pricing</a></li>
                        <li><a href="#" aria-label="footer__menu__link">Blog & News</a></li>
                        <li><a href="{{ route('faq') }}" aria-label="footer__menu__link">FAQ</a></li>
                        <li><a href="{{ route('privacy.policy') }}" aria-label="footer__menu__link">Privacy Policy</a></li>
                        <li><a href="{{ route('terms.conditions') }}" aria-label="footer__menu__link">Terms & Conditions</a></li>
                        <li><a href="{{ route('contact') }}" aria-label="footer__menu__link">Contact Us</a></li>
                    </ul>
                 </div>

                 <div class="rts__footer__widget max-content">
                    <div class="font-20 fw-medium mb-3 h6 ">Contact Us</div>
                    <ul class="list-unstyled mb-3">
                        <li><a href="#"><i class="fa-light fa-location-dot"></i>Lorton,VA</a></li>
                        <li><a href="callto:+880171234578"><i class="fa-light fa-phone"></i>+(61) 545-432-234</a></li>
                        <li><a href="mailto:info@steerhubit.com"><i class="fa-light fa-envelope"></i> info@steerhubit.com</a></li>
                    </ul>
                    <div class="font-20 fw-medium mb-20 text-dark">Social Link</div>
                    <div class="rts__social d-flex gap-4">
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

                 <!-- newsletter form -->
                  <div class="rts__footer__widget max-320">
                    <div class="font-20 fw-medium mb-3 h6 ">Subscribe Our Newsletter</div>
                    <p class="br-sm-none">Subscribe Our Newsletter get <br> Update our New Course</p>
                    <form id="subscribeForm" action="#" method="post" class="d-flex align-items-center justify-content-between mt-4 newsletter">
                        @csrf
                        <input class="@error('subscribe_email') is-invalid @enderror" type="text" name="subscribe_email" id="semail" placeholder="Enter your email" autocomplete="off">
                        <button type="submit" class="rts__btn fill__btn">Subscribe</button>
                    </form>
                    <div id="subscribeMessage" class="mt-2"></div> <!-- Message display -->
                  </div>
                 <!-- newsletter form end -->
            </div>
        </div>
    </div>
    <div class="rts__copyright">
        <div class="container">
            <p class="text-center fw-medium py-4">
                Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">SteerHubIT</a> All Rights Reserved
            </p>
        </div>
    </div>
</footer>
<!-- jQuery AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subscribeForm').submit(function(e) {
            e.preventDefault(); // Prevent page reload

            let email = $('#semail').val();
            let token = $('input[name="_token"]').val(); // Get CSRF token

            $.ajax({
                url: "{{ route('subscribe.mailing.list') }}", // Adjust if necessary
                type: "POST",
                data: {
                    _token: token,
                    subscribe_email: email
                },
                success: function(response) {
                    $('#subscribeMessage').html('<div class="alert alert-success">Subscribed successfully!</div>');
                    $('#semail').val(""); // Clear input field
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors && errors.subscribe_email) {
                        $('#subscribeMessage').html('<div class="alert alert-danger">' + errors.subscribe_email[0] + '</div>');
                    } else {
                        $('#subscribeMessage').html('<div class="alert alert-danger">Something went wrong. Try again.</div>');
                    }
                }
            });
        });
    });
</script>
