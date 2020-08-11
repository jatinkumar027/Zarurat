<?php
    session_start();
    
    session_destroy();
    header('Location: seller_home.php?home=true');
?>