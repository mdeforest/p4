<nav class='navbar navbar-expand-lg navbar-light'>
    <a class='navbar-brand' href='/'><img src='images/logo_transparent_title.png'></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class='collapse navbar-collapse' id="navbarToggler">
        <div class='navbar-nav ml-auto'>
            @guest
                <a class='nav-item nav-link mr-4 pink-font fnt-navbar-large' href='/login'>Log In</a>
                <a class='nav-item nav-link white-font text-box-pink fnt-navbar-large' href='/signup'>Sign Up</a>
            @else
                <a class='nav-item nav-link mr-2 fnt-navbar-small' href='/search'>Search</a>
                <a class='nav-item nav-link mr-2 fnt-navbar-small' href='/modify'>Modify</a>
                <a class='nav-item nav-link fnt-navbar-small' href='/review'>Review</a>
                <a class='nav-item nav-link ml-3 fnt-navbar-small' href='/account'><i class="fas fa-user pink-font icon-space"></i></a>
            @endguest
        </div>
    </div>
</nav>