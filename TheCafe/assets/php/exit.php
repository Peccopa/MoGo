<?php

// setcookie('postToReg', '', time() - 60 );
// setcookie('postToReg', FALSE, -1);
// setcookie('postToReg', '', time() - 60);
setcookie("postToReg","",time()-3600,"/");
header('Location: ..\..\index.php');
exit;

function d($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// d($_COOKIE);

// header('Location: ..\..\index.php');