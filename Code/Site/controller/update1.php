<?php
    require_once("controller.php");
    $controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
    session_start();
    if ($_POST['address'])
    {
        $_SESSION['address'] = $_POST['address'];
        $controller->update("Address", $_POST['address'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else if ($_POST['city'])
    {
        $_SESSION['city'] = $_POST['city'];
        $controller->update("City", $_POST['city'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else if ($_POST['phoneNumber'])
    {
        $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
        $controller->update("Phone_Number", $_POST['phoneNumber'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else if ($_POST['postalCode'])
    {
        $_SESSION['postalCode'] = $_POST['postalCode'];
        $controller->update("Postal_Code", $_POST['postalCode'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else
    {
        header('location: ../account.php?account');
    }