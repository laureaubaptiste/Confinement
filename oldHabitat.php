<?php
    require_once("controller.php");
    session_start();
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['startDate']);
    $endDate->add(new DateInterval('P1Y'));
    $_POST['endDate'] = date_format($endDate, 'Y-m-d');
    if ($startDate > new DateTime("now"))
    {
        $controller = new Controller("localhost:8889", "COVID", "root", "root");
        $controller->newOwnerAgreement($_SESSION['email'], $_POST);
        header('location: ../account.php?owner');
    }
    else
    {
        header('location: ../account.php?owner&newOwnerAgreement&oldHabitat&errorDate');
    }
