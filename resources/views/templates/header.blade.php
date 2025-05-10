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
                                    @if(Auth::check() && Auth::user()->role == 'EMPLOYER')
                                    <li class="navigation__menu--item"><a class="navigation__menu--item__link" href="{{ route('employer.browse.candidate') }}">Browse Candidates</a></li>
                                    @endif
                                    @if(Auth::check() && Auth::user()->role == 'Candidate')
                                    <li class="navigation__menu--item"><a class="navigation__menu--item__link" href="{{ route('jobs') }}">Browse Jobs</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>

                        <div class="header__right__btn d-flex gap-3">
                            @if(Auth::user() && Auth::user()->id)
                                @if(Auth::user()->role == 'Candidate')
                                <a href="{{ route('employee') }}" class="small__btn d-none d-sm-flex no__fill__btn border-6 font-xs" aria-label="Account Button"> 
                                    <i class="rt-login"></i>Hi {{ ucfirst(Auth::user()->name) }}
                                </a>
                                @elseif(Auth::user()->role == 'EMPLOYER')
                                <a href="{{ route('employer.dashboard') }}" class="small__btn d-none d-sm-flex no__fill__btn border-6 font-xs" aria-label="Account Button"> 
                                    <i class="rt-login"></i>Hi, {{ ucfirst(Auth::user()->name) }}
                                </a>
                                @elseif(Auth::user()->role == 'admin')
                                <a href="{{ route('management') }}" class="small__btn d-none d-sm-flex no__fill__btn border-6 font-xs" aria-label="Account Button"> 
                                    <i class="rt-login"></i>Hi, {{ ucfirst(Auth::user()->name) }}
                                </a>
                                @endif
                            @else
                            <a href="{{ route('login') }}" class="small__btn d-none d-sm-flex no__fill__btn border-6 font-xs"> 
                                <i class="rt-login"></i>Sign In
                            </a>
                            @endif

                            @if(Auth::user() && Auth::user()->role == 'EMPLOYER')
                            <a href="{{ route('employer.job.submit') }}" class="small__btn d-none d-sm-flex d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
                            @elseif(Auth::user() && Auth::user()->role == 'admin')
                                <a href="{{ route('management.add.new') }}" class="small__btn d-none d-sm-flex d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
                            @endif
                            <button class="d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><i class="fa-sharp fa-regular fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>