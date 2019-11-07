<?php

define ('DB_USER', 'Herui');
define ('DB_PASSWORD', '143OMG541ZINK');
define ('DB_HOST', 'localhost');
define ('DB_NAME','QuizQuest');


$TB_Question = "Question";
$TB_Response = "Response";
$TB_QUIZ = "Quiz";
$TB_Cat ="Category";
$TB_per = "Person";
$TB_person_quiz="Person_Quiz";



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
?>