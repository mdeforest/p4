<nav class='navbar navbar-expand-lg navbar-light'>
    <a class='navbar-brand' href='/'><img class='img-nav' src='/images/logo_transparent_title.png'></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class='collapse navbar-collapse' id="navbarToggler">
        <div class='navbar-nav ml-auto'>
            @guest
                <a class='nav-item nav-link mr-4 pink-font fnt-navbar-large' href='/login'>Log In</a>
                <a class='nav-item nav-link white-font text-box-pink fnt-navbar-large' href='/register'>Sign Up</a>
            @else
                <a class='nav-item nav-link mr-2 fnt-navbar-small' href='/search'>Search</a>
                <a class='nav-item nav-link mr-2 fnt-navbar-small' href='/modify'>Modify</a>
                <a class='nav-item nav-link fnt-navbar-small' href='/review'>Review</a>
                <div class='dropdown'>
                    <a class='nav-item nav-link ml-3 fnt-navbar-small dropdown-toggle' role='button' href='/account' id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user pink-font icon-space"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                        <a class='dropdown-item' href='/account'>My Account</a>
                        <a class="dropdown-item" href="#">Log Out</a>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>