<script type="text/javascript">
    $(document).ready(function() {
        $('#bt_cal').click(function() {
            let amount_money = document.getElementById("amount_money").value;
            if (amount_money.length <= 0) {
                let alert_amount_money = document.getElementById("alert_amount_money");
                alert_amount_money.style.display = "table";
                $('#amount_money').focus();
            }
            let month = document.getElementById("month").value;
            if (month.length <= 0) {
                let alert_month = document.getElementById("alert_month");
                alert_month.style.display = "table";
            }
        });

        $('#amount_money').on('input', function() {
            let amount_money = $('#amount_money').val();
            if (amount_money !== "") {
                let alert_amount_money = document.getElementById("alert_amount_money");
                alert_amount_money.style.display = "none";
            }
        });
        $('#month').on("change", function() {
            if ($('#month').val() !== "") {
                let alert_month = document.getElementById("alert_month");
                alert_month.style.display = "none";
            }
        });
    });

    var items = 0;

    function addInput() {
        var html = "<tr>";
        html += "<td><input type=\"date\" class=\"form-control date_expenses\" id=\"date_expenses\" name=\"date_expenses[]\"></td>";
        html += "<td><input type=\"text\" class=\"form-control\" id=\"details_finance\" name=\"details_finance[]\" placeholder=\"Please fill in Details Finance !\"></td>";
        html += "<td><input type=\number\" min=\"0\" class=\"form-control\" id=\"expenses\" name=\"expenses[]\" placeholder=\"Please fill in Expenses !\"></td>";
        html += "<td>";
        html += "<select name=\"necessity[]\" id=\"necessity\" class=\"form-select\" aria-label=\"Default select example\">";
        html += "<option value=\"\" class=\"mit\">- Select -</option>";
        html += "<option value=\"Necessary\">Necessary</option>";
        html += "<option value=\"Unnecessary\">Unnecessary</option>";
        html += "</select>";
        html += "</td>";
        html += "<td><button class=\"btn btn-primary current-date\" style=\"border: none; width: 120px;\" onclick=\"deleteRow(this)\">Delete</button></td>";
        html += "</tr>";
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }

    function deleteRow(button) {
        items--
        button.parentElement.parentElement.remove();
    }
</script>