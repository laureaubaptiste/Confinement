<?php
    require_once("controller.php");
    $controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
    session_start();
    if ($_POST['email'])
    {
        if (strtolower($_POST['email']) == strtolower($_SESSION['email']))
        {
            if ($_POST['newEmail0'] == $_POST['newEmail1'])
            {
                $controller->update("Email", $_POST['newEmail0'], "Third", "Email", $_SESSION['email']);
                $_SESSION['email'] = $_POST['newEmail0'];
                header('location: ../account.php?account');
            }
            else
            {
                header('location: ../account.php?account&email&errorEmails');
            }
        }
        else
        {
            header('location: ../account.php?account&email&errorEmail');
        }
    }
    else if ($_POST['password'])
    {
        if ($_POST['password'] == $_SESSION['password'])
        {
            if ($_POST['newPassword0'] == $_POST['newPassword1'])
            {
                $_SESSION['password'] = $_POST['newPassword0'];
                $_POST['newPassword0'] = password_hash($_POST['newPassword0'], PASSWORD_DEFAULT);
                $controller->update("Password", $_POST['newPassword0'], "Third", "Email", $_SESSION['email']);
                header('location: ../account.php?account');
            }
            else
            {
                header('location: ../account.php?account&password&errorPasswords');
            }
        }
        else
        {
            header('location: ../account.php?account&password&errorPassword');
        }
    }
    else if ($_POST['firstName'])
    {
        $_SESSION['firstName'] = $_POST['firstName'];
        $controller->update("First_Name", $_POST['firstName'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else if ($_POST['lastName'])
    {
        $_SESSION['lastName'] = $_POST['lastName'];
        $controller->update("Last_Name", $_POST['lastName'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else if ($_POST['birthDate'])
    {
        $_SESSION['birthDate'] = $_POST['birthDate'];
        $controller->update("Birth_Date", $_POST['birthDate'], "Third", "Email", $_SESSION['email']);
        header('location: ../account.php?account');
    }
    else
    {
        header('location: ../account.php?account');
    }
