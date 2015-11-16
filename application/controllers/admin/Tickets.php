<?php

class Tickets extends Crud
{
    public $_table = 'tickets';
    public $_primary_key = 'ticket_id';
    public $_index_fields = [
        'title',
        'datetime'
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
        $this->{$this->model}->order_by['datetime'] = 'DESC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('ticket_id', lang('tickets_ticket_id'), "trim|required");
$this->form_validation->set_rules('title', lang('tickets_title'), "trim|required");
$this->form_validation->set_rules('department_id', lang('tickets_department_id'), "trim|required");
$this->form_validation->set_rules('ticket_status_id', lang('tickets_ticket_status_id'), "trim|required");
$this->form_validation->set_rules('client_id', lang('tickets_client_id'), "trim|required");
$this->form_validation->set_rules('content', lang('tickets_content'), "trim|required");
$this->form_validation->set_rules('datetime', lang('tickets_datetime'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'ticket_id' => $this->input->post('ticket_id'),
'title' => $this->input->post('title'),
'department_id' => $this->input->post('department_id'),
'ticket_status_id' => $this->input->post('ticket_status_id'),
'client_id' => $this->input->post('client_id'),
'content' => $this->input->post('content'),
'datetime' => $this->input->post('datetime'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
