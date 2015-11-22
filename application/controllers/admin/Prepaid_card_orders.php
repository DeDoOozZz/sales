<?php

class Prepaid_card_orders extends Crud
{
    public $_table = 'prepaid_card_orders';
    public $_primary_key = 'prepaid_card_order_id';
    public $_index_fields = [
        'name',
    ];

    public function __construct()
    {
        parent::__construct();
//        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
//        $this->{$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('prepaid_card_order_id', lang('prepaid_card_orders_prepaid_card_order_id'), "trim|required");
$this->form_validation->set_rules('card_type_id', lang('prepaid_card_orders_card_type_id'), "trim|required");
$this->form_validation->set_rules('prepaid_card_id', lang('prepaid_card_orders_prepaid_card_id'), "trim|required");
$this->form_validation->set_rules('total_cards', lang('prepaid_card_orders_total_cards'), "trim|required");
$this->form_validation->set_rules('date', lang('prepaid_card_orders_date'), "trim|required");
$this->form_validation->set_rules('invoice_id', lang('prepaid_card_orders_invoice_id'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'prepaid_card_order_id' => $this->input->post('prepaid_card_order_id'),
'card_type_id' => $this->input->post('card_type_id'),
'prepaid_card_id' => $this->input->post('prepaid_card_id'),
'total_cards' => $this->input->post('total_cards'),
'date' => $this->input->post('date'),
'invoice_id' => $this->input->post('invoice_id'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
