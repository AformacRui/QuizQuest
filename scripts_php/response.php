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

<<<<<<< HEAD
=======
                    <div class="response col-xs-12 col-sm-6 col-lg-4 list-group-item d-flex justify-content-between align-items-center">
                        <form action="../scripts_php/response_compare.php" method="post" class="form_resp">

                            <?php 
                            
                            //$questions= selectquizResp($TB_Response,$conn,'id_quiz',$id);

                            $b_resp = selectquizRespType($TB_Response,$conn,'id_quiz','valor',$id,1);

                            $m_resp = selectquizRespType($TB_Response,$conn,'id_quiz','valor',$id,0);

                            //var_dump($b_resp);

                            $rand=random_int(0, 3);
                            
                            
                            if($rand==0)
                            {
                                echo "<h6>Response 1 : </h6> <input id='check1' type='radio' name='resp' value='$b_resp[0]'><label id='lab1' >$b_resp[0]</label><br>";
                                echo "<h6>Response 2 : </h6> <input id='check2' type='radio' name='resp' value='$m_resp[0]'><label id='lab2' >$m_resp[0]</label><br>";
                                echo "<h6>Response 3 : </h6> <input id='check3' type='radio' name='resp' value='$m_resp[1]'><label id='lab3' >$m_resp[1]</label><br>";
                                echo "<h6>Response 4 : </h6> <input id='check4' type='radio' name='resp' value='$m_resp[2]'><label id='lab4' >$m_resp[2]</label><br>";
                                
                                echo "<input type='button' value='Next' id='but'>";
                            }

                            else if($rand==1) {
                                echo "<h6>Response 1 : </h6> <input id='check1' type='radio' name='resp' value='$m_resp[2]'><label id='lab1' >$m_resp[2]</label><br>";
                                echo "<h6>Response 2 : </h6> <input id='check2' type='radio' name='resp' value='$m_resp[0]'><label id='lab2' >$m_resp[0]</label><br>";
                                echo "<h6>Response 3 : </h6> <input id='check3' type='radio' name='resp' value='$b_resp[0]'><label id='lab3' >$b_resp[0]</label><br>";
                                echo "<h6>Response 4 : </h6> <input id='check4' type='radio' name='resp' value='$m_resp[1]'><label id='lab4' >$m_resp[1]</label><br>";
                                
                                echo "<input type='button' value='Next' id='but'>";

                            }

                            else if($rand==2) {
                                echo "<h6>Response 1 : </h6> <input id='check1' type='radio' name='resp' value='$m_resp[1]'><label id='lab1' >$m_resp[1]</label><br>";
                                echo "<h6>Response 2 : </h6> <input id='check2' type='radio' name='resp' value='$b_resp[0]'><label id='lab2' >$b_resp[0]</label><br>";
                                echo "<h6>Response 3 : </h6> <input id='check3' type='radio' name='resp' value='$m_resp[2]'><label id='lab3' >$m_resp[2]</label><br>";
                                echo "<h6>Response 4 : </h6> <input id='check4' type='radio' name='resp' value='$m_resp[0]'><label id='lab4' >$m_resp[0]</label><br>";
                                
                                echo "<input type='button' value='Next' id='but'>";
                            }

                            else if($rand==3)
                            {
                                echo "<h6>Response 1 : </h6> <input id='check1' type='radio' name='resp' value='$m_resp[2]'><label id='lab1'>$m_resp[2]</label><br>";
                                echo "<h6>Response 2 : </h6> <input id='check2' type='radio' name='resp' value='$m_resp[1]'><label id='lab2'>$m_resp[1]</label><br>";
                                echo "<h6>Response 3 : </h6> <input id='check3' type='radio' name='resp' value='$m_resp[0]'><label id='lab3'>$m_resp[0]</label><br>";
                                echo "<h6>Response 4 : </h6> <input id='check4' type='radio' name='resp' value='$b_resp[0]'><label id='lab4'>$b_resp[0]</label><br>";
                                
                                echo "<input type='button' value='Next' id='but'>";
                            }

                            ?>
                           <a id="trap" href='../scripts_php/response_compare.php'><!-- nothing --></a></div>
                            
                            
                        </form>
                    </div>
>>>>>>> ac9ae39c0a7daf5a45ec94ffdfd151b6dab0cc5d

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
    let b_resp = <?php echo json_encode($b_resp); ?>;
    let m_resp = <?php echo json_encode($m_resp); ?>;
    
    //console.log(m_resp);

//console.log(jsval);

function chargeQuest(count)
{
    question.innerHTML = quest[count];
}

function saveResponseCheck()
{
    var selected = new Array();

    $(document).ready(function() {

    $("input:radio[name=resp]:checked").each(function() {
       selected.push($(this).val());
       //console.log(selected);
    });

});
return selected;
}

function changeQuizOrder(question) {
    

        document.getElementById('lab1').innerText = question[0];
        document.getElementById('check1').value= question[0];

        document.getElementById('lab2').innerText = question[1];
        document.getElementById('check2').value= question[1];

        document.getElementById('lab3').innerText = question[2];
        document.getElementById('check3').value= question[2];

        document.getElementById('lab4').innerText = question[3];
        document.getElementById('check4').value= question[3];
    //return var1;
}

function createResp(ind,b_resp,m_resp){
    let quest = [];
    quest[0]=b_resp[ind];

    let n = ind * 3;

    quest[1] = m_resp[n];
    quest[2] = m_resp[n+1];
    quest[3] = m_resp[n+2];

    return quest;
}


//randomize array

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}



nextBut.addEventListener("click",function(event){

    
    
    //getRandomInt(4);

    if(counter<10){
    chargeQuest(counter);
    resp[counter-1]= saveResponseCheck();

    let questresp = createResp(counter,b_resp,m_resp)
    let shuffleresp = shuffleArray(questresp);
    //console.log(shuffleresp);
    changeQuizOrder(shuffleresp);
    
    
    //console.log( resp[counter-1]);
    counter++;
    //let test = saveResponseCheck();
    console.log(resp);
    //let resp = document.getElementById('resp').value;
    //console.log(resp);
    }
    else{
        resp[9]=saveResponseCheck();
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


        document.getElementById('trap').click();// change page */
    }


    //console.log(resp);


}); 
</script>

<?php 
$_SESSION["user_response"]= $_POST['content'];

?>


</body>
</html>

