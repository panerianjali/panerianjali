<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajax Tuts - Anjali Trivedi</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title add-title">Add Employee</h4>
                        <h4 class="card-title update-title" style="display: none;">Update Employee</h4>
                    </div>

                    <div class="card-body">
                        <!-- <form action=""> -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h6>Employee Firstname</h6>
                                    <input autofocus name="fname" required id="fname" type="text" class="form-control form-control-sm" placeholder="Employee Firstname">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h6>Employee Lastname</h6>
                                    <input type="text" required name="lname" id="lname" class="form-control form-control-sm" placeholder="Employee Lastname">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h6>Employee Mobile</h6>
                                    <input type="number" required name="mob" id="mob" class="form-control form-control-sm" placeholder="Employee Mobile">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <h6>Employee Email</h6>
                                    <input type="email" required name="email" id="email" class="form-control form-control-sm" placeholder="Employee Email">
                                </div>
                            </div>
                            <input type="hidden" id="emp_id">

                            <div class="col-md-3 mt-2">
                                <button class="btn btn-success btn-sm" id="AddEmployee">Submit</button>
                                <button class="btn btn-info btn-sm" style="display: none;" id="UpdateEmployee">Update</button>

                            </div>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Mobileno</th>
                                        <th>Email</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../Ajax/Create.js"></script>
</body>

</html>