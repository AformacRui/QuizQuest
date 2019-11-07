<?php
    include("head.php");
    session_start();
    //var_dump($_POST);


    include("connexion.php");


?>
<body>
<?php include("../template/header.php"); ?> 


    <div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav.php"); ?>
    <div class="main-container">
            <div class="main-box">
                <br><br><br><br>
<?php

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



    foreach($nick as $inserted) {
        if(strcmp($inserted,$postnick) ==0){
            $userinserted = TRUE;
        }
    }
    foreach($pass as $pinsert)
    {
        if(strcmp($inserted,$pwinserted) ==0){
            $pwinserted = TRUE;
        }
    }

    if(($userinserted==TRUE && $userinserted==TRUE)){
        $_SESSION['userName'] = $postnick;
        echo "<h3>Session Started</h3>";
        //echo $_SESSION['userName'];
    }


    if(($userinserted==FALSE && $userinserted==TRUE) ||($userinserted==TRUE && $userinserted==FALSE)||(($userinserted==FALSE && $userinserted==FALSE))){
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