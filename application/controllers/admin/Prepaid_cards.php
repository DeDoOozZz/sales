<?php

class Prepaid_cards extends Crud
{
    public $_table = 'prepaid_cards';
    public $_primary_key = 'prepaid_card_id';
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

        $this->form_validation->set_rules('prepaid_card_id', lang('prepaid_cards_prepaid_card_id'), "trim|required");
$this->form_validation->set_rules('prepaid_card_type_id', lang('prepaid_cards_prepaid_card_type_id'), "trim|required");
$this->form_validation->set_rules('number', lang('prepaid_cards_number'), "trim|required");
$this->form_validation->set_rules('serial', lang('prepaid_cards_serial'), "trim|required");
$this->form_validation->set_rules('expire_date', lang('prepaid_cards_expire_date'), "trim|required");
$this->form_validation->set_rules('created_at', lang('prepaid_cards_created_at'), "trim|required");
$this->form_validation->set_rules('prepaid_card_order_id', lang('prepaid_cards_prepaid_card_order_id'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'prepaid_card_id' => $this->input->post('prepaid_card_id'),
'prepaid_card_type_id' => $this->input->post('prepaid_card_type_id'),
'number' => $this->input->post('number'),
'serial' => $this->input->post('serial'),
'expire_date' => $this->input->post('expire_date'),
'created_at' => $this->input->post('created_at'),
'prepaid_card_order_id' => $this->input->post('prepaid_card_order_id'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
