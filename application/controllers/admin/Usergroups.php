<?php

class Usergroups extends Crud
{
    public $_table = 'usergroups';
    public $_primary_key = 'id';
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

        $this->form_validation->set_rules('id', lang('usergroups_id'), "trim|required");
$this->form_validation->set_rules('name', lang('usergroups_name'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'id' => $this->input->post('id'),
'name' => $this->input->post('name'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
