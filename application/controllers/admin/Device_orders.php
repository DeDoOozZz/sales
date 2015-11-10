<?php

class Device_orders extends Crud
{
    public $_table = 'device_orders';
    public $_primary_key = 'device_order_id';
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

        $this->form_validation->set_rules('device_order_id', lang('device_orders_device_order_id'), "trim|required");
$this->form_validation->set_rules('serial', lang('device_orders_serial'), "trim|required");
$this->form_validation->set_rules('barcode', lang('device_orders_barcode'), "trim|required");
$this->form_validation->set_rules('mobile', lang('device_orders_mobile'), "trim|required");
$this->form_validation->set_rules('social_id', lang('device_orders_social_id'), "trim|required");
$this->form_validation->set_rules('invoice_id', lang('device_orders_invoice_id'), "trim|required");
$this->form_validation->set_rules('client_id', lang('device_orders_client_id'), "trim|required");
$this->form_validation->set_rules('branch_id', lang('device_orders_branch_id'), "trim|required");
$this->form_validation->set_rules('status', lang('device_orders_status'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('device_orders_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'device_order_id' => $this->input->post('device_order_id'),
'serial' => $this->input->post('serial'),
'barcode' => $this->input->post('barcode'),
'mobile' => $this->input->post('mobile'),
'social_id' => $this->input->post('social_id'),
'invoice_id' => $this->input->post('invoice_id'),
'client_id' => $this->input->post('client_id'),
'branch_id' => $this->input->post('branch_id'),
'status' => $this->input->post('status'),
'timestamp' => $this->input->post('timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
