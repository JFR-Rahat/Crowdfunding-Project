<?php

session_start();

print_r($_SESSION['ownerProjects']);

unset($_SESSION['ownerProjects']);
header("location: ongoingProject.php");
?>