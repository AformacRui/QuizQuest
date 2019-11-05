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



try {
    //create de DB
    $conn = new PDO('mysql:host='.DB_HOST,DB_USER,DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}


$requete = "CREATE DATABASE IF NOT EXISTS QuizQuest DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

$conn->prepare($requete)->execute();

//conexion to server
$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);


try{
    $ques = "CREATE TABLE IF NOT EXISTS $TB_Question (
        ID_question int(20),
        Question TEXT,
        PRIMARY KEY (ID_question) 
        )";

        $conn->prepare($ques)->execute();
        echo " SUCCESS IN TB8QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}


try{
    $res = "CREATE TABLE IF NOT EXISTS $TB_Response (
        ID_response int(20),
        Response TEXT,
        PRIMARY KEY (ID_response) 
        )";

        $conn->prepare($res)->execute();
        echo " SUCCESS IN TB8QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}

try{
    $quiz = "CREATE TABLE IF NOT EXISTS $TB_QUIZ (
        ID_quiz int(10),
        id_quest int(20),
        id_resp int(20),
        Nom varchar(250),
        Creator varchar(250),
        PRIMARY KEY (ID_quiz),
        FOREIGN KEY (id_quest) references $TB_Question(ID_question),
        FOREIGN KEY (id_resp) references $TB_Response(ID_response)
        )";

        $conn->prepare($quiz)->execute();
        echo " SUCCESS IN TB8QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}


try{
    $cat = "CREATE TABLE IF NOT EXISTS $TB_Cat (
        ID_category int(3),
        id_quiz int(10),
        Name_cat TEXT,
        PRIMARY KEY (ID_category),
        FOREIGN KEY (id_quiz)  references $TB_QUIZ(ID_quiz)
        )";

        $conn->prepare($cat)->execute();
        echo " SUCCESS IN TB8QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}


try{
    $per = "CREATE TABLE IF NOT EXISTS $TB_per (
        ID_per int(20),
        id_quiz int(10),
        Nickname TEXT,
        PRIMARY KEY (ID_per),
        FOREIGN KEY (id_quiz)  references $TB_QUIZ(ID_quiz)
        )";

        $conn->prepare($per)->execute();
        echo " SUCCESS IN TB8QUESTION ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}

 try {
    $U_type = "CREATE TABLE IF NOT EXISTS $TB_Tuser (
    ID_Utype INT(2) AUTO_INCREMENT NOT NULL,
    id_per INT(20),
    User_Type VARCHAR(100) NOT NULL,
    PRIMARY KEY (ID_Utype),
    FOREIGN KEY (id_per) references $TB_per(ID_per)
    )";
    
    $conn->prepare($U_type)->execute();
    echo " SUCCESS IN TUSER ";
    
    }catch (PDOException $e) {
        echo 'ERROR IN PAYS : ' . $e->getMessage();
    } 
    

?>