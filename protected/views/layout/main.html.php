<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified jQuerye JavaScript library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Latest compiled and minified bootstrap JavaScript library -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <title><?php echo $this->title; ?></title>
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
            <img src="/assets/example/bg_suburb.jpg" style="width:100%" class="img-responsive">
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
            <img src="http://lorempixel.com/2000/600/abstract/1" class="img-responsive">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Changes to the Grid</h1>
                    <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                    <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1500X500" class="img-responsive">
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

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-circle" src="http://placehold.it/140x140">
            <h2>Mobile-first</h2>
            <p>Tablets, phones, laptops. The new 3 promises to be mobile friendly from the start.</p>
            <p><a class="btn btn-default" href="#">View details »</a></p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle" src="http://placehold.it/140x140">
            <h2>One Fluid Grid</h2>
            <p>There is now just one percentage-based grid for Bootstrap 3. Customize for fixed widths.</p>
            <p><a class="btn btn-default" href="#">View details »</a></p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle" src="http://placehold.it/140x140">
            <h2>LESS is More</h2>
            <p>Improved support for mixins make the new Bootstrap 3 easier to customize.</p>
            <p><a class="btn btn-default" href="#">View details »</a></p>
        </div>
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="featurette">
        <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
        <h2 class="featurette-heading">Responsive Design. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">In simple terms, a responsive web design figures out what resolution of device it's being served on. Flexible grids then size correctly to fit the screen.</p>
    </div>

    <hr class="featurette-divider">

    <div class="featurette">
        <img class="featurette-image img-circle pull-left" src="http://placehold.it/512">
        <h2 class="featurette-heading">Smaller Footprint. <span class="text-muted">Lightweight.</span></h2>
        <p class="lead">The new Bootstrap 3 promises to be a smaller build. The separate Bootstrap base and responsive.css files have now been merged into one. There is no more fixed grid, only fluid.</p>
    </div>

    <hr class="featurette-divider">

    <div class="featurette">
        <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Flatness.</span></h2>
        <p class="lead">A big design trend for 2013 is "flat" design. Gone are the days of excessive gradients and shadows. Designers are producing cleaner flat designs, and Bootstrap 3 takes advantage of this minimalist trend.</p>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>This Bootstrap layout is compliments of Bootply. · <a href="http://www.bootply.com/62603">Edit on Bootply.com</a></p>
    </footer>

</div><!-- /.container -->

<script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>







<!-- JavaScript jQuery code from Bootply.com editor  -->

<script type="text/javascript">

    $(document).ready(function() {



    });

</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-40413119-1', 'bootply.com');
    ga('send', 'pageview');
</script>


<style>
    .ad {
        position: absolute;
        bottom: 70px;
        right: 48px;
        z-index: 992;
        background-color:#f3f3f3;
        position: fixed;
        width: 155px;
        padding:1px;
    }

    .ad-btn-hide {
        position: absolute;
        top: -10px;
        left: -12px;
        background: #fefefe;
        background: rgba(240,240,240,0.9);
        border: 0;
        border-radius: 26px;
        cursor: pointer;
        padding: 2px;
        height: 25px;
        width: 25px;
        font-size: 14px;
        vertical-align:top;
        outline: 0;
    }

    .carbon-img {
        float:left;
        padding: 10px;
    }

    .carbon-text {
        color: #888;
        display: inline-block;
        font-family: Verdana;
        font-size: 11px;
        font-weight: 400;
        height: 60px;
        margin-left: 9px;
        width: 142px;
        padding-top: 10px;
    }

    .carbon-text:hover {
        color: #666;
    }

    .carbon-poweredby {
        color: #6A6A6A;
        float: left;
        font-family: Verdana;
        font-size: 11px;
        font-weight: 400;
        margin-left: 10px;
        margin-top: 13px;
        text-align: center;
    }
</style>
<div class="ad collapse" style="height: 2px;">
    <button class="ad-btn-hide collapsed" data-toggle="collapse" data-target=".ad">×</button>
    <script async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&amp;serve=C6AILKT&amp;placement=bootplycom" id="_carbonads_js"></script><div id="carbonads"><span><span class="carbon-wrap"><a href="http://carbonads.com" class="carbon-img" target="_blank"><img src="https://assets.servedby-buysellads.com/p/manage/asset/id/15119" alt="" border="0" height="100" width="130" style="max-width:130px;"></a><a href="http://carbonads.com" class="carbon-text" target="_blank">Carbon Ads - a circle you want to be part of. Grab a spot.</a></span><a href="http://carbonads.net/" class="carbon-poweredby" target="_blank">ads via Carbon</a></span></div>
</div>
    <?php echo $body; ?>
</body>
</html>