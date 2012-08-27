<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Интересный код <?php echo Config::getConfig('Project')->PROJECT['VERSION']?></title>

    <link href="/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/css/style.css" rel="stylesheet" >

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/form.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body data-spy="scroll" data-target="subnav-fixed">
<!-- Navbar
================================================== -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">Интересный код</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li>
                        <a href="/post">Оставить свой образчик</a>
                    </li>
                    <li>
                        <a href="/converter">Подстветка кода</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding-top:60px;">
