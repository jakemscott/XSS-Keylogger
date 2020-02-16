<?php
    if($_POST["user_id"] == 'admin' && $_POST["user_pass"] == 'c0mpl1c@t3dp4ss') {
        if (preg_match("/[^A-Za-z'-]/",$_POST['user_id'] )) {
            die ("invalid name and name should be alpha");
        }
        header('Location: /home.php');
        exit();
    } else {
        die('Invalid username or password');
    }
