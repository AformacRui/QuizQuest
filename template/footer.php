<?php 

$user = $_SESSION['userName'];

if(strcmp($user,"visitor")==0){
    echo "<footer class='wrapper'>";
    echo "<h5>Join us on Quiz Quest</h5><br>";
    echo "<form action='../scripts_php/user_insert.php' method='post' class='form_user'>";
    echo "<h6>Your Nickname:</h6> <input type='text' name='nickRequest'><br>";
    echo "<h6>Pass-Word:</h6> <input type='text' name='PassRequest'><br>";
    echo "<input type='submit'>";
    echo "</form>";
    echo "</footer>";
}

else {
    echo "<footer class='wrapper'>";
    echo "<h5>Website Created by Rui and Hermann</h5><br>";
    echo "<h6>Rui: afor.rui@gmail.com</h6><br>";
    echo "<h6>Hermann: hermann2h@hotmail.fr</h6>";
    echo "</footer>";
}


?>

