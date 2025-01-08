<!DOCTYPE html>
<html lang="en">

<head>
    @push('meta')
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @endpush

    @stack('meta')
    @stack('title')
    @stack('link')
    
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Splide css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <!-- font wesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery CDN -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- slick Carousel CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
        integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
        crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Splide js -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <!-- Cookie js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LKS9PNJHHH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LKS9PNJHHH');
    </script>
    
</head>

<body>
    <!-- Header  -->
    <div class="container">
        <div class="menu-mobile">
            <div class="logo-mobile">
                <a href="#"><img src="{{ asset('images/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="hamburger">
                <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="toggleMenu" class="header-container">
            <header class="header container">
                <div class="header-holder">
                    <div class="brand-logo-holder">
                        <i class="fa fa-times" onclick="toggleMenu()"></i>
                        <div class="brand-logo">
                            <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <ul class="menu-bar" id="menu">
                        @if (Request::path() == 'search')
                            <li class="menu-bar-item active-page">
                                <a href="/search">Find BJJ Gyms</a>
                            </li>
                        @else
                            <li class="menu-bar-item">
                                <a href="/search">Find BJJ Gyms</a>
                            </li>
                        @endif

                        @if (Request::path() == 'dojo/new')
                            <li class="menu-bar-item active-page">
                                <a href="/dojo/new">Add New BJJ Gym</a>
                            </li>
                        @else
                            <li class="menu-bar-item">
                                <a href="/dojo/new">Add New BJJ Gym</a>
                            </li>
                        @endif

                        @if (Request::path() == 'resources')
                            <li class="menu-bar-item dropdown active-page">
                                <a href="https://bjjweb.com/content/" id="dropdown-carot" onclick="menuItemDropMobile">
                                    Resources
                                    <i class="caret-icon-menu fa fa-caret-down"></i>
                                </a>
                                <div id="drop-item-mobile" class="dropdown-content">
                                    <div
                                        style="opacity: 1; height: 16px; width: 160px; position: absolute; top: -16px;">
                                    </div>
                                    <a href="#">GUARDS</a>
                                    <a href="#">SWEEPS</a>
                                    <a href="#">SUBMISSIONS</a>
                                </div>
                            </li>
                        @else
                            <li class="menu-bar-item dropdown">
                                <a href="https://bjjweb.com/content/" id="dropdown-carot" onclick="menuItemDropMobile">
                                    Resources
                                    <i class="caret-icon-menu fa fa-caret-down"></i>
                                </a>
                                <div id="drop-item-mobile" class="dropdown-content">
                                    <div
                                        style="opacity: 1; height: 16px; width: 160px; position: absolute; top: -16px;">
                                    </div>
                                    <a href="#">GUARDS</a>
                                    <a href="#">SWEEPS</a>
                                    <a href="#">SUBMISSIONS</a>
                                </div>
                            </li>
                        @endif

                        @if (Request::path() == 'contact')
                            <li class="menu-bar-item active-page">
                                <a href="/contact">Contact</a>
                            </li>
                        @else
                            <li class="menu-bar-item">
                                <a href="/contact">Contact</a>
                            </li>
                        @endif

                        @auth
                            @if (isset($user->type) && $user->type == 'ADMIN')
                                <li class="menu-bar-item"><a href="/admin" title="Admin">Admin</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>
                <div class="btn-holder">
                    @auth
                        <a href="/user/logout" class="btn-login" style="color:white; text-decoration:none">LOG OUT</a>
                    @else
                        <div id="myBtn" class="btn-login">LOG IN</div>
                        <!-- The Modal -->
                        <div id="myModal" class="modal sign-up-modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close sign-up-close">&times;</span>
                                <form method="POST" class="sign-form" action="/user/login">
                                    @csrf
                                    <input class="sign-form-input" id="a" type="radio" name="service"
                                        checked="checked">
                                    <label class="sign-form-label sign-in-label" for="a">Sign In</label>
                                    <div class="service">
                                        <label class="credentials-label" for="email">Username or Email</label>
                                        <input class="credentials-input" type="email" id="email" name="email"
                                            size="30" required>
                                        <label class="credentials-label" for="password">Password</label>
                                        <div class="relative password1">
                                            <input class="credentials-input" id="password" type="password"
                                                name="password" minlength="6" required>
                                            <i class="far fa-eye" id="togglePassword"></i>
                                        </div>
                                        <div class="credentials-botom">
                                            <a class="forgot-pwd" href="/user/reset">Forgot your
                                                password?</a>
                                            <button class="sign-btn" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                    {{-- <input class="sign-form-input" id="b" type="radio" name="service"> --}}
                                    <label class="sign-form-label"><a href="/user/new">Sign Up</a></label>
                                    <div class="service">
                                        {{-- <label class="credentials-label" for="username">Username</label>
                                        <input class="credentials-input" type="text" id="username" name="username"
                                            required>
                                        <label class="credentials-label" for="new_email">Email</label>
                                        <input class="credentials-input" type="email" id="new_email" name="new_email" size="30"
                                            required>
                                        <label class="credentials-label" for="new_password">Password</label>
                                        <div class="relative new_password">
                                            <input class="credentials-input" id="new_password" type="password"
                                                name="new_password" minlength="6" required>
                                            <i class="far fa-eye" id="togglePassword2"></i>
                                        </div>
                                        <div id="credentials-bottom-signup" class="credentials-botom">
                                            <button class="sign-btn" type="submit">Sign Up</button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </header>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-social-holder">
                    <div class="footer-social-icons"><a id="facebook" href="#" target="_blank"></a></div>
                    <div class="footer-social-icons"><a id="twitter" href="#" target="_blank"></a></div>
                    <div class="footer-social-icons"><a id="youtube" href="#" target="_blank"></a></div>
                    <div class="footer-social-icons"><a id="instagram" href="#" target="_blank"></a></div>
                </div>
                <div class="footer-copyrights">
                    <p class="noselect">© 2020 Brazilian Jiu
                        Jitsu. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Go on top button -->
    <button onclick="topFunction()" id="goTop" title="Go to top">
        <img src="{{ asset('images/img/gotop.png') }}">
    </button>

    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        // Modal popup    

        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        if (btn != null) {
            btn.onclick = function() {
                modal.style.display = "block";
            }
        }

        // When the user clicks on <span> (x), close the modal
        if (span != undefined) {
            span.onclick = function() {
                modal.style.display = "none";
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // Toggle show-hide password

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        if (togglePassword != null) {
            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // // // toggle the eye slash icon
                console.log(this)
                this.classList.toggle("fa-eye-slash");
            });
        }
    </script>
</body>

</html>
