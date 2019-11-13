<?php 
include("head.php");
include("../scripts_php/connexion.php");

?>

<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">



<?php

if(isset($_SESSION['userName'])==FALSE){
    echo "<h3>You are allready connected!!</h3>";
    
}
else{
    echo "<h3>User Inserted!</h3>";
    $nick=$_POST["nickRequest"];
    $pass=$_POST["PassRequest"];
        try {
            $dev1 = "INSERT INTO $TB_per (Nickname, PassW, User_type)
            VALUES ('$nick','$pass','Usr')";
            $conn->prepare($dev1)->execute();
            echo 'USER INSERTED';
        }catch (PDOException $e) {
            echo 'ERROR IN INSERT : ' . $e->getMessage();
        } 
}
?>

</div>
            </div>
    </div>
</div>

    <div class="footer-container">
            <?php include("../template/footer.php"); ?>
        </div>


</body>
</html>

