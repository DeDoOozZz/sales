<?php

class Branches extends Crud
{
    public $_table = 'branches';
    public $_primary_key = 'branch_id';
    public $_index_fields = [
        'name',
    ];

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
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '0';
        $this->form_validation->set_rules('name', lang('branches_name'), "trim|required");
        $this->form_validation->set_rules('place', lang('branches_place'), "trim|required");
        $this->form_validation->set_rules('notes', lang('branches_notes'), "trim");
        $this->form_validation->set_rules('phone', lang('branches_phone'), "trim|required|numeric");
        $this->form_validation->set_rules('sales_invoice_type_id', lang('branches_sales_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('format_invoice_type_id', lang('branches_format_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('services_invoice_type_id', lang('branches_services_invoice_type_id'), "trim|required");
        $this->form_validation->set_rules('accept_cc', lang('branches_accept_cc'), "trim|required");
        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");
        $this->form_validation->set_rules('header', lang('branches_header'), "trim");
        $this->form_validation->set_rules('footer', lang('branches_footer'), "trim");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name' => $this->input->post('name'),
            'place' => $this->input->post('place'),
            'notes' => $this->input->post('notes'),
            'phone' => $this->input->post('phone'),
            'sales_invoice_type_id' => $this->input->post('sales_invoice_type_id'),
            'format_invoice_type_id' => $this->input->post('format_invoice_type_id'),
            'services_invoice_type_id' => $this->input->post('services_invoice_type_id'),
            'accept_cc' => $this->input->post('accept_cc'),
            'header' => $this->input->post('header'),
            'footer' => $this->input->post('footer'),
        ];
        if($op == 'add')
            $vars['created_at'] = now();
        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
