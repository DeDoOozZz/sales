<?php

class Services extends Crud
{
    public $_table = 'services';
    public $_primary_key = 'service_id';
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

        $this->form_validation->set_rules('service_id', lang('services_service_id'), "trim|required");
$this->form_validation->set_rules('service_provider_id', lang('services_service_provider_id'), "trim|required");
$this->form_validation->set_rules('sim_type_id', lang('services_sim_type_id'), "trim|required");
$this->form_validation->set_rules('register', lang('services_register'), "trim|required");
$this->form_validation->set_rules('register_code', lang('services_register_code'), "trim|required");
$this->form_validation->set_rules('required', lang('services_required'), "trim|required");
$this->form_validation->set_rules('commision', lang('services_commision'), "trim|required");
$this->form_validation->set_rules('price', lang('services_price'), "trim|required");
$this->form_validation->set_rules('net_profit', lang('services_net_profit'), "trim|required");
$this->form_validation->set_rules('discount', lang('services_discount'), "trim|required");
$this->form_validation->set_rules('desc', lang('services_desc'), "trim|required");
$this->form_validation->set_rules('points', lang('services_points'), "trim|required");
$this->form_validation->set_rules('stock_1', lang('services_stock_1'), "trim|required");
$this->form_validation->set_rules('stock_2', lang('services_stock_2'), "trim|required");
$this->form_validation->set_rules('stock_3', lang('services_stock_3'), "trim|required");
$this->form_validation->set_rules('barcode', lang('services_barcode'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'service_id' => $this->input->post('service_id'),
'service_provider_id' => $this->input->post('service_provider_id'),
'sim_type_id' => $this->input->post('sim_type_id'),
'register' => $this->input->post('register'),
'register_code' => $this->input->post('register_code'),
'required' => $this->input->post('required'),
'commision' => $this->input->post('commision'),
'price' => $this->input->post('price'),
'net_profit' => $this->input->post('net_profit'),
'discount' => $this->input->post('discount'),
'desc' => $this->input->post('desc'),
'points' => $this->input->post('points'),
'stock_1' => $this->input->post('stock_1'),
'stock_2' => $this->input->post('stock_2'),
'stock_3' => $this->input->post('stock_3'),
'barcode' => $this->input->post('barcode'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
