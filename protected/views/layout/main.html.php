<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="/assets/css/main.css">

    <title><?= $this->title; ?></title>
</head>

<body>

<div class="navbar-wrapper">
    <div class="container">
        <?= $this->renderPartial('partials/main_menu.html.php'); ?>
    </div><!-- /container -->
</div><!-- /navbar wrapper -->


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="/assets/img/slider/1.jpg" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bootstrap 3 Carousel Layout</h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="/assets/img/slider/2.jpg" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Changes to the Grid</h1>
                    <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                    <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="/assets/img/slider/3.jpg" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Percentage-based sizing</h1>
                    <p>With "mobile-first" there is now only one percentage-based grid.</p>
                    <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <?= $body; ?>
    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
    </footer>

</div><!-- /.container -->

<!-- Latest compiled and minified jQuerye JavaScript library -->
<script src="/assets/js/jquery-2.1.4.min.js"></script>

<!-- Latest compiled and minified bootstrap JavaScript library -->
<script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>