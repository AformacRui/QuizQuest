<?php 

include("../scripts_php/head.php");

include("../scripts_php/connexion.php");

session_start();
if(isset($_SESSION['userName'])) {
 echo "Your session is running " . $_SESSION['userName'];
}



?>


<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
            <div class="main-container">
            <div class="main-box">
                    <div class="question col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                    <h5 id="Qnumber">Question</h5>
                        <div id="Quest"><?php 
                        $id=$_POST["id_q"];
                        $quest= selectquiz('question',$conn,'id_quiz',$id);

                        echo $quest[0];
                        
                        ?></div>
                    </div>


                    <div class="response col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                        <form action="" method="post" class="form_resp">
                            <h6>Response</h6> <input type="text" name="responseGiven.$i"><br>
                            <input type="button" value="Next" id="but">
                            
                        </form>
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
