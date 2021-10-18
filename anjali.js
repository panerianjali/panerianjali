// $(".sum1, .sum2, .sum3, .sum4").keyup(function() {
//     let sum1 = $(".sum1").val();
//     let sum2 = $(".sum2").val();
//     let sum3 = $(".sum3").val();
//     let sum4 = $(".sum4").val();
//     let total = (sum1) * 1 + (sum2) * 1 + (sum3) * 1 + (sum4) * 1;
//     $("#total").val(total);
// });

$(".sum3").keyup(function() {
    let sum1 = $(".sum1").val();
    let sum2 = $(".sum2").val();
    let subTotal = sum1 * sum2;
    let sum3 = $(".sum3").val();
    let taxableValue = subTotal - sum3;
    let gstValue = taxableValue * 0.18;

    $(".sum4").val(gstValue);
    let total = taxableValue + gstValue;
    $(".total1").val(total);

    let total1 = $(".total1").val();
    let total2 = $(".total2").val();

    GrandTotal(total1, total2);

});

$(".sum7").keyup(function() {
    let sum5 = $(".sum5").val();
    let sum6 = $(".sum6").val();
    let subTotal = sum5 * sum6;
    let sum7 = $(".sum7").val();
    let taxableValue = subTotal - sum7;
    let gstValue = taxableValue * 0.18;

    $(".sum8").val(gstValue);
    let total = taxableValue + gstValue;
    $(".total2").val(total);
    let total1 = $(".total1").val();
    let total2 = $(".total2").val();

    GrandTotal(total1, total2);
});


//01 item========================
// MRP Get
// MRP Multiply By Qty.
// SubTotal - Disc
// Taxable Value + GST Amount
// Grand Total

//02 item===================
//MRP Get
// MRP Multiply By qty..
//subtotal - discount
//Taxable Value + GST Amount
// Grand Total

function GrandTotal(total1, total2) {
    let subTotal = total1 * 1 + total2 * 1;
    $("#total").val(subTotal);
}