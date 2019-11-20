<?php 

session_start();
if(isset($_SESSION['userName'])) {
 echo "Your session is running " . $_SESSION['userName'];
}
else{
    $_SESSION['userName'] = "visitor";
}

include("../scripts_php/connexion.php");
//include("../function/CharQuizFunc.php"); 
 
include("../scripts_php/head.php");

var_dump($_SESSION["user_response"]);

?>