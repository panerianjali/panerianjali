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
    <div class="row">
        <div class="col-10 offset-1 mt-5">
            <div class="card bgcolour:pink">

                <form action="" method="post">

                    <div class="mb-3 mt-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter FirstNmae" name="fname">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="fname" class="form-label">FirstName</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter FirstNmae" name="fname">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="fname" class="form-label">LastName</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter FirstNmae" name="lname">
                    </div>

                    <div class="mb-3">
                        <label for="mobileno" class="form-label">MobileNo:</label>
                        <input type="mobileno" class="form-control" id="mobileno" placeholder="Enter pmobileno" name="mobileno">
                    </div>

                    <button type="submit" name="Insert" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
    </div>

    <?php


    class conne
    {

        private $conn;


        public function __construct()
        {
            $this->conn = mysqli_connect("localhost", "root", "", "student");
            if ($this->conn) {
                echo "connection succesfully";
            } else {
                echo "connection error";
            }
        }
        public function insert($fname, $lname, $mobileno)
        {
            try {
                $query="INSERT INTO employee(fname,lname,mobileno)values('$fname','$lname','$mobileno')";
                $data = mysqli_query($this->conn, $query);

                              
                } catch (Exception $e) {
                    throw $e;
                //throw $th;
            }
        }
        
    }
    $obj =new conne();
    //$obj->insert("Anjali","trivedi","789456122");

    
    if (isset($_POST['Insert'])) {
        $dataInsert = $obj->insert($_POST['fname'],$_POST['lname'],$_POST['mobileno']);
        header('Location:insert.php');
        echo "inserted";
        # code...
    }


    ?>