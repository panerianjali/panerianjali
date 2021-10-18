<?php

class Connect
{
    private $conn;


    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "test");
        if (!$this->conn) {
            echo "There is some error";
        } else {
            echo "Connection Successfully...";
        }
    }

    public function select()
    {
        $query = "SELECT * FROM users";
        $data = mysqli_query($this->conn, $query);
        echo '<pre>';
        print_r($data);
        $rows = mysqli_fetch_assoc($data);

        while ($d = mysqli_fetch_assoc($data)) {
            echo $d["name"]. ' - ' . $d["email"] ."<br>";
        }
               
    }

    public function insert($ticket, $user, $name, $mobile, $subject)
    {
               
        try {
            
            $query = "INSERT INTO `support_tickets`(`ticket`, `users_id`, `name`, `mobile`, `subject`) VALUES ('$ticket', '$user', '$name', '$mobile', '$subject')";
            $data = mysqli_query($this->conn, $query);
            
            echo "Success";

        } catch (Exception $e) {
            throw $e;
        }
                   
    }

    public function update($ticket, $user, $name, $mobile, $subject, $id)
    {
               
        try {
            
            $query = "UPDATE `support_tickets` SET `ticket`='$ticket',`users_id`='$user',`name`='$name',`mobile`='$mobile',`subject`='$subject' WHERE id = '$id'";
            $data = mysqli_query($this->conn, $query);
            
            echo "Success";

        } catch (Exception $e) {
            throw $e;
        }
                   
    }

    
    public function delete($id)
    {
               
        try {
            
            $query = "DELETE FROM support_tickets WHERE id = '$id'";
            $data = mysqli_query($this->conn, $query);
            
            echo "Success";

        } catch (Exception $e) {
            throw $e;
        }
                   
    }
}

$Obj = new Connect();
// echo $Obj->insert('5634563', '1', 'Arjun J', '98798456576', 'This is test');
// echo $Obj->update('5634563', '1', 'Anjali Trivedi', '98798456576', 'This is test', 22);


$Obj->delete(22);
