<?php
    include("head.php");
    session_start();
    if(isset($_SESSION['userName'])) {
      echo "Your session is running " . $_SESSION['userName'];
    }

?>
<body>

<?php include("../template/header.php"); ?> 


    <div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav.php"); ?>
    <div class="main-container">
            <div class="main-box">
                <br><br><br><br>
                <?php include("../template/loginform.php") ?>

                </div>
            </div>
    </div>
</div>

    <div class="footer-container">
            <?php include("../template/footer.php"); ?>
        </div>
      
</body>
</html>