<?php

class Sms_templates extends Crud
{
    public $_table = 'sms_templates';
    public $_primary_key = 'sms_template_id';

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
        $this->form_validation->set_rules('name_ar', lang('sms_templates_name_ar'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('sms_templates_name_en'), "trim|required");
        $this->form_validation->set_rules('content_ar', lang('sms_templates_content_ar'), "trim|required");
        $this->form_validation->set_rules('content_en', lang('sms_templates_content_en'), "trim|required");
        $this->form_validation->set_rules('status', lang('sms_templates_status'), "trim|required");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name_ar' => $this->input->post('name_ar'),
            'name_en' => $this->input->post('name_en'),
            'content_ar' => $this->input->post('content_ar'),
            'content_en' => $this->input->post('content_en'),
            'status' => $this->input->post('status'),
        ];
        if ($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
