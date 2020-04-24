<?php


class Model
{
    private $pdo;

    public function __construct ($host, $dbname, $user, $password)
    {
        $this->pdo = NULL;
        try
        {
            $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
        }
        catch (PDOException $exp)
        {
        }
    }

    public function newCustomerAgreement ($email, $newCustomerAgreement)
    {
        if ($this->pdo != NULL)
        {
            $data = array(
                ":address" => $newCustomerAgreement['address'],
                ":email" => $email,
                ":endDate" => $newCustomerAgreement['endDate'],
                ":season" => $newCustomerAgreement['season'],
                ":startDate" => $newCustomerAgreement['startDate']
            );
            $request  = "INSERT INTO Customer_Agreement VALUES (:endDate, (SELECT Id FROM Habitat WHERE Address = :address), NULL, :season, (SELECT Id FROM Third WHERE Email = :email), :startDate);";
            $this->pdo->prepare($request)->execute($data);
        }
    }

    public function newHabitat ($newHabitat)
    {
        if ($this->pdo != NULL)
        {
            $data = array(
                ":address" => $newHabitat['address'],
                ":balconySurface" => $newHabitat['balconySurface'],
                ":capacity" => $newHabitat['capacity'],
                ":city" => $newHabitat['city'],
                ":exposure" => $newHabitat['exposure'],
                ":livingSpace" => $newHabitat['livingSpace'],
                ":postalCode" => $newHabitat['postalCode'],
                ":trackDistance" => $newHabitat['trackDistance'],
                ":type" => $newHabitat['type']
            );
            $request = "INSERT INTO Habitat VALUES (:address, TRUE, :balconySurface, :capacity, :city, :exposure, NULL, :livingSpace, :postalCode, :trackDistance, :type);";
            $this->pdo->prepare($request)->execute($data);
        }
        /*$upload_image = $_FILES[$newHabitat['photo']][$newHabitat['address']];
        $folder = "/wamp64/www/IRIS-BTS-SIO-2-SLAM-A/html/photo";
        move_uploaded_file($_FILES[$newHabitat['photo']][$newHabitat['address']], "$folder" . $_FILES[$newHabitat['photo']][$newHabitat['address']]);
        $insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";
        $var=mysql_query($inser_path);*/
    }

    public function newOwnerAgreement ($email, $newOwnerAgreement)
    {
        if ($this->pdo != NULL)
        {
            $data = array(
                ":address" => $newOwnerAgreement['address'],
                ":email" => $email,
                ":endDate" => $newOwnerAgreement['endDate'],
                ":startDate" => $newOwnerAgreement['startDate']
            );
            $request = "INSERT INTO Owner_Agreement VALUES (:endDate, (SELECT Id FROM Habitat WHERE Address = :address), NULL, (SELECT Id FROM Third WHERE Email = :email), :startDate);";
            $this->pdo->prepare($request)->execute($data);
        }
    }

    public function register ($register)
    {
        if ($this->pdo != NULL)
        {
            $data = array(
                ":address" => $register['address'],
                ":birthDate" => $register['birthDate'],
                ":city" => $register['city'],
                ":email" => $register['email'],
                ":firstName" => $register['firstName'],
                ":lastName" => $register['lastName'],
                ":password" => $register['password0'],
                ":phoneNumber" => $register['phoneNumber'],
                ":postalCode" => $register['postalCode']
            );
            $request = "INSERT INTO Third VALUES (:address, :birthDate, :city, :email, :firstName, NULL, :lastName, :password, :phoneNumber, :postalCode);";
            $this->pdo->prepare($request)->execute($data);
        }
    }

    public function search ($capacity, $city, $endDate, $startDate)
    {
        if ($this->pdo != NULL)
        {
            $request = "SELECT * FROM Habitat WHERE Availability = true OR Capacity >= $capacity OR City = '$city' AND Id IN (SELECT Id_Habitat FROM Owner_Agreement WHERE DATEDIFF('$startDate', Start_Date) > 0 AND DATEDIFF(End_Date, '$endDate'));";
            $select = $this->pdo->prepare($request);
            $select->execute();
            return $select->fetchAll();
        }
        else
        {
            return NULL;
        }
    }

    public function select ($table, $whereColumn, $whereValue)
    {
        if ($this->pdo != NULL)
        {
            $data = array(":whereValue" => $whereValue);
            $request = "SELECT * FROM $table WHERE $whereColumn = :whereValue;";
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetch();
        }
        else
        {
            return NULL;
        }
    }

    public function selectCustomerAgreement ($email)
    {
        if ($this->pdo != NULL)
        {
            $data = array(":email" => $email);
            $request = "SELECT H.Address, H.Balcony_Surface, H.Capacity, H.City, H.Exposure, H.Living_Space, H.Postal_Code, H.Track_Distance, H.Type, CA.Start_Date, CA.End_Date, CA.Season FROM Habitat H, Customer_Agreement CA WHERE CA.Id_Third IN (SELECT Id FROM Third WHERE Email = :email) AND H.Id = CA.Id_Habitat;";
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        }
        else
        {
            return NULL;
        }
    }

    public function selectHabitat ($email)
    {
        if ($this->pdo != NULL)
        {
            $data = array(":email" => $email);
            $request = "SELECT * FROM Habitat WHERE Id IN (SELECT Id_Habitat FROM Owner_Agreement WHERE Id_Third = (SELECT Id FROM Third WHERE Email = :email));";
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        }
        else
        {
            return NULL;
        }
    }

    public function selectOldHabitat ($email)
    {
        if ($this->pdo != NULL)
        {
            $data = array(":email" => $email);
            $request = "SELECT * FROM Habitat WHERE Id IN (SELECT Id_Habitat FROM Owner_Agreement WHERE Id_Third = (SELECT Id FROM Third WHERE Email = :email) AND DATEDIFF(CURDATE(), End_Date) > 0);";
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        }
        else
        {
            return NULL;
        }
    }

    public function selectOwnerAgreement ($email)
    {
        if ($this->pdo != NULL)
        {
            $data = array(":email" => $email);
            $request = "SELECT H.Address, OA.End_Date, OA.Start_Date FROM Habitat H, Owner_Agreement OA WHERE OA.Id_Third = (SELECT Id FROM Third WHERE Email = :email) AND H.Id = OA.Id_Habitat ORDER BY OA.End_Date DESC;";
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        }
        else
        {
            return NULL;
        }
    }

    public function update ($setColumn, $setValue, $table, $whereColumn, $whereValue)
    {
        if ($this->pdo != NULL)
        {
            $data = array(
                ":setValue" => $setValue,
                ":whereValue" => $whereValue
            );
            $request = "UPDATE $table SET $setColumn = :setValue WHERE $whereColumn = :whereValue;";
            $this->pdo->prepare($request)->execute($data);
        }
    }
}
