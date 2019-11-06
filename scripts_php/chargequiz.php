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

?>

<div class="quizTest">

<?php
    
    $stmt = $conn->prepare("SELECT * FROM $TB_QUIZ");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
            $quiz_id=$v['ID_quiz'];
            $quiz_cat=$v['id_cat'];
            $quiz_nom =$v['Nom'];
            $quiz_creator = $v['Creator'];
            echo $quiz_id.'----'.$quiz_cat.'-------'.$quiz_nom.'---'.$quiz_creator.'<br>';
    } 

   // $max=siweof($quiz_id);



?>

</div>