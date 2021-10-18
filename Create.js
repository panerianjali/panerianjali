$("#fname").val('');
$("#lname").val('');
$("#mob").val('');
$("#email").val('');
$("#emp_id").val('');

$("#AddEmployee").on("click", function() {
    let fname = $("#fname").val();
    let lname = $("#lname").val();
    let mob = $("#mob").val();
    let email = $("#email").val();

    if (fname == "") {
        alert("Please First Name...");
    } else if (lname == "") {
        alert("Please Last Name...");
    } else if (mob == "") {
        alert("Please Mobile...");
    } else if (email == "") {
        alert("Please Email ID...");
    } else {
        $.ajax({
            method: "POST",
            url: "../PHP/Process.php",
            data: {
                AddEmployee: 1,
                fname: fname,
                lname: lname,
                mob: mob,
                email: email
            },
            success: function(data) {
                getEmployeeData();
                $("#fname").val('');
                $("#lname").val('');
                $("#mob").val('');
                $("#email").val('');
                $("#emp_id").val('');
                //console.log(data);
            }
        });
    }
})

const getEmployeeData = () => {
    $.ajax({
        method: "POST",
        url: "../PHP/Process.php",
        data: {
            getEmployeeData: 1
        },
        success: function(data) {
            //console.log(data);
            $("#data").html(data);
        }
    });
}
getEmployeeData();

$("body").delegate(".UserEdit", "click", function() {
    let id = $(this).attr('id');
    getSingleEmployeeData(id);
})


const getSingleEmployeeData = (id) => {
    $.ajax({
        method: "POST",
        url: "../PHP/Process.php",
        dataType: "JSON",
        data: {
            getSingleEmployeeData: id
        },
        success: function(data) {
            $("#fname").val(data["fname"]);
            $("#lname").val(data["lname"]);
            $("#mob").val(data["mobileno"]);
            $("#email").val(data["email"]);
            $("#emp_id").val(data["id"]);
            $("#AddEmployee").hide();
            $("#UpdateEmployee").show('slow/400');
            $(".add-title").hide();
            $(".update-title").show();

        }
    });
}


$("#UpdateEmployee").on("click", function() {
    let fname = $("#fname").val();
    let lname = $("#lname").val();
    let mob = $("#mob").val();
    let email = $("#email").val();
    let id = $("#emp_id").val();
    if (fname == "") {
        alert("Please First Name...");
    } else if (lname == "") {
        alert("Please Last Name...");
    } else if (mob == "") {
        alert("Please Mobile...");
    } else if (email == "") {
        alert("Please Email ID...");
    } else {
        $.ajax({
            method: "POST",
            url: "../PHP/Process.php",
            data: {
                UpdateEmployee: id,
                fname: fname,
                lname: lname,
                mob: mob,
                email: email
            },
            success: function(data) {
                getEmployeeData();
                $("#fname").val('');
                $("#lname").val('');
                $("#mob").val('');
                $("#email").val('');
                $("#emp_id").val('');
                $("#AddEmployee").show('slow/400');
                $("#UpdateEmployee").hide();
            }
        });
    }

})


$("body").delegate(".UserDelete", "click", function() {
    let id = $(this).attr('id');
    let conf = confirm("Are You Sure To Delete This Employee?");
    if (conf) {
        $.ajax({
            method: "POST",
            url: "../PHP/Process.php",
            data: {
                DeleteEmployee: id
            },
            success: function(data) {
                getEmployeeData();
                console.log(data);
            }
        });
    } else {
        return false;
    }
})