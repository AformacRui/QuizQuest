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


function selectquizResp($T_name,$connexion,$field,$id) {
    $resp =[];
    $stmt = $connexion->prepare("SELECT * FROM $T_name where $field=$id");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {
        $resp[$k]= $v['Response'];
    }

    return $resp;
}

function selectquizRespType($T_name,$connexion,$field,$field2,$id,$type) {
    $resp =[];
    $stmt = $connexion->prepare("SELECT * FROM $T_name where $field=$id AND $field2=$type");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {
        $resp[$k]= $v['Response'];
    }

    return $resp;
}





function compare($data1,$data2,$data3){
    $max=10;
    $RC=0;
    $WC=0;
    for($i=0 ; $i<$max ; $i++){
        if(strcmp($data1[$i],$data2[$i])!==0) {
            $result[$i] = "'$data2[$i]' is the Wrong Answer! for question '$data3[$i]'";
            $WC++;
        }
        else {
        $result[$i] = "'$data2[$i]' is the Right Answer! for question '$data3[$i]'";
            $RC++;
        }
    }
    $result[10] = $RC;
    $result[11] = $WC;

    return $result;
}

?>