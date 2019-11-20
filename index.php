<?php 

session_start();
//$_SESSION['userName'] ="visitor";
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
else{
    $_SESSION['userName'] ="visitor";
}

include("scripts_php/head.php");
include("scripts_php/connexion.php");

?>


    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php include("template/header.php");?> 

        <div class="container-fluid d-flex ">
            
            <?php include("template/main_nav.php"); ?>


        <div class="main-container" id='validChoice'>
            <div class="row">
                <?php include("template/vitrine.php"); ?>
            </div>
        </div> <!-- #main-container -->
        
        </div>
        <div class="footer-container">
            <?php include("template/footer.php"); ?>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <script src="js/main.js"></script>
        


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
