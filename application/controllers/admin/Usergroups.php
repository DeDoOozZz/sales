<?php

class Usergroups extends Crud
{
    public $_table = 'usergroups';
    public $_primary_key = 'usergroup_id';
    public $_index_fields = [
        'name',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
        $this->{$this->model}->order_by['name'] = 'ASC';
    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $this->form_validation->set_rules('name', lang('usergroups_name'), "trim|required");


    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'name' => $this->input->post('name'),
        ];

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;

        if($usergroup_id = $this->{$this->model}->save())
        {

        }

    }
}
