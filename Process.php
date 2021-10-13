<?php
include 'Config.php';


class ConnectionPDO
{
    private $connect,
            $servername,
            $username,
            $password,
            $database;

    public function __construct()
    {
        $this->servername = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->database = DB_NAME;

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

    public function Insert(array $array)
    {
        try {
            $STMT = $this->connect->prepare("INSERT INTO employee (`fname`, `lname`, `mobileno`, `email`) VALUES (:fname, :lname, :mobile, :email)");
            $STMT->bindParam(":fname", $array['fname']);
            $STMT->bindParam(":lname", $array['lname']);
            $STMT->bindParam(":mobile", $array['mob']);
            $STMT->bindParam(":email", $array['email']);
            $STMT->execute();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}


if (isset($_POST['AddEmployee'])) {
    $PDO = new ConnectionPDO();
    
    echo $PDO->Insert($_POST);
    
}





?>
