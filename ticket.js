function updateAmount() {
    var ticketType = document.getElementById("ticketType").value;
    var amountField = document.getElementById("amount");

    switch (ticketType) {
        case "regular":
            amountField.value = "$2500";
            break;
        case "couple":
            amountField.value = "$10000";
            break;
        case "table4":
            amountField.value = "$15000";
            break;
        case "table5":
            amountField.value = "$20000";
            break;
        case "table10":
            amountField.value = "$100000";
            break;
        case "table20":
            amountField.value = "$200000";
            break;
        default:
            amountField.value = "";
    }
}