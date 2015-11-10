<?php

class Fees extends Crud
{
    public $_table = 'fees';
    public $_primary_key = 'fee_id';
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

        $this->form_validation->set_rules('fee_id', lang('fees_fee_id'), "trim|required");
$this->form_validation->set_rules('branch_id', lang('fees_branch_id'), "trim|required");
$this->form_validation->set_rules('fee_type_id', lang('fees_fee_type_id'), "trim|required");
$this->form_validation->set_rules('amount', lang('fees_amount'), "trim|required");
$this->form_validation->set_rules('month', lang('fees_month'), "trim|required");
$this->form_validation->set_rules('year', lang('fees_year'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('fees_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'fee_id' => $this->input->post('fee_id'),
'branch_id' => $this->input->post('branch_id'),
'fee_type_id' => $this->input->post('fee_type_id'),
'amount' => $this->input->post('amount'),
'month' => $this->input->post('month'),
'year' => $this->input->post('year'),
'timestamp' => $this->input->post('timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
