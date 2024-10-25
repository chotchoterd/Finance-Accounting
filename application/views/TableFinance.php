<?php
include 'scriptTableFinance.php';
?>
<div class="container mt-3">
    <div class="text-end"><a href="<?php echo base_url('index.php/FinanceAccounting/Accounting') ?>" class="btn btn-primary btn-sm current-date" style="border: none;">Accounting</a></div>
    <?php echo '<b>Month : </b>' . date('F') . '<b> Year : </b>' . date('Y') ?>
    <div class="container">
        <div id="calendar">

        </div>
    </div>
    <center>
        <table class="table table-form">
            <tr>
                <th class="background-th">Month</th>
                <th class="background-th">Year</th>
                <th class="background-th">Amount</th>
                <th class="background-th">Manage</th>
            </tr>
        </table>
    </center>
</div>