<?php

class Prepaid_card_types extends Crud
{
    public $_table = 'prepaid_card_types';
    public $_primary_key = 'prepaid_card_type_id';
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

        $this->form_validation->set_rules('prepaid_card_type_id', lang('prepaid_card_types_prepaid_card_type_id'), "trim|required");
$this->form_validation->set_rules('service_provider_id', lang('prepaid_card_types_service_provider_id'), "trim|required");
$this->form_validation->set_rules('country_id', lang('prepaid_card_types_country_id'), "trim|required");
$this->form_validation->set_rules('card_type_id', lang('prepaid_card_types_card_type_id'), "trim|required");
$this->form_validation->set_rules('image', lang('prepaid_card_types_image'), "trim|required");
$this->form_validation->set_rules('name_ar', lang('prepaid_card_types_name_ar'), "trim|required");
$this->form_validation->set_rules('name_en', lang('prepaid_card_types_name_en'), "trim|required");
$this->form_validation->set_rules('cost', lang('prepaid_card_types_cost'), "trim|required");
$this->form_validation->set_rules('profit', lang('prepaid_card_types_profit'), "trim|required");
$this->form_validation->set_rules('discount', lang('prepaid_card_types_discount'), "trim|required");
$this->form_validation->set_rules('employee_commission', lang('prepaid_card_types_employee_commission'), "trim|required");
$this->form_validation->set_rules('desc_ar', lang('prepaid_card_types_desc_ar'), "trim|required");
$this->form_validation->set_rules('desc_en', lang('prepaid_card_types_desc_en'), "trim|required");
$this->form_validation->set_rules('notes', lang('prepaid_card_types_notes'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'prepaid_card_type_id' => $this->input->post('prepaid_card_type_id'),
'service_provider_id' => $this->input->post('service_provider_id'),
'country_id' => $this->input->post('country_id'),
'card_type_id' => $this->input->post('card_type_id'),
'image' => $this->input->post('image'),
'name_ar' => $this->input->post('name_ar'),
'name_en' => $this->input->post('name_en'),
'cost' => $this->input->post('cost'),
'profit' => $this->input->post('profit'),
'discount' => $this->input->post('discount'),
'employee_commission' => $this->input->post('employee_commission'),
'desc_ar' => $this->input->post('desc_ar'),
'desc_en' => $this->input->post('desc_en'),
'notes' => $this->input->post('notes'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
