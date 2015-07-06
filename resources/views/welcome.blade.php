<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PostalCache</title>

    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-48x48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        @font-face {
            font-family: "title-decorative";
            src: url("/fonts/festivo7.eot");
            src: url("/fonts/festivo7.eot?#iefix") format("embedded-opentype"),
            url("/fonts/festivo7.woff") format("woff"),
            url("/fonts/festivo7.ttf") format("truetype"),
            url("/fonts/festivo7.svg#webfont") format("svg");
        }

        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        a {
            font-size: inherit;
            line-height: inherit;
            font-weight: bold;
            color: #0079ad;
            text-decoration: none;
        }

        ul, ol {
            list-style-type: none;
            padding-left: 0;
        }

        .container-fixed {
            width: 100%;
            display: table;
            position: relative;
            top: 0;
            left: 0;
            z-index: 1;
        }

        header {
            display: block;
            position: relative;
            z-index: 5;
            padding: 15px;
        }

        header .main-menu {
            margin: 0 0 0 12px;
            display: inline-block;
            vertical-align: middle;
        }

        header .img-logo {
            display: inline-block;
            overflow: hidden;
            text-indent: -999em;
            vertical-align: middle;
            background: url("/images/logo.png") center top no-repeat;
            width: 39px;
            height: 33px;
            background-size: 39px 33px;
            padding: 5px;
        }

        header .main-menu ul li {
            display: inline-block;
            padding: 0 12px;
        }

        header .main-menu ul a {
            padding-bottom: 5px;
            font-size: 16px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            text-shadow: 0 0 3px rgba(0, 121, 173, 0.4);
        }

        header .main-menu ul a:hover {
            border-bottom: 2px solid #0079ad;
        }

        header div.header-buttons {
            float: right;
            -ms-touch-action: none;
            touch-action: none;
        }

        main {
            display: table;
            width: 100%;
            height: 100%;
            margin-top: -81px;
            padding-top: 80px;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-family: "title-decorative";
            font-size: 72px;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .slogan {
            font-size: 30px;
            margin-bottom: 60px;
            font-weight: 800;
        }

        .more {
            font-size: 24px;
        }

        .btn {
            display: inline-block;
            padding: 9px 15px 10px;
            margin-bottom: 0;
            background: #009cde;
            font-size: 15px;
            font-size: 1rem;
            font-weight: bold;
            line-height: 1.4545em;
            -webkit-font-smoothing: antialiased;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 5px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .btn-wide {
            padding-left: 5em;
            padding-right: 5em;
        }

        .btn-white {
            background: #fff;
        }

        .btn:hover {
            background: #0c8dc4;
        }
    </style>
</head>
<body>
<div class="container-fixed">
    <header role="banner">
        <div class="containerCentered">
            <a href="/home" class="img-logo">PostalCache</a>

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
                <a href="/login" class="btn">Log In</a>
                <a href="/register" class="btn">Sign Up</a>
            </div>
        </div>
    </header>
</div>
<main>
    <div class="container">
        <div class="content">
            <div class="title">Package, Manage, Spend</div>
            <div class="slogan">Freedom to manage your money</div>
            <a href="/promise" class="btn btn-wide more">Find Out More</a>
        </div>
    </div>
</main>
</body>
</html>
