<?php
include 'scriptSalarySlip.php';
$a = 0;
?>
<div class="container mt-3">
    <form action="" method="post" id="salary_slip_form" enctype="multipart/form-data">
        <table class="table table-form">
            <tr>
                <th class="display-5" colspan="5">Add Salary Slip</th>
            </tr>
            <tr>
                <th>Mouth :</th>
                <th>Year :</th>
                <th>Company :</th>
                <th>Slip :</th>
                <th>Manage :</th>
            </tr>
            <tr>
                <td class="mit">
                    <?php
                    $month_current = date('F');
                    ?>
                    <select name="month_slip" id="month_slip" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php
                        $months = [
                            'January', 'February', 'March', 'April',
                            'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ];
                        foreach ($months as $index => $month) {
                            $monthValue = $index + 1; // Months are 1-based in HTML
                            // $selected = ($month_current == $month) ? 'selected' : '';
                            echo "<option value=\"$month\">$month</option>";
                        }
                        ?>
                    </select>
                    <div class="text-danger font-12 mt-2" style="display: none;" id="alert_month_slip">Please select Month !</div>
                </td>
                <td class="mit">
                    <select name="year_slip" id="year_slip" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php
                        $current_year = date("Y");
                        for ($i = $current_year - 4; $i <= $current_year + 5; $i++) {
                            $selected = ($i == $current_year) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                    <div class="text-danger font-12 mt-2" style="display: none;" id="alert_year_slip">Please select Year !</div>
                </td>
                <td class="mit">
                    <select name="company_slip" id="company_slip" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="TNS">TNS</option>
                    </select>
                    <div class="text-danger font-12 mt-2" style="display: none;" id="alert_company_slip">Please select Company !</div>
                </td>
                <td class="mit">
                    <input class="form-control" type="file" id="file_slip" name="file_slip">
                    <input type="hidden" name="current_date_time" id="current_date_time" value="<?php echo date('Y-m-d-H-i-s') ?>">
                    <div class="text-danger font-12 mt-2" style="display: none;" id="alert_file_slip">Please fill in file Slip !</div>
                </td>
                <td class="mit">
                    <button type="submit" class="btn btn-primary current-date" style="width: 120px; border: none;" id="add_slip" name="add_slip">Add</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="display-5" colspan="6">Salary Slip</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Date added</th>
            <th>Month</th>
            <th>Year</th>
            <th>Company</th>
            <th>Salary Slip</th>
        </tr>
        <?php foreach ($salary_slip as $salary_slips) {
            $a++ ?>
            <tr>
                <td class="mit"><?php echo $a; ?>.</td>
                <td class="mit">
                    <?php
                    $dateOld = $salary_slips->date_add;
                    $dateNew = date('d/m/Y h:i A', strtotime($dateOld));
                    echo $dateNew; ?>
                </td>
                <td class="mit">
                    <?php echo $salary_slips->month_slip ?>
                </td>
                <td class="mit">
                    <?php echo $salary_slips->year_slip ?>
                </td>
                <td class="mit">
                    <?php echo $salary_slips->company_slip ?>
                </td>
                <td class="mit">
                    <a href="<?php echo base_url('./attachment/') ?><?php echo $salary_slips->slip ?>" style="color: #000; border: none; width: 300px;" target="_blank" class="btn btn-primary current-date"><?php echo $salary_slips->month_slip . '-' . $salary_slips->year_slip . '-' . $salary_slips->company_slip ?></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>