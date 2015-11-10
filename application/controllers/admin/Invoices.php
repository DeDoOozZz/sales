<?php

class Invoices extends Crud
{
    public $_table = 'invoices';
    public $_primary_key = 'invoice_id';
    public $_index_fields = [
        'name',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
        $this->{$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('invoice_id', lang('invoices_invoice_id'), "trim|required");
$this->form_validation->set_rules('code', lang('invoices_code'), "trim|required");
$this->form_validation->set_rules('user_id', lang('invoices_user_id'), "trim|required");
$this->form_validation->set_rules('client_id', lang('invoices_client_id'), "trim|required");
$this->form_validation->set_rules('cash_type_id', lang('invoices_cash_type_id'), "trim|required");
$this->form_validation->set_rules('due', lang('invoices_due'), "trim|required");
$this->form_validation->set_rules('paid', lang('invoices_paid'), "trim|required");
$this->form_validation->set_rules('rest', lang('invoices_rest'), "trim|required");
$this->form_validation->set_rules('branch_id', lang('invoices_branch_id'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('invoices_timestamp'), "trim|required");
$this->form_validation->set_rules('invoice_status_id', lang('invoices_invoice_status_id'), "trim|required");
$this->form_validation->set_rules('mysql_timestamp', lang('invoices_mysql_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'invoice_id' => $this->input->post('invoice_id'),
'code' => $this->input->post('code'),
'user_id' => $this->input->post('user_id'),
'client_id' => $this->input->post('client_id'),
'cash_type_id' => $this->input->post('cash_type_id'),
'due' => $this->input->post('due'),
'paid' => $this->input->post('paid'),
'rest' => $this->input->post('rest'),
'branch_id' => $this->input->post('branch_id'),
'timestamp' => $this->input->post('timestamp'),
'invoice_status_id' => $this->input->post('invoice_status_id'),
'mysql_timestamp' => $this->input->post('mysql_timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
