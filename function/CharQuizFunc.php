<?php

    function chargequizmenu($T_name,$connexion,$cat,$active){
        $quiz_nom[]=null;
        $stmt = $connexion->prepare("SELECT * FROM $T_name where id_cat=$cat");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach($stmt->fetchAll() as $k=>$v) {
            if($v['active'] == $active){
                $quiz_nom[$k] =$v['Nom'];
            }
    } 
    return $quiz_nom;
}


function chargequizmenuID($T_name,$connexion,$cat,$active){
    $quiz_id[]=null;
    $stmt = $connexion->prepare("SELECT * FROM $T_name where id_cat=$cat");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {
        if($v['active'] == $active){

            $quiz_id[$k] = $v['ID_quiz'];
        }
    } 
return $quiz_id;
}

function selectquiz($T_name,$connexion,$field,$id) {
    $question =[];
    $stmt = $connexion->prepare("SELECT * FROM $T_name where $field=$id");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {
        $question[$k]= $v['Question'];
    }

    return $question;
}

?>