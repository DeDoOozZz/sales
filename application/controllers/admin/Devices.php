<?php

class Devices extends Crud
{
    public $_table = 'devices';
    public $_primary_key = 'device_id';

    public function __construct()
    {
        parent::__construct();
        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
        $this->{$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['device_types'] = dd2menu('device_types', ['device_type_id' => name()]);
        $this->data['device_status'] = dd2menu('device_status', ['device_status_id' => name()]);
        $this->data['warranties'] = dd2menu('warranties', ['warranty_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '0';

        $this->form_validation->set_rules('device_type_id', lang('devices_device_type_id'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('devices_name_en'), "trim|required");
        $this->form_validation->set_rules('name_ar', lang('devices_name_ar'), "trim|required");
        $this->form_validation->set_rules('device_status_id', lang('devices_device_status_id'), "trim|required");
        $this->form_validation->set_rules('free_sim', lang('devices_free_sim'), "trim|required");
        $this->form_validation->set_rules('warranty_id', lang('devices_warranty_id'), "trim|required");
        $this->form_validation->set_rules('warranty_days', lang('devices_warranty_days'), "trim|required");
        $this->form_validation->set_rules('partner', lang('devices_partner'), "trim|required");
        $this->form_validation->set_rules('cost', lang('devices_cost'), "trim|required");
        $this->form_validation->set_rules('commision', lang('devices_commision'), "trim|required");
        $this->form_validation->set_rules('price', lang('devices_price'), "trim|required");
        $this->form_validation->set_rules('discount', lang('devices_discount'), "trim|required");
        $this->form_validation->set_rules('desc', lang('devices_desc'), "trim|required");
        $this->form_validation->set_rules('points', lang('devices_points'), "trim|required");
        $this->form_validation->set_rules('barcode', lang('devices_barcode'), "trim|required");

//        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required . "]");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'device_type_id' => $this->input->post('device_type_id'),
            'name_en' => $this->input->post('name_en'),
            'name_ar' => $this->input->post('name_ar'),
            'device_status_id' => $this->input->post('device_status_id'),
            'free_sim' => $this->input->post('free_sim'),
            'warranty_id' => $this->input->post('warranty_id'),
            'warranty_days' => $this->input->post('warranty_days'),
            'partner' => $this->input->post('partner'),
            'cost' => $this->input->post('cost'),
            'commision' => $this->input->post('commision'),
            'price' => $this->input->post('price'),
            'discount' => $this->input->post('discount'),
            'desc' => $this->input->post('desc'),
            'points' => $this->input->post('points'),
            'barcode' => $this->input->post('barcode'),
        ];
//        if ($op == 'add')
//            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
    public function barcode($barcode) {
        $this->load->helper('barcode');
        echo barcode($barcode);
    }
}
