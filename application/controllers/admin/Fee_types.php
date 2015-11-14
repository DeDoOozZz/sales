<?php

class Fee_types extends Crud
{
    public $_table = 'fee_types';
    public $_primary_key = 'fee_type_id';
    public $_index_fields = [
//        'name',
    ];

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
        $this->form_validation->set_rules('name_en', lang('fee_types_name_en'), "trim|required");
        $this->form_validation->set_rules('name_ar', lang('fee_types_name_ar'), "trim|required");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name_en' => $this->input->post('name_en'),
            'name_ar' => $this->input->post('name_ar'),
        ];

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
