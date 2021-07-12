<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white pl-4 pr-5"> <a class="navbar-brand mr-4" href="#"><strong>Ipso</strong></a> <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" id="" role="button" ">Home</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M5.22 8.72a.75.75 0 000 1.06l6.25 6.25a.75.75 0 001.06 0l6.25-6.25a.75.75 0 00-1.06-1.06L12 14.44 6.28 8.72a.75.75 0 00-1.06 0z"></path></svg>
                    </a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path><path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path></svg>

                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="{{ route('report.index') }}">
                                                <h6 class="mb-0">View Reports</h6> <small class="text-muted">All tools</small>
                                            </a> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4.75 0A2.75 2.75 0 002 2.75v16.5A2.75 2.75 0 004.75 22h11a.75.75 0 000-1.5h-11c-.69 0-1.25-.56-1.25-1.25V18A1.5 1.5 0 015 16.5h7.25a.75.75 0 000-1.5H5c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H18.5v7a.75.75 0 001.5 0V.75a.75.75 0 00-.75-.75H4.75z"></path><path d="M20 13.903l2.202 2.359a.75.75 0 001.096-1.024l-3.5-3.75a.75.75 0 00-1.096 0l-3.5 3.75a.75.75 0 101.096 1.024l2.202-2.36v9.348a.75.75 0 001.5 0v-9.347z"></path></svg>
                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="{{ route('report.create') }}">
                                                <h6 class="mb-0">Add New Report</h6> <small class="text-muted">All tools</small>
                                            </a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.5 2.75a.75.75 0 00-1.5 0v18.5c0 .414.336.75.75.75H20a.75.75 0 000-1.5H2.5V2.75z"></path><path d="M22.28 7.78a.75.75 0 00-1.06-1.06l-5.72 5.72-3.72-3.72a.75.75 0 00-1.06 0l-6 6a.75.75 0 101.06 1.06l5.47-5.47 3.72 3.72a.75.75 0 001.06 0l6.25-6.25z"></path></svg>

                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="{{ route('report.index') }}">
                                                <h6 class="mb-0">View Numbers</h6> <small class="text-muted">All Monthly Weekly Numbers</small>
                                            </a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mou.index') }}" id="" role="button" ">MoUs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('image.index') }}" id="" role="button" ">Gallery</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Files
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M5.22 8.72a.75.75 0 000 1.06l6.25 6.25a.75.75 0 001.06 0l6.25-6.25a.75.75 0 00-1.06-1.06L12 14.44 6.28 8.72a.75.75 0 00-1.06 0z"></path></svg>
                    </a>
                    <div class="dropdown-menu" id="dropdown-menu4" aria-labelledby="navbarDropdown4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path><path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path></svg>

                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="">
                                                <h6 class="mb-0">Banners</h6> <small class="text-muted"></small>
                                            </a> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4.75 0A2.75 2.75 0 002 2.75v16.5A2.75 2.75 0 004.75 22h11a.75.75 0 000-1.5h-11c-.69 0-1.25-.56-1.25-1.25V18A1.5 1.5 0 015 16.5h7.25a.75.75 0 000-1.5H5c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H18.5v7a.75.75 0 001.5 0V.75a.75.75 0 00-.75-.75H4.75z"></path><path d="M20 13.903l2.202 2.359a.75.75 0 001.096-1.024l-3.5-3.75a.75.75 0 00-1.096 0l-3.5 3.75a.75.75 0 101.096 1.024l2.202-2.36v9.348a.75.75 0 001.5 0v-9.347z"></path></svg>
                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="">
                                                <h6 class="mb-0"></h6> <small class="text-muted">All tools</small>
                                            Brochures</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.5 2.75a.75.75 0 00-1.5 0v18.5c0 .414.336.75.75.75H20a.75.75 0 000-1.5H2.5V2.75z"></path><path d="M22.28 7.78a.75.75 0 00-1.06-1.06l-5.72 5.72-3.72-3.72a.75.75 0 00-1.06 0l-6 6a.75.75 0 101.06 1.06l5.47-5.47 3.72 3.72a.75.75 0 001.06 0l6.25-6.25z"></path></svg>

                                        </div>
                                        <div class="d-flex flex-column"> <a class="dropdown-item" href="{{ route('report.index') }}">
                                                <h6 class="mb-0"></h6> <small class="text-muted"></small>
                                            Original Reports</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Meeting Minutes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('testimonial.index') }}" id="" role="button" ">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Trainings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Trips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Success Stories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Conference</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" id="" role="button" ">Blog</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto flex-row-reverse">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>