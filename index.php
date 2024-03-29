<!DOCTYPE HTML>
<html>
<head>
<title>P-Stem</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- start slider -->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript">
            $(function() {

                $('#da-slider').cslider({
                    autoplay : true,
                    bgincrement : 450
                });

            });
        </script>
<!-- Owl Carousel Assets -->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
        <script>
            $(document).ready(function() {

                $("#owl-demo").owlCarousel({
                    items : 4,
                    lazyLoad : true,
                    autoPlay : true,
                    navigation : true,
                    navigationText : ["", ""],
                    rewindNav : false,
                    scrollPerPage : false,
                    pagination : false,
                    paginationNumbers : false,
                });

            });
        </script>
        <!-- //Owl Carousel Assets -->
<!----font-Awesome----->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
<div class="header_bg">
<div class="container">
    <div class="row header">
        <div class="logo navbar-left">
            <a href="index.html"><img src="images/logo.png" width="200px" /> </a>
        </div>
        <div class="col-md-3 navbar-right">
            <form>
                
                <input type="submit" value="Sign In" class="btn btn-default">
                <input type="submit" value="Register" class="btn btn-success">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<div class="container">
    <div class="row h_menu">
        <nav class="navbar navbar-default navbar-left" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">about us</a></li>
                <li><a href="institutions.html">institutions</a></li>
                <li><a href="events.html">events</a></li>
                <li><a href="careers.html">careers</a></li>
                <li><a href="contact.html">contact</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- start soc_icons -->
        </nav>
        <div class="soc_icons navbar-right">
            <ul class="list-unstyled text-center">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>   
        </div>
    </div>
</div>
<div class="slider_bg"><!-- start slider -->
    <div class="container">
        <div id="da-slider" class="da-slider text-center">
            <div class="da-slide">
                <h2>Engineering & Mathematics Educationl</h2>
            </div>
            <div class="da-slide">
                <h2>Promoting Science & Technology</h2>
            </div>
       </div>
    </div>
</div><!-- end slider -->
<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="main row">
            <div class="col-md-6 images_1_of_4 text-center">
                <span class="bg"><i class="fa fa-globe"></i></span>
                <h4><a href="#">Institutions</a></h4>
                <div id="content"></div>
            </div>
            <div class="col-md-6 images_1_of_4 bg1 text-center">
                <span class="bg"><i class="fa fa-laptop"></i></span>
                <h4><a href="#">Lorem Ipsum is</a></h4>
                
            </div>
             
        </div>
    </div>
</div><!-- end main -->

    
    <hr>
    <div id="contact"></div>

    <script>
        $(document).ready(function(){
            
            $.post('functions/work.php', 'action=institutions', function(ret) {
                console.log(ret);
                $.each(ret, function(index, val) {                    
                    console.log(val);
                    $('#content').append('<p><a id="iInfo" data-id="'+val.id+'">'+val.name+'</a></p>')
                });

            },'json');

            $(document).on('click','#iInfo',function(){
                $('.contact').remove();
                var iid = $(this).attr('data-id');
                $.post('functions/work.php', 'action=institution&id='+iid, function(ret) {
                    console.log(ret);
                    $.each(ret, function(index, val) {                        
                        //console.log(val);
                        $('#contact').append('<p class="contact">'+val+'</p>')
                    });

                },'json');
            });

            
        });
    </script>
</body>
</html>