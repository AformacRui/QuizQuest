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

?>

<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
    <div class="main-container">
            <div class="main-box"> 

    <?php

    $max=10;

    $user_response = json_decode(stripslashes($_SESSION["user_response"]));
    //var_dump($id_quiz);
    //var_dump($user_response);
    
    //var_dump($_SESSION);

    foreach($user_response as $k=> $response)
    {
        if($k<$max)
        {
            $resp[$k] = $response;
        }
        if($k=$max)

        $id_q=$response;
    }

    //var_dump($id_q);



    $questions_bd= selectquiz('question',$conn,'id_quiz',$id_q);
    $response_bd = selectquizResp('response',$conn,'id_quiz',$id_q);

    //var_dump($questions_bd);
    //var_dump($response_bd);  

    $result = compare($response_bd,$resp,$questions_bd);

    //var_dump($result);

/*     $test='<Script> var ab="ola";
    document.writeln(ab)</Script>';

    var_dump($test); */

?>

        <h3>Results:</h3>

        <div id="Answer"><?php 
            for($i=0 ; $i<$max ; $i++) {
                echo "Q: $questions_bd[$i] <br>
                      R: $response_bd[$i] <br><br>";
            }
            ?>
            
        </div>
        <div id="Results"><?php 
            for($i=0 ; $i<$max ; $i++) {
                echo "$result[$i]<br><br>";
            }
            for($i=10 ; $i<=11 ; $i++){
                if($i==10){
                    echo "Good Answers= $result[$i]<br><br>";
                }
                else {
                    echo "Wrong Answers= $result[$i]<br><br>";
                }
            }
            
        ?></div>
        </div>

</div>
</div>
</div>
</div>


<div class="footer-container">
<?php include("../template/footer.php"); ?>
</div>


<?php include("../scripts_php/scripts.php");?>

        

</body>
</html>