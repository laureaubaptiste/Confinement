<?php
    require_once __DIR__ . "/../model/model.php";

class Controller
{
    private $model;

    public function __construct ($host, $dbname, $user, $password)
    {
        $this->model = new Model($host, $dbname, $user, $password);
    }

    public function newCustomerAgreement ($email,$newCustomerAgreement) {
        $this->model->newCustomerAgreement($email, $newCustomerAgreement);
    }

    public function newHabitat ($newHabitat) {
        $this->model->newHabitat($newHabitat);
    }

    public function newOwnerAgreement ($email, $newOwnerAgreement) {
        $this->model->newOwnerAgreement($email, $newOwnerAgreement);
    }

    public function register ($register) {
        $this->model->register($register);
    }

    public function search ($capacity, $city, $endDate, $startDate) {
        return $this->model->search($capacity, $city, $endDate, $startDate);
    }

    public function select ($table, $whereColumn, $whereValue) {
        return $this->model->select($table, $whereColumn, $whereValue);
    }

    public function selectCustomerAgreement ($email) {
        return $this->model->selectCustomerAgreement($email);
    }

    public function selectHabitat ($email) {
        return $this->model->selectHabitat($email);
    }

    public function selectOldHabitat ($email) {
        return $this->model->selectOldHabitat($email);
    }

    public function selectOwnerAgreement ($email) {
        return $this->model->selectOwnerAgreement($email);
    }

    public function update ($setColumn, $setValue, $table, $whereColumn, $whereValue) {
        $this->model->update($setColumn, $setValue, $table, $whereColumn, $whereValue);
    }
}
