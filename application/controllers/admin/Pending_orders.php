<?php

class Pending_orders extends Crud
{
    public $_table = 'pending_orders';
    public $_primary_key = 'pending_order_id';
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

        $this->form_validation->set_rules('pending_order_id', lang('pending_orders_pending_order_id'), "trim|required");
$this->form_validation->set_rules('name', lang('pending_orders_name'), "trim|required");
$this->form_validation->set_rules('user_id', lang('pending_orders_user_id'), "trim|required");
$this->form_validation->set_rules('client_id', lang('pending_orders_client_id'), "trim|required");
$this->form_validation->set_rules('branch_id', lang('pending_orders_branch_id'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('pending_orders_timestamp'), "trim|required");
$this->form_validation->set_rules('mysql_timestamp', lang('pending_orders_mysql_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'pending_order_id' => $this->input->post('pending_order_id'),
'name' => $this->input->post('name'),
'user_id' => $this->input->post('user_id'),
'client_id' => $this->input->post('client_id'),
'branch_id' => $this->input->post('branch_id'),
'timestamp' => $this->input->post('timestamp'),
'mysql_timestamp' => $this->input->post('mysql_timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
