$(document).ready(function() {

    var calculateBtn = $(".calculateLoan");

    $("#mortrage_calculator").submit(function(e){
            e.preventDefault()
            getValues();
            $("#add_feature").modal("show");
    })

    calculateBtn.click(function(){

    });

    function getValues() {
    //button click gets values from inputs
    var principal = parseFloat($("#principal").val());
    var downpayment = parseFloat($("#downpayment").val());

    var m_net = $("#m_net").val();
    var d_net = $("#d_net").val();
    var y_net = $("#y_net").val();

    var first_payment = m_net + "/" + d_net + "/" + y_net;

    var balance = principal - downpayment;

    var interestRate = (parseFloat($("#interest").val()) / 100.0);

    var terms = parseInt($("#terms").val());

    //set the div string
    var sched_box = $("#schedule_box");

    //in case of a re-calc, clear out the div!
    sched_box.html("");

    sched_box.html(amort(balance, interestRate, terms,first_payment));
    }

    /**
     * Amort function:
     * Calculates the necessary elements of the loan using the supplied user input
     * and then displays each months updated amortization schedule on the page
     */
    function amort(balance, interestRate, terms,first_payment) {

    var curr_date = new Date(first_payment);

    //Calculate the per month interest rate
    var monthlyRate = interestRate / 12;

    //Calculate the payment
    var payment =
    balance * (monthlyRate / (1 - Math.pow(1 + monthlyRate, -terms)));

    //begin building the return string for the display of the amort table
    var result =
    "<h5>Amortization Summary</h5>" +
    "<table class = 'table table-striped'><tr><td>Remaining to pay:</td><td> &#8369 " +
    balance.toLocaleString('en') +
    "</td></tr>" +
    "<tr><td>Interest rate: </td><td>" +
    (interestRate * 100) +
    "%</td></tr>" +
    "<tr><td>Number of months: </td><td>" +
    terms +
    "</td></tr>" +
    "<tr><td>Monthly payment:</td><td> &#8369 " +
    payment.toLocaleString('en') +
    "</td></tr>" +
    "<tr><td> Total paid:</td><td> &#8369 " +
    (payment * terms).toLocaleString('en') +
    "</td></tr></table><br/><br/>";

    result += "<h5>Amortization schedule</h5>"
    //add header row for table to return string
    result +=
    "<table class = 'table table-striped'><tr><th>Month #</th><th>Balance</th>" +
    "<th>Interest</th><th>Principal</th>";

    /**
     * Loop that calculates the monthly Loan amortization amounts then adds
     * them to the return string
     */
    for (var count = 0; count < terms; ++count) {
    //in-loop interest amount holder
    var interest = 0;

    //in-loop monthly principal amount holder
    var monthlyPrincipal = 0;

    //start a new table row on each loop iteration
    result += "<tr>";

    //display the month number in col 1 using the loop count variable
    result += "<td>" + curr_date.toString("MMM d,yyyy") + "</td>";

    //code for displaying in loop balance
    result += "<td> &#8369 " + balance.toLocaleString('en'); + "</td>";

    //calc the in-loop interest amount and display
    interest = balance * monthlyRate;
    result += "<td> &#8369 " + interest.toFixed(2) + "</td>";

    //calc the in-loop monthly principal and display
    monthlyPrincipal = payment - interest;
    result += "<td> &#8369 " + monthlyPrincipal.toLocaleString('en'); + "</td>";

    //end the table row on each iteration of the loop
    result += "</tr>";

    //update the balance for each loop iteration
    balance = balance - monthlyPrincipal;

    curr_date = curr_date.addMonths(1);
    }

    //Final piece added to return string before returning it - closes the table
    result += "</table>";

    //returns the concatenated string to the page
    return result;
    }

    function validateInputs(value) {
    //some code here to validate inputs
    if (value == null || value == "") {
    return false;
    } else {
    return true;
    }
    }

    });
