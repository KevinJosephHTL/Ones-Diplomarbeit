<?php 
session_start();
session_destroy();
header("Location: /ones/login/login.php")
 ?>