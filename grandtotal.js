$(".sum3").keyup(function(e) {

    let sum1 = $(".sum1").val();
    let sum2 = $(".sum1").val();
    let subtotal = sum1 * sum2;

    let sum3 = $(".sum3").val();
    let taxtablevalue = subtotal - sum3;
    let gstValue = taxtablevalue * 0.18;

    $(".sum4").val($gstValue);
    let total = taxtablevalue + gstValue;
    $(".total1").val(total);

    let total1 = $(".total1").val();
    let total2 = $(".total2").val();

    GrandTotal(total1 + total2);


});

$(".sum5").keyup(function() {
    let sum5 = $(".sum5").val();
    let sum6 = $(".sum6").val();
    let subtotal = sum5 * sum6;

    let sum7 = $(".sum7").val();
    let taxtablevalue = subtotal - sum7;
    let $gstValue = taxtablevalue * 0.18;

    $("sum8").val($gstValue);
    let total03 = taxtablevalue + gstValue;
    $(".total03").val(total);

    let total03 = $(".total03").val();
    let total04 = $(".total04").val();

    GrandTotal(total03 + total04);

})