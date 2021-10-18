<?php

class ConnectionPDO
{
    private $connect;
    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "student";

        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=" . $this->database, $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect = $conn;
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function Select($table)
    {
        //Prepared Statement
        //SELECT * FROM details
        $this->activity('Select');
        $STMT = $this->connect->prepare("SELECT * FROM " . $table);
        $STMT->execute();
        $row = $STMT->fetchAll(PDO::FETCH_OBJ);
        return  $row;
    }

    public function MYSQL()
    {
        //Prepared Statement
        //SELECT * FROM details
        // $STMT = $this->connect->prepare("SELECT * FROM support_tickets WHERE created_at BETWEEN '2021-07-01' AND '2021-07-31'");
        // $STMT = $this->connect->prepare("SELECT users.name, basic_profiles.name_of_company FROM `users` INNER JOIN basic_profiles ON users.id = basic_profiles.users_id WHERE users.id = 6");
        $this->activity('Select');
        $STMT = $this->connect->prepare("SELECT * FROM `users` 
        INNER JOIN about_us ON users.id = about_us.users_id 
        INNER JOIN bank_masters ON users.id = bank_masters.users_id WHERE users.id = 6");
        $STMT->execute();
        $row = $STMT->fetchAll(PDO::FETCH_OBJ);
        return  $row;
    }

    public function SelectById($table, $id)
    {
        //Prepared Statement
        //SELECT * FROM details
        $STMT = $this->connect->prepare("SELECT * FROM " . $table . " WHERE id = '" . $id . "'");
        $STMT->execute();
        $row = $STMT->fetch(PDO::FETCH_OBJ);
        return  $row;
        $this->activity('Select');
    }

    public function Insert($name, $sname, $mobile)
    {
        //Prepared Statement
        //SELECT * FROM details
        $this->activity('Insert');
        try {
            $STMT = $this->connect->prepare("INSERT INTO `details` (`stud_name`, `stud_sname`, `stud_mo`) VALUES (:stud_name, :stud_sname, :stud_mo)");
            $STMT->bindParam(":stud_name", $name);
            $STMT->bindParam(":stud_sname", $sname);
            $STMT->bindParam(":stud_mo", $mobile);
            $STMT->execute();


            return 'Done';
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function Upddate($name, $sname, $mobile, $id)
    {
        //Prepared Statement
        //SELECT * FROM details
        $this->activity('Upddate');
        try {
            $STMT = $this->connect->prepare("UPDATE `details` SET `stud_name`=:stud_name,`stud_sname`=:stud_sname,`stud_mo`=:stud_mo WHERE id = :id");
            $STMT->bindParam(":stud_name", $name);
            $STMT->bindParam(":stud_sname", $sname);
            $STMT->bindParam(":stud_mo", $mobile);
            $STMT->bindParam(":id", $id);
            $STMT->execute();

            return 'Done';
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function Destroy($id)
    {
        //Prepared Statement
        //SELECT * FROM details
        $this->activity('Delete');
        try {
            $STMT = $this->connect->prepare("DELETE FROM details WHERE id = :id");
            $STMT->bindParam(":id", $id);
            $STMT->execute();

            return 'Done';
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function activity($activity)
    {

        try {
            $STMT = $this->connect->prepare("INSERT INTO `activity`(`activity`) VALUES (:act)");
            $STMT->bindParam(":act", $activity);
            $STMT->execute();
            return 'Done';
        } catch (Exception $e) {
            throw $e;
        }
    }
}
