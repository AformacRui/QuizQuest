<?php


session_start();
if(isset($_SESSION['userName'])) {
 echo "Your session is running " . $_SESSION['userName'];
}
else{
    $_SESSION['userName'] = "visitor";
}


include("../scripts_php/connexion.php");
include("../function/CharQuizFunc.php"); 
 
include("../scripts_php/head.php");


?>

<body>
    

    <?php

    $user_response = $_SESSION["user_response"];
    $id_quiz = $_SESSION["quiz_id"];
    //var_dump($id_quiz);
    //var_dump($user_response);
    
    var_dump($_SESSION);

/*
    var_dump($id_quiz);

    $questions_bd= selectquiz('question',$conn,'id_quiz',$id_quiz);
    $response_bd = selectquiz('response',$conn,'id_quiz',$id_quiz);

    var_dump($questions_bd);
    var_dump($response_bd);  */



/*     $test='<Script> var ab="ola";
    document.writeln(ab)</Script>';

    var_dump($test); */

?>
</body>
</html>