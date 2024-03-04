<?php
session_start();
session_regenerate_id(true);
session_unset(); 
session_destroy();
header('Location: http://localhost:3000/app/views/user/index.php');
exit();
?>
