<?php 
session_start();
if(isset($_SESSION['userName'])) {
 echo "Your session is running " . $_SESSION['userName'];
}
else{
    $_SESSION['userName'] = "visitor";

}

include("../scripts_php/head.php");

include("../scripts_php/connexion.php");



?>


<body>
<?php include("../template/header.php");?>

<div class="container-fluid d-flex ">

    <div class="form-container d-flex">
    <?php include("../template/main_nav_global.php"); ?>
            
    <div class="main-container">
        <div class="main-box">
                <div class="question col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                <h5 id="Qnumber">Question</h5><br>
                    <div id="Quest"><?php 
                    $id=$_POST["id_q"];
                    //var_dump($id);

                    $_SESSION["quiz_id"] = $_POST["id_q"];
                    

                    $quest= selectquiz('question',$conn,'id_quiz',$id);

                    echo $quest[0];
                    
                    ?></div>
                </div>


                <div class="response col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                    <form action="../scripts_php/response_compare.php" method="post" class="form_resp">
                        <h6>Response</h6> <input id="resp" type="text" name="responseGiven.$i">
                        <input type="button" value="Next" id="but">
                        <a id="trap" href='../scripts_php/response_compare.php'><!-- nothing --></a></div>
                        
                        
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

<script type="text/javascript">

    let nextBut = document.getElementById('but');
    let question = document.getElementById('Quest');
    let counter=1;
    let quest = <?php echo json_encode($quest); ?>;
    let id = <?php echo json_encode($id); ?>;
    let resp = [];
    const RESULT=null;
    //console.log(id);

//console.log(jsval);

function chargeQuest(count)
{
    question.innerHTML = quest[count];
}

function saveresp(){
    let resp = document.getElementById('resp').value;
    return resp;
}


function myJavascriptFunction() { 
  var javascriptVariable = "helo";
  window.location.href = "response.php?name=" + javascriptVariable; 
}



nextBut.addEventListener("click",function(event){
    
    if(counter<10){
    chargeQuest(counter);
    resp[counter-1]= saveresp();
    console.log( resp[counter-1]);
    counter++;
    }
    else{
        resp[9]=saveresp();
        resp[10]=id;
        document.getElementById('but').innerHTML = "<h3>Quiz Ended</h3>";
        
        
        

        let arrayjs= JSON.stringify(resp);
        console.log(arrayjs);


        $.ajax({
            type: "POST",
                url: "response.php",
                data: {content : arrayjs},
                dataType: "text",
                success: function(html){
                alert( "Submitted");
                    }
          });


        document.getElementById('trap').click();// change page
    }


    //console.log(resp);


});
</script>

<?php 
$_SESSION["user_response"]= $_POST['content'];

?>


</body>
</html>
