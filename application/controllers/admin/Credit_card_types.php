<?php

class Credit_card_types extends Crud
{
    public $_table = 'credit_card_types';
    public $_primary_key = 'credit_card_type_id';
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

        $this->form_validation->set_rules('name_ar', lang('credit_card_types_name_ar'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('credit_card_types_name_en'), "trim|required");


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
