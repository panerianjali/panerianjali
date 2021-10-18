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

    public function Update(array $array)
    {
        try {
            $STMT = $this->connect->prepare("UPDATE `employee` SET `fname`=:fname,`lname`=:lname,`mobileno`=:mobile,`email`=:email WHERE id = :id");
            $STMT->bindParam(":fname", $array['fname']);
            $STMT->bindParam(":lname", $array['lname']);
            $STMT->bindParam(":mobile", $array['mob']);
            $STMT->bindParam(":email", $array['email']);
            $STMT->bindParam(":id", $array['UpdateEmployee']);
            $STMT->execute();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
   public function Select($table)
    {
        
        $STMT = $this->connect->prepare("SELECT * FROM " . $table."  ORDER BY id DESC");
        $STMT->execute();
        $row = $STMT->fetchAll(PDO::FETCH_OBJ);
        return  $row;
    }
    public function SelectById($table, $id)
    {
        $STMT = $this->connect->prepare("SELECT * FROM " . $table . " WHERE id = '" . $id . "'");
        $STMT->execute();
        $row = $STMT->fetch(PDO::FETCH_OBJ);
        return  $row;
    }
    public function Delete($id)
    {
        try {
            $STMT = $this->connect->prepare("DELETE FROM employee WHERE id = '" . $id . "'");
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

if(isset($_POST['getEmployeeData'])){

    $PDO = new ConnectionPDO();
    
    $rows = $PDO->Select("employee");
   // print_r($rows);

   $table = '';
   $counter = 1;
   foreach ($rows as $row) {
       $table .= '<tr>
                    <td>'.$counter++.'</td>
                    <td>'.$row->fname.'</td>
                    <td>'.$row->lname.'</td>
                    <td>'.$row->mobileno.'</td>
                    <td>'.$row->email.'</td>
                    <td>
                        <span class="UserEdit text-info" style="cursor: pointer;" id="'.$row->id.'">Edit</span>
                        <span class="UserDelete text-danger" style="cursor: pointer;" id="'.$row->id.'">Delete</span></td>
                    </tr>';  
   }
   echo $table;



}


if (isset($_POST['getSingleEmployeeData'])) {
    $id = $_POST['getSingleEmployeeData'];

    $PDO = new ConnectionPDO();
    
    $row = $PDO->SelectById("employee", $id);
    echo json_encode($row);

}


if (isset($_POST['UpdateEmployee'])) {
    $PDO = new ConnectionPDO();
    
    echo $PDO->Update($_POST);
    
}


if (isset($_POST['DeleteEmployee'])) {
    $PDO = new ConnectionPDO();
    $id = $_POST['DeleteEmployee'];
    echo $PDO->Delete($id);
    
}
?>