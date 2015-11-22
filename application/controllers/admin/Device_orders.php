<?php

class Device_orders extends Crud
{
    public $_table = 'device_orders';
    public $_primary_key = 'device_order_id';
    public $_index_fields = [
        'device_order_id',
    ];

    public function __construct()
    {
        parent::__construct();
//        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
//        $this->{$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);
//
        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('serial', lang('device_orders_serial'), "trim|required");
        $this->form_validation->set_rules('device_id', lang('device_orders_device_id'), "trim|required");
        $this->form_validation->set_rules('mobile', lang('device_orders_mobile'), "trim|required");
//        $this->form_validation->set_rules('social_id', lang('device_orders_social_id'), "trim|required");
//        $this->form_validation->set_rules('invoice_id', lang('device_orders_invoice_id'), "trim|required");
        $this->form_validation->set_rules('client_id', lang('device_orders_client_id'), "trim|required");
//        $this->form_validation->set_rules('branch_id', lang('device_orders_branch_id'), "trim|required");
        $this->form_validation->set_rules('social_id', lang('device_orders_social_id'), "callback_file[social_id," . $required . "]");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        // TODO: CREATE INVOICE AND ORDER PROCESS
        $this->load->library('order');
        $vars = [
            'serial' => $this->input->post('serial'),
            'device_id' => $this->input->post('device_id'),
            'mobile' => $this->input->post('mobile'),
            'social_id' => $this->{$this->model}->social_id,
            'client_id' => $this->input->post('client_id'),
            'paid' => $this->input->post('paid'),
            'user_id' => $this->user->user_id,
            'branch_id' => $this->user->branch_id,
            'status' => 1,
            'created_at' => now()
        ];
        $this->order->deviceOrder($vars);
        die(json_encode(['invoice_id' => $this->order->invoice_id]));
    }

    public function get_client_phone()
    {
        echo $this->db->select('mobile')->where('client_id', $this->input->get('client_id'))->get('clients')->row()->mobile;
    }

    public function get_device()
    {
        $device = $this->db->select('*')->where('barcode', $this->input->get('barcode'))->get('devices')->row();
        echo json_encode($device ? $device : ['error' => true]);
    }
}
