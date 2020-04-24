<?php
require_once("controller.php");
session_start();
$controller = new Controller("localhost:8889", "neigeEtSoleil", "root", "root");
$habitat = $controller->select("Habitat", "Address", $_POST['address']);
$startDate = new DateTime($_POST['startDate']);
$endDate = new DateTime($_POST['startDate']);
$endDate->add(new DateInterval('P1Y'));
$_POST['endDate'] = date_format($endDate, 'Y-m-d');
if ($startDate > new DateTime("now"))
{
    if (!$habitat['Address'])
    {
        $controller->newHabitat($_POST);
        $controller->newOwnerAgreement($_SESSION['email'], $_POST);
        header('location: ../account.php?owner');
    }
    else
    {
        header('location: ../account.php?owner&newOwnerAgreement&newHabitat&errorNewHabitat');
    }
}
else
{
    header('location: ../account.php?owner&newOwnerAgreement&newHabitat&errorDate');
}
