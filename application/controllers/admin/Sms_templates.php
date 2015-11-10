<?php

class Sms_templates extends Crud
{
    public $_table = 'sms_templates';
    public $_primary_key = 'sms_template_id';
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

        $this->form_validation->set_rules('sms_template_id', lang('sms_templates_sms_template_id'), "trim|required");
$this->form_validation->set_rules('name_ar', lang('sms_templates_name_ar'), "trim|required");
$this->form_validation->set_rules('name_en', lang('sms_templates_name_en'), "trim|required");
$this->form_validation->set_rules('content_ar', lang('sms_templates_content_ar'), "trim|required");
$this->form_validation->set_rules('content_en', lang('sms_templates_content_en'), "trim|required");
$this->form_validation->set_rules('status', lang('sms_templates_status'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('sms_templates_timestamp'), "trim|required");
$this->form_validation->set_rules('created_at', lang('sms_templates_created_at'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'sms_template_id' => $this->input->post('sms_template_id'),
'name_ar' => $this->input->post('name_ar'),
'name_en' => $this->input->post('name_en'),
'content_ar' => $this->input->post('content_ar'),
'content_en' => $this->input->post('content_en'),
'status' => $this->input->post('status'),
'timestamp' => $this->input->post('timestamp'),
'created_at' => $this->input->post('created_at'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
