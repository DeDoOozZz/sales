<?php

class Sim_types extends Crud
{
    public $_table = 'sim_types';
    public $_primary_key = 'sim_type_id';

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
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('name_ar', lang('sim_types_name_ar'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('sim_types_name_en'), "trim|required");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name_ar' => $this->input->post('name_ar'),
            'name_en' => $this->input->post('name_en'),

        ];


        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
