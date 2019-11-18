<?php 
           session_start();
           if(isset($_SESSION['userName'])) {
             echo "Your session is running " . $_SESSION['userName'];
           }
           else{
            $_SESSION['userName'] = "visitor";
           }

include("head.php");
include("../scripts_php/connexion.php");


if(isset($_SESSION['userName'])=="visitor"){

    $exist=false;

    $stmt = $conn->prepare("SELECT * FROM $TB_per");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $nick_db[$k] =$v['Nickname'];    
    }

    $nick=$_POST["nickRequest"];
    $pass=$_POST["PassRequest"];
    
    foreach($nick_db as $db){
        if(strcmp($nick,$db) == 0){
            $exist=true;
        }
    }

    if($exist==true){
        $Texist="Account already exists!!";
    }
    else{
        $_SESSION['userName'] = $nick;

        try {
            $dev1 = "INSERT INTO $TB_per (Nickname, PassW, User_type)
            VALUES ('$nick','$pass','Usr')";
            $conn->prepare($dev1)->execute();
            echo 'USER INSERTED';
        }catch (PDOException $e) {
            echo 'ERROR IN INSERT : ' . $e->getMessage();
        } 
    }
    
    
    
}


?>

<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">



<?php

$verify=$_SESSION['userName'];
if(strcmp($verify,$nick)==0){

    echo "<h3>User Inserted and Connected!</h3>";
    
}

if($exist==true)
{
    echo "<h3>$Texist</h3>";
}
else {
    echo "<h3>Not inserted or connected to new Account!!</h3>";
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

