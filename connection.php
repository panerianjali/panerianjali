<?php
include 'Config.php';
class conne
{

    private $user,
            $pass,
            $host,
            $db,
            $conn;

    public function __construct() {

        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->db = DB_NAME;

        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn) {
            echo "connection succesfully";
        } else {

            echo "connection error";
        }
    
    }



    public function select()
    {

        $quary = "select * from details";
        $data = mysqli_query($this->conn, $quary);
        echo "<br>";
        print_r($data);
        $rows = mysqli_fetch_assoc($data);

        while ($d = mysqli_fetch_assoc($data)) {
            echo $d["stud_name"] . ' - ' . $d["id"] . ' - ' . $d["stud_sname"] . $d["stud_mno"] . "<br>";
        }
    }

    public function insert($stud_name, $stud_sname, $stud_mo)
    {

        try {
            $quary = "INSERT INTO details(stud_name,stud_sname,stud_mo)values('$stud_name','$stud_sname','$stud_mo')";
            $data = mysqli_query($this->conn, $quary);

            echo "successfully Inserted";
        } catch (Exception $e) {

            throw $e;
        }
    }

    public function update($stud_name, $stud_sname, $stud_mo, $id)
    {
        try {
            $quary = "UPDATE details set `stud_name`='$stud_name',`stud_sname`='$stud_sname',`stud_mo`='$stud_mo' WHERE id = '$id'";
            $data = mysqli_query($this->conn, $quary);
            echo "successfully update";
        } catch (Exception $e) {

            throw $e;
        }
    }
}
$obj= new conne();
$obj->update("stud_name", "zundala", 89564556,3);