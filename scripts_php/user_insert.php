<?php 
           session_start();
           //$_SESSION['userName']="visitor";
           if(isset($_SESSION['userName'])) {
             echo "Your session is running " . $_SESSION['userName'];
           }
           else{
            $_SESSION['userName'] = "visitor";
           }

include("head.php");
include("../scripts_php/connexion.php");

$active_user = $_SESSION['userName'];

$nick=$_POST["nickRequest"];
$pass=$_POST["PassRequest"];
$exist=false;
$inserted=false;
$e_user=false;
$e_pass=false;

//var_dump($_POST);
if(strcmp("visitor",$active_user)==0){

    $stmt = $conn->prepare("SELECT * FROM $TB_per");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $nick_db[$k] =$v['Nickname'];    
    }


    
    foreach($nick_db as $db){
        if(strcmp($nick,$db) == 0){
            $exist=true;
        }
    }

    if($exist==true){
        $Texist="Account already exists!!";
    }

    if(strlen($pass)<=0){
        $Tpass ="You didn't indicate a password!!";
        $e_pass= true;
    }

    if(strlen($nick)<=0){
        $Tnick ="You didn't indicate your nickname!!";
        $e_user = true;
    }

    if($exist==false && strlen($pass)>0 && strlen($nick)>0){
        $_SESSION['userName'] = $nick;

        try {
            $user = "INSERT INTO $TB_per (Nickname, PassW, User_type)
            VALUES ('$nick','$pass','Usr')";
            $conn->prepare($user)->execute();
            echo 'USER INSERTED';
            $inserted=true;
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


if($inserted==true){

    echo "<h3>User Inserted and Connected!</h3>";
    
}
else {
    if($exist==false && $e_user==false && $e_pass==false){
        echo "<h3>You are connected</h3>";
    }

    if($exist==true)
    {
        echo "<h3>$Texist</h3>";
    }

    if($e_user==true){
        echo "<h3>$Tnick</h3>";
    }

    if($e_pass==true){
        echo "<h3>$Tpass</h3>";
    }
}


/* else {
    echo "<h3>Not inserted or connected to new Account!!</h3>";
} */
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

