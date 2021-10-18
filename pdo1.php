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

$Obj = new ConnectionPDO();

if (isset($_GET['delete_student'])) {
    $Obj->Destroy($_GET['delete_student']);
    header("Location:pdo1.php");
}


if (isset($_POST['add_student'])) {
    $dataInsert = $Obj->Insert($_POST['fname'], $_POST['lname'], $_POST['mobile']);
    if ($dataInsert) {
        header("Location:pdo1.php?msg=2");
    }
}

if (isset($_POST['update_student'])) {
    $dataUpdate = $Obj->Upddate($_POST['fname'], $_POST['lname'], $_POST['mobile'], $_POST['pri_id']);
    if ($dataUpdate) {
     
        header("Location:pdo1.php?msg=1");
    }
}

// CRUD
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <?php
            if (isset($_GET['msg']) == 1) {
            ?>
                <div class="alert alert-success" role="alert">
                    Congratulations...This is a success!
                </div>
            <?php
            }
            
            if(isset($_GET['msg']) == 2) {
                ?>
                <div class="alert alert-success" role="alert">
                    Congratulations...This is a Inserted!
                </div>
            <?php
            }

            if (isset($_GET['edit_student'])) {
                $id = $_GET['edit_student'];
                $dataEdit = $Obj->SelectById("details", $id);
                // $dataEdit = $Obj->Upddate()

?>

            <form action="" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id; ?>" name="pri_id">
                                <h6>First Name</h6>
                                <input type="text" required value="<?php echo $dataEdit->stud_name; ?>" name="fname" class="form-control form-control-sm" placeholder="Enter First Name...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Last Name</h6>
                                <input type="text" required name="lname" value="<?php echo $dataEdit->stud_sname; ?>" class="form-control form-control-sm" placeholder="Enter Last Name...">
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <h6>Mobile No.</h6>
                                <input type="text" required name="mobile" class="form-control form-control-sm" placeholder="Enter Mobile No..." value="<?php echo $dataEdit->stud_mo; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <button type="submit" name="update_student" class="btn btn-info">Update Student</button>
                        </div>
                    </div>
                </form>

            <?php
            } else {

            ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="card-title text-white">Anjali's Students</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary OpenModal mb-3" data-toggle="modal" data-bs-target="addstud">
                                Add Students
                            </button>
                            <table class="table table-bordered" style="border-radius: 5px;">

                                <thead class="bg-info">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">FirstName</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $rows = $Obj->Select("details");
                                    foreach ($rows as $row) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i++; ?></th>
                                            <td><?php echo strtoupper($row->stud_name); ?></td>
                                            <td><?php echo strtoupper($row->stud_sname); ?></td>
                                            <td><?php echo $row->stud_mo; ?></td>
                                            <td> <a href="pdo1.php?edit_student=<?php echo $row->id; ?>" class="btn btn-warning" >Edit</a></td>

                                            <td> <a href="pdo1.php?delete_student=<?php echo $row->id?>" class="btn btn-danger" onclick="return confirm('Bhai Sache Delete Karvo 6 Data?');">Delete</a></td>
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="modal fade" id="addstud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>First Name</h6>
                                    <input type="text" required name="fname" class="form-control form-control-sm" placeholder="Enter First Name...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>Last Name</h6>
                                    <input type="text" required name="lname" class="form-control form-control-sm" placeholder="Enter Last Name...">
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <h6>Mobile No.</h6>
                                    <input type="number" required name="mobile" class="form-control form-control-sm" placeholder="Enter Mobile No...">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <button type="submit" name="add_student" class="btn btn-info">Save Student</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    <script>
        $(".OpenModal").click(function() {
            $("#addstud").modal('show');
        })
    </script>
</body>

</html>