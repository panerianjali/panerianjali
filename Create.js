$("#AddEmployee").on("click", function() {
    let fname = $("#fname").val();
    let lname = $("#lname").val();
    let mob = $("#mob").val();
    let email = $("#email").val();

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
            console.log(data);
        }
    });

})
