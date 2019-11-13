<?php 
include("head.php");
include("../scripts_php/connexion.php");

session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
?>
<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">
                <h3>Session Terminated</h3>
                <?php session_destroy() ?>
                </div>
            </div>
    </div>
</div>

    <div class="footer-container">
            <?php include("../template/footer.php"); ?>
        </div>


</body>
</html>