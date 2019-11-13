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
            <div class="main-box" id="box">
                    <div class="question col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                    <h5 id="Qnumber">Question</h5><br>
                        <div id="Quest"><?php 
                        $id=$_POST["id_q"];

                        $quest= selectquiz('question',$conn,'id_quiz',$id);

                        echo $quest[0];
                        
                        ?></div>
                    </div>


                    <div class="response col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                        <form action="../scripts_php/response_compare.php" method="post" class="form_resp">
                            <h6>Response</h6> <input id="resp" type="text" name="responseGiven.$i"><br>
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
    let resp = [];

//console.log(jsval);

function chargeQuest(count)
{
    question.innerHTML = quest[count];
}

function saveresp(){
    let resp = document.getElementById('resp').value;
    return resp;
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
        document.getElementById('but').innerHTML = "<h3>Quiz Ended</h3>";
        console.log(resp);



        let arrayjs= JSON.stringify(resp);

/*        
        $.post('response_compare.php', {
        data: resp
        }, function(response) {
        console.log(response);
  }); */



        
         console.log(arrayjs);
            $.ajax({
            type: "POST",
                url: "../scripts_php/response_compare.php",
                data: {content : arrayjs},
                success: function(html){
                alert( "Submitted");
                    }
          });  
          
        
         
       /* $.ajax({ 
        type: "POST", 
        url: "../scripts_php/response_compare.php", 
        data: { kvcArray : myJSONText }, 
            success: function() { 
                alert("Success"); 
            }
        });  */


        document.getElementById('trap').click();// change page
    }



});
</script>




</body>
</html>
