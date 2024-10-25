<script type="text/javascript">
    $(document).ready(function() {
        $('#add_slip').click(function() {
            let month_slip = document.getElementById("month_slip").value;
            let year_slip = document.getElementById("year_slip").value;
            let company_slip = document.getElementById("company_slip").value;
            let file_slip = document.getElementById("file_slip").value;

            if (month_slip.length != '' && year_slip.length != '' && company_slip.length != '' && file_slip.length != '') {
                send_Salary_Slip();
            } else {
                if (month_slip.length <= 0) {
                    let alert_month_slip = document.getElementById("alert_month_slip");
                    alert_month_slip.style.display = 'table';
                }
                if (year_slip.length <= 0) {
                    let alert_year_slip = document.getElementById("alert_year_slip");
                    alert_year_slip.style.display = 'table';
                }
                if (company_slip.length <= 0) {
                    let alert_company_slip = document.getElementById("alert_company_slip");
                    alert_company_slip.style.display = 'table';
                }
                if (file_slip.length <= 0) {
                    let alert_file_slip = document.getElementById("alert_file_slip");
                    alert_file_slip.style.display = 'table';
                }
            }
        });

        $('#month_slip').change(function() {
            let alert_month_slip = document.getElementById("alert_month_slip");
            alert_month_slip.style.display = 'none';
        });
        $('#year_slip').change(function() {
            let alert_year_slip = document.getElementById("alert_year_slip");
            alert_year_slip.style.display = 'none';
        });
        $('#company_slip').change(function() {
            let alert_company_slip = document.getElementById("alert_company_slip");
            alert_company_slip.style.display = 'none';
        });
        $('#file_slip').on('change', function() {
            if ($('#file_slip').val() !== '') {
                let alert_file_slip = document.getElementById("alert_file_slip");
                alert_file_slip.style.display = 'none';
            }
        })
    });

    function send_Salary_Slip() {
        let month_slip = document.getElementById("month_slip").value;
        let year_slip = document.getElementById("year_slip").value;
        let company_slip = document.getElementById("company_slip").value;
        let file_datetime = document.getElementById("current_date_time").value;
        let fileInput;
        let file_slip = "N/A";
        if (document.getElementById("file_slip").files.length != 0) {
            fileInput = document.getElementById("file_slip");
            const filename = fileInput.files[0].name;
            const extension = filename.split('.').pop();
            file_slip = 'Salary-Slip-' + file_datetime + '.' + extension;
        }

        $.ajax({
            url: '<?php echo base_url('index.php/FinanceAccounting/send_Salary_Slip_ajax') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                month_slip: month_slip,
                year_slip: year_slip,
                company_slip: company_slip,
                file_slip: file_slip
            },
            success: function(data) {
                Swal.fire({
                    title: "Save successfully",
                    text: "",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/FinanceAccounting/SalarySlip'); ?>';
                });
            }
        })
    }

    $(function() {
        $('#salary_slip_form').on('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/FinanceAccounting/uploadAttachment',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>