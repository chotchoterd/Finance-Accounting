<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FinanceAccounting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '180');
        $this->load->helper(array('form', 'url'));
        $this->load->model('ModelFinanceAccounting', 'finance');
    }

    public function uploadAttachment()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $file_datetime = $_POST["current_date_time"];
        }
        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['file_name'] = "Salary-Slip-" . $file_datetime;
        $this->load->library('upload');

        $uploaded_files = array();

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_slip')) {
            $uploaded_files['file_slip'] = $this->upload->data();
        } else {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            return;
        }
        echo json_encode($uploaded_files);
    }

    function read_json($json)
    {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        echo $json;
    }

    function TableFinance()
    {
        $title['title'] = 'Finance & Accounting';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('TableFinance');
        // $this->load->view('include/footer');
    }

    function Accounting()
    {
        $title['title'] = 'Accounting';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('Accounting');
    }

    function CalculateOT()
    {
        $title['title'] = 'Calculate OT';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('CalculateOT');
    }

    function SalarySlip()
    {
        $salary_slip['salary_slip'] = $this->finance->model_salary_slip();
        $title['title'] = 'Salary Slip';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('SalarySlip', $salary_slip);
    }

    function send_Salary_Slip_ajax()
    {
        $month_slip = $this->input->post('month_slip');
        $year_slip = $this->input->post('year_slip');
        $company_slip = $this->input->post('company_slip');
        $file_slip = $this->input->post('file_slip');

        $rs = $this->finance->model_send_Salary_Slip($month_slip, $year_slip, $company_slip, $file_slip);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }
}
