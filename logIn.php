<?php
    require_once("controller.php");
    $controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
    $third = $controller->select("Third", "Email", $_POST['email']);
    if ($_POST['email'] == $third['Email'] && password_verify($_POST['password0'], $third['Password']))
    {
        session_start();
        $_SESSION['address'] = $third['Address'];
        $_SESSION['birthDate'] = $third['Birth_Date'];
        $_SESSION['city'] = $third['City'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstName'] = $third['First_Name'];
        $_SESSION['lastName'] = $third['Last_Name'];
        $_SESSION['password'] = $_POST['password0'];
        $_SESSION['phoneNumber'] = $third['Phone_Number'];
        $_SESSION['postalCode'] = $third['Postal_Code'];
        header('location: ../index.php');
    }
    else
    {
        header('location: ../logIn.php?errorLogIn');
    }
