<header class="rts__section rts__header absolute__header">
    <div class="container-none">
        <div class="rts__menu__background">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="rts__logo">
                        <a href="{{ url('/') }}">
                            <img class="logo__image" src="{{asset('assets/img/logo/logo.png')}}" width="160" height="40" alt="logo">
                        </a>
                    </div>
                    <div class="rts__menu d-flex gap-5 gap-lg-4 gap-xl-5 align-items-center">
                        <div class="navigation d-none d-lg-block">
                            <nav class="navigation__menu" id="offcanvas__menu">
                                <ul class="list-unstyled">
                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/') }}" class="navigation__menu--item__link">Home</a>
                                    </li>
                                    <li class="navigation__menu--item"><a class="navigation__menu--item__link" href="{{ route('about') }}">About</a></li>
                                    
                                    <li class="navigation__menu--item"><a class="navigation__menu--item__link" href="{{ route('pricing') }}">Pricing</a></li>
                                    <li class="navigation__menu--item"><a class="navigation__menu--item__link" href="#">Browse Employees</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header__right__btn d-flex gap-3">
                            <a href="#" class="small__btn d-none d-sm-flex no__fill__btn border-6 font-xs" aria-label="Login Button" data-bs-toggle="modal" data-bs-target="#loginModal"> <i class="rt-login"></i>Sign In</a>
                            <a href="#" class="small__btn d-none d-sm-flex d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
                            <button class="d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><i class="fa-sharp fa-regular fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>