<?php
class ModelFinanceAccounting extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db_finance = $this->load->database('db_finance', TRUE);
    }

    function model_send_Salary_Slip($month_slip, $year_slip, $company_slip, $file_slip)
    {
        $rs = $this->db_finance
            ->set('month_slip', $month_slip)
            ->set('year_slip', $year_slip)
            ->set('company_slip', $company_slip)
            ->set('slip', $file_slip)
            ->set('status', 1)
            ->insert('tb_salary_slip');
        return $rs;
    }

    function model_salary_slip()
    {
        $sql = "SELECT * FROM tb_salary_slip WHERE status = 1 
        ORDER BY year_slip DESC, STR_TO_DATE(month_slip, '%M') DESC";
        $rs = $this->db_finance
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }
}
