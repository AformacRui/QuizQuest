<?php
include("head.php");
?>

<div class="form-container">
            <form action="scripts_php/insert_quiz.php" method="post">
                <span class="quizT">Insert your Quiz here<br><br></span>

                Your Nickname: <input type="text" name="nickname"><br>
                Quiz name: <input type="text" name="qname"><br>
                Category: <input type="text" name="cat"><br><br><br>  <!-- change to a radio option latter -->

                <?php  
                $max=10;
                $j=$max+1;
                for($i=0; $i<$max;$i++)
                    for($i=0 ; $i<$max ; $i++)
                    {   
                        
                        echo "Question: <input type='text' name='$i'> <br>";
                        echo "Response: <input type='text' name='$j'> <br>";
                        echo "--------------------------------------- <br> <br>";
                        $j++;
                    
                    }
                ?>

                <input type="submit">
            </form>
        </div>

<?php 
define ('DB_USER', 'Herui');
define ('DB_PASSWORD', '143OMG541ZINK');
define ('DB_HOST', 'localhost');
define ('DB_NAME','QuizQuest');


$TB_Tuser = "USER_Type";
$TB_Question = "Question";
$TB_Response = "Response";
$TB_QUIZ = "Quiz";
$TB_Cat ="Category";
$TB_per = "Person";

$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);

$qnick=$_POST["nickname"]; 
$qname = $_POST["qname"];

$qcat = $_POST["cat"];

var_dump($_POST);

//echo $qcat;




/* function selectID($conn,$value,$t_name,$Field,$FIELD2){

    $stmt = $conn->prepare("SELECT $Field,$FIELD2 FROM $t_name");
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    foreach($stmt->fetchAll() as $k=>$v) {
        if(strcmp($value,$FIELD2)==0)
        return $v['$Field'];
    }
} */


try{
    $cat = "INSERT INTO $TB_Cat (Name_cat)
    VALUES ('$qcat')";
    $conn->prepare($cat)->execute();
}catch (PDOException $e) {
    echo 'ERROR IN CATEGORY' . $e->getMessage();
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
    $quiz = "INSERT INTO $TB_QUIZ (id_cat,Nom,Creator)
    VALUES ('$id_cat','$qname','$qnick')";
    $conn->prepare($quiz)->execute();
}catch (PDOException $e) {
    echo 'ERROR IN QUIZ' . $e->getMessage();
}

$stmt = $conn->prepare("SELECT ID_quiz FROM $TB_QUIZ order by ID_quiz DESC LIMIT 1");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $id_quiz =$v['ID_quiz'];
        echo $id_quiz;
} 


for($i=0 ; $i<10;$i++)
{
    $var[$i] = $_POST["$i"];
    try {
    $value = "INSERT INTO $TB_Question (id_quiz,Question)
    VALUES ('$id_quiz','$var[$i]')";
    $conn->prepare($value)->execute();
    }catch (PDOException $e) {
        echo 'ERROR IN QUESTION' . $e->getMessage();
    }
}



for($i=11 ; $i<21;$i++)
{
    $var[$i] = $_POST["$i"];
    try {
    $value = "INSERT INTO $TB_Response (id_quiz,Response)
    VALUES ('$id_quiz','$var[$i]')";
    $conn->prepare($value)->execute();
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

