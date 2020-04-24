<?php
    require_once("controller.php");
    session_start();
    $controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
    $habitat = $controller->select("Habitat", "Address", $_POST['address']);
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);
    if ($startDate > new DateTime("now"))
    {
        if ($habitat['Availability'] == true)
        {
            $controller->newCustomerAgreement($_SESSION['email'], $_POST);
            header('location ../account.php?customer');
        }
        else
        {
            header('location: ../account.php?customer&newCustomerAgreement&errorAvailability');
        }
    }
    else
    {
        header('location: ../account.php?customer&newCustomerAgreement&errorDate');
    }
