<?php 

session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}

include("head.php");
    
include("connexion.php");
?>



<?php
    //var_dump($_POST);


    $results = $_POST;

    $qnick=$_SESSION['userName']; 
    $qname = $_POST["qname"];

    $qcat = $_POST["cat"];
    $n=0;



foreach($results as $k=> $res) {
      $index [$n] = $k;
      $n++;
}

foreach($index as $f => $in){
        $r_final[$f]=$results[$in];
}



for($i=2 ; $i<sizeof($r_final);$i=$i+5){
        $question[$i]= $r_final[$i];
}

for($i=3 ; $i<sizeof($r_final);$i=$i+5){
        $b_resp[$i]= $r_final[$i];
}

//var_dump($b_resp);

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

    for($i=3 ; $i<sizeof($r_final);$i=$i+5){
        $r_final[$i];
        $m1=$i+1;
        $m2=$i+2;
        $m3=$i+3;
        
        try {
        $res_b = "INSERT INTO $TB_Response (id_quiz,Response,valor)
        VALUES ('$id_quiz','$r_final[$i]','1')";
        $conn->prepare($res_b)->execute();
        }catch (PDOException $e) {
            echo 'ERROR IN RESPONSE' . $e->getMessage();
        }

        try {
                $res_m1 = "INSERT INTO $TB_Response (id_quiz,Response,valor)
                VALUES ('$id_quiz','$r_final[$m1]','0')";
                $conn->prepare($res_m1)->execute();
                }catch (PDOException $e) {
                    echo 'ERROR IN RESPONSE' . $e->getMessage();
                }

                try {
                        $res_m2 = "INSERT INTO $TB_Response (id_quiz,Response,valor)
                        VALUES ('$id_quiz','$r_final[$m2]','0')";
                        $conn->prepare($res_m2)->execute();
                        }catch (PDOException $e) {
                            echo 'ERROR IN RESPONSE' . $e->getMessage();
                        }


                        try {
                                $res_m3 = "INSERT INTO $TB_Response (id_quiz,Response,valor)
                                VALUES ('$id_quiz','$r_final[$m3]','0')";
                                $conn->prepare($res_m3)->execute();
                                }catch (PDOException $e) {
                                    echo 'ERROR IN RESPONSE' . $e->getMessage();
                                }

    } 
        


        //var_dump($question);

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