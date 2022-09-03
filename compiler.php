<?php
    if(isset($_POST["code"])){
        $filename = "./upload/compair.php";
        
        //move_uploaded_file($tmp, $papka);
        
        file_put_contents($filename, $_POST["code"]);
        
        $output = shell_exec("php $filename");
        
        echo $output;

        //unlink($filename); 
    }

?>