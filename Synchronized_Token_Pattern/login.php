<?php

$username = "user@gmail.com";
$password = "password";

if(isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){ //Validate the user
        session_start();
        session_destroy();
        session_unset();
        session_start();
        session_regenerate_id(true);

        $csrfTokenArray = array();

        $csrfToken = base64_encode(hash("sha256", uniqid(mt_rand(1000, 9999).microtime(), true), true));
        $csrfTokenArray[session_id()] = $csrfToken;

        $_SESSION['csrfTokenArray'] = $csrfTokenArray;

        echo    "<script type='text/javascript'>
                    window.location = \"add_user.html\";
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    alert(\"Username or password incorret. Enter valid credentials.\");
                    window.location = \"index.html\";
                </script>";
    }
}
else{
    echo "not set";
}
?>
