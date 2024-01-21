<?php

session_start();

if(isset($_SESSION["user"])){
    unset($_SESSION["user"]);
    header("location: index.php");
}
else{
    echo "Not logged in.";
}

?>