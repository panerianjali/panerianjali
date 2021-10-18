$("#chngtxt").click(function() {
    // $("#head").html('Hey Anjali!');
    // $("#head").css('color', 'red');
    // $("#head").addClass('color');
    // $("#head").hide('slow/400');
    let head = $("#head").html();
    // $("#anjali").html(head);
    $("#anjali").load('../PHP/pdo.php');

})

// $("#chngtxt").click(function() {
//     $("#name").prop('readonly', true)
//     let name = $("#name").val();

//     // if (name.length < 8) {
//     //     alert("Password Too Short...");
//     // }

// })