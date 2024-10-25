<?php
include 'scriptAccounting.php';
?>
<div class="container mt-3">
    <center>
        <table class="table table-form">
            <tr>
                <th class="display-5" colspan="5">Accounting</th>
            </tr>
            <tr>
                <th colspan="2">
                    Amount Money :<input type="number" min="0" class="form-control" id="amount_money" name="amount_money" placeholder="Please fill in Amount Money !">
                    <div id="alert_amount_money" class="text-start text-danger font-12 mt-2" style="display: none;">Please fill in Amount Money !</div>
                </th>
                <th colspan="2">
                    Month :
                    <?php
                    $month_current = date('F');
                    ?>
                    <select name="month" id="month" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php
                        $months = [
                            'January', 'February', 'March', 'April',
                            'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ];

                        foreach ($months as $index => $month) {
                            $monthValue = $index + 1; // Months are 1-based in HTML
                            $selected = ($month_current == $month) ? 'selected' : '';
                            echo "<option value=\"$month\" $selected>$month</option>";
                        }
                        ?>
                    </select>
                    <div id="alert_month" class="text-start text-danger font-12 mt-2" style="display: none;">Please select Month !</div>
                </th>
                <th class="mit">
                    Year : <br>
                    <?php echo date('Y') ?>
                </th>
            </tr>
            <tr>
                <th>Date :</th>
                <th>Details Finance :</th>
                <th>Expenses :</th>
                <th>Necessity :</th>
                <th>Manage</th>
            </tr>
            <tr>
                <td>
                    <input type="date" class="form-control" id="date_expenses" name="date_expenses[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="details_finance" name="details_finance[]" placeholder="Please fill in Details Finance !">
                </td>
                <td>
                    <input type="number" min="0" class="form-control" id="expenses" name="expenses[]" placeholder="Please fill in Expenses !">
                </td>
                <td>
                    <select name="necessity[]" id="necessity" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="">Necessary</option>
                        <option value="">Unnecessary</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary current-date" style="border: none; width: 120px;" onclick="addInput()">Add Rows</button>
                </td>
            </tr>
            <tbody id="tbody" style="border: none;">
            </tbody>
            <tr>
                <td colspan="5">
                    <button class="btn btn-primary current-date" id="bt_cal" name="bt_cal" style="border: none;">Calulate</button>
                </td>
            </tr>
        </table>
    </center>
</div>