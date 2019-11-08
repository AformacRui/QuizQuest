<?php 

    include("head.php");
    
   include("connexion.php");

   session_start();
   if(isset($_SESSION['userName'])) {
     echo "Your session is running " . $_SESSION['userName'];
   }

    $qnick=$_SESSION['userName']; 
    $qname = $_POST["qname"];

    $qcat = $_POST["cat"];

//var_dump($_POST);

//echo $qnick;




/* function selectID($conn,$value,$t_name,$Field,$FIELD2){

    $stmt = $conn->prepare("SELECT $Field,$FIELD2 FROM $t_name");
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    foreach($stmt->fetchAll() as $k=>$v) {
        if(strcmp($value,$FIELD2)==0)
        return $v['$Field'];
    }
} */


/*     try{
        $cat = "INSERT INTO $TB_Cat (Name_cat)
        VALUES ('$qcat')";
        $conn->prepare($cat)->execute();
    }catch (PDOException $e) {
        echo 'ERROR IN CATEGORY' . $e->getMessage();
    } */

    $stmt = $conn->prepare("SELECT * FROM $TB_per where Nickname= '$qnick'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $id_per =$v['ID_per'];
            //echo $id_cat;
    }

    $stmt = $conn->prepare("SELECT ID_category FROM $TB_Cat where Name_cat= '$qcat'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $id_cat =$v['ID_category'];
            //echo $id_cat;
    }

    //var_dump($id_cat);
    try{
        $quiz = "INSERT INTO $TB_QUIZ (id_cat,Nom,Creator,active)
        VALUES ('$id_cat','$qname','$qnick',0)";
        $conn->prepare($quiz)->execute();
    }catch (PDOException $e) {
        echo 'ERROR IN QUIZ' . $e->getMessage();
    }
 
    $stmt = $conn->prepare("SELECT ID_quiz FROM $TB_QUIZ order by ID_quiz DESC LIMIT 1");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $id_quiz =$v['ID_quiz'];
            //echo $id_quiz;
    } 


    try{
        $quiz = "INSERT INTO $TB_person_quiz (ID_person,ID_quiz)
        VALUES ('$id_per','$id_quiz')";
        $conn->prepare($quiz)->execute();
    }catch (PDOException $e) {
        echo 'ERROR IN QUIZ' . $e->getMessage();
    }



    for($i=0 ; $i<10;$i++)
    {
        $var[$i] = $_POST["$i"];
        //echo $var;
        try {
        $quest = "INSERT INTO $TB_Question (id_quiz,Question)
        VALUES ('$id_quiz','$var[$i]')";
        $conn->prepare($quest)->execute();
        }catch (PDOException $e) {
            echo 'ERROR IN QUESTION' . $e->getMessage();
        }
    }



    for($i=11 ; $i<21;$i++)
    {
        $var[$i] = $_POST["$i"];
        try {
        $res = "INSERT INTO $TB_Response (id_quiz,Response)
        VALUES ('$id_quiz','$var[$i]')";
        $conn->prepare($res)->execute();
        }catch (PDOException $e) {
            echo 'ERROR IN RESPONSE' . $e->getMessage();
        }
    } 


/* $stmt = $conn->prepare("SELECT ID_response FROM $TB_Response");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

foreach($stmt->fetchAll() as $k=>$v) {
    echo($v['ID_response']); 
}*/
?>

<body>
    <?php include("../template/header.php"); ?> 


    <div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">
                <h3>Quiz Inserted!</h3>
            </div>
            </div>
    </div>
</div>

    <div class="footer-container">
            <?php include("../template/footer.php"); ?>
        </div>




</body>
</html>