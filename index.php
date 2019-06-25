<?php   
    if(!$_GET['page']) {
        $_GET['page'] = 'explore';  
    }
    include("functions.php");
    include("views/header.php");
    include("views/home.php");
    include("views/footer.php");
?>
