<?php

class Departments extends Crud
{
    public $_table = 'departments';
    public $_primary_key = 'department_id';


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


        $this->form_validation->set_rules('name_en', lang('departments_name_en'), "trim|required");
        $this->form_validation->set_rules('name_ar', lang('departments_name_ar'), "trim|required");
        $this->form_validation->set_rules('desc', lang('departments_desc'), "trim|required");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name_en' => $this->input->post('name_en'),
            'name_ar' => $this->input->post('name_ar'),
            'desc' => $this->input->post('desc'),
        ];

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
