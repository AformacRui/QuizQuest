<?php

            session_start();
           if(isset($_SESSION['userName'])) {
             echo "Your session is running " . $_SESSION['userName'];
           }
           else{
            $_SESSION['userName'] = "visitor";
           }
    include("head.php");

    //var_dump($_POST);


    include("connexion.php");

    
    $pwinserted = false;
    $userinserted = false;
    $incorrect = false;
    $postnick = $_POST["nicklog"];
    $postpw = $_POST["passlog"];

    $stmt = $conn->prepare("SELECT * FROM $TB_per");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $nick[$k] =$v['Nickname'];
            $pass[$k] = $v['PassW'];    
    }

    $aux = sizeof($nick);

    for($i=0 ; $i<$aux ;$i++) {
        if(strcmp($nick[$i],$postnick) ==0){
            $userinserted = TRUE;
        }
        if(strcmp($pass[$i],$postpw) ==0){
            $pwinserted = TRUE;
            
        }
    }


    if(($userinserted==TRUE && $pwinserted==TRUE)){
        $_SESSION['userName'] = $postnick;
        
        //echo $_SESSION['userName'];
    }


?>
<body>
<?php include("../template/header.php"); ?> 


    <div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
    <div class="main-container">
            <div class="main-box">
                <br><br><br><br>
<?php

    if(($userinserted==TRUE && $pwinserted==TRUE)){
        echo "<h3>Session Started</h3>";
        //echo $_SESSION['userName'];
    }


    if(($userinserted==FALSE && $pwinserted==TRUE) ||($userinserted==TRUE && $pwinserted==FALSE)||(($userinserted==FALSE && $pwinserted==FALSE))){
        $incorrect = true;
    }

    if($incorrect==true)
    {
        echo "<h3>Values inserted were Incorrect</h3>";
        include("../template/loginform.php");
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