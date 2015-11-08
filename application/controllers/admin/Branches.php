<?php

class Branches extends Crud
{
    public $_table = 'branches';
    public $_primary_key = 'branch_id';

    public function __construct()
    {
        parent::__construct();

    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = 'branches.*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
        $this->{$this->model}->order_by['branches.name'] = 'ASC';
    }

    protected function onValidationEvent($op, $id = false)
    {

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('branch_id', lang('branch_id'), "trim|required");
        $this->form_validation->set_rules('name', lang('name'), "trim|required");
        $this->form_validation->set_rules('place', lang('place'), "trim|required");
        $this->form_validation->set_rules('notes', lang('notes'), "trim|required");
        $this->form_validation->set_rules('phone', lang('phone'), "trim|required");
        $this->form_validation->set_rules('sales_invoice_type_id', lang('sales_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('format_invoice_type_id', lang('format_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('services_invoice_type_id', lang('services_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('transactions', lang('transactions'), "trim|required");
        $this->form_validation->set_rules('logo', lang('logo'), "trim|callback_file[1]");
        $this->form_validation->set_rules('header', lang('header'), "trim|required");
        $this->form_validation->set_rules('footer', lang('footer'), "trim|required");

    }

    protected function onSuccessEvent($op, $id = false)
    {

        $vars = [
            'branch_id' => $this->input->post('branch_id'),
            'name' => $this->input->post('name'),
            'place' => $this->input->post('place'),
            'notes' => $this->input->post('notes'),
            'phone' => $this->input->post('phone'),
            'sales_invoice_type_id' => $this->input->post('sales_invoice_type_id'),
            'format_invoice_type_id' => $this->input->post('format_invoice_type_id'),
            'services_invoice_type_id' => $this->input->post('services_invoice_type_id'),
            'transactions' => $this->input->post('transactions'),
//            'logo' => $this->input->post('logo'),
            'header' => $this->input->post('header'),
            'footer' => $this->input->post('footer'),
            'timestamp' => date('Y-m-d H:i:s'),
        ];

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }

}
