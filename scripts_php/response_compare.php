<?php

include("../scripts_php/head.php");




?>

<body>
    <?php
        var_dump($_POST);
if(isset($_POST)){
    if(isset($_POST['data'])){
    $songData = $_POST['data'];
    print_r($songData);

}}
?>
</body>
</html>