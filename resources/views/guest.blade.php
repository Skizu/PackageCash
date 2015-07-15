<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page') | PostalCache</title>

    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-48x48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container-fixed">
    <header role="banner">
        <div class="containerCentered">
            <a href="/" class="img-logo">PostalCache</a>

            <nav class="main-menu" id="main-nav" role="navigation">
                <ul>
                    <li>
                        <a href="/about">About Us</a>
                    </li>
                    <li>
                        <a href="/promise">Our Promise</a>
                    </li>
                </ul>
            </nav>
            <div class="header-buttons">
                <a href="/auth/login" class="btn">Log In</a>
                <a href="/auth/register" class="btn">Sign Up</a>
            </div>
        </div>
    </header>
</div>
<main class="@yield('page')">
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
</main>
</body>
</html>