<?php 
include("connexion.php");

?>



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