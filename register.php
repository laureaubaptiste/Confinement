<?php
    require_once("controller.php");
    if ($_POST['password0'] == $_POST['password1'])
    {
        $controller = new Controller("localhost:8889", "COVID", "root", "root");
        $third = $controller->select("email", "Third", $_POST);
        if (!$third['Email'])
        {
            $_POST['password0'] = password_hash($_POST['password0'], PASSWORD_DEFAULT);
            $controller->register($_POST);
            session_start();
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['birthDate'] = $_POST['birthDate'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['password'] = $_POST['password0'];
            header('location: ../index.php');
        }
        else
        {
            header('location: ../register.php?errorRegister');
        }
    }
    else
    {
        header('location: ../register.php?errorPasswords');
    }
