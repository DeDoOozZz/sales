<?php

class Format extends Crud
{
    public $_table = 'format';
    public $_primary_key = 'format_id';
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

        $this->form_validation->set_rules('format_id', lang('format_format_id'), "trim|required");
$this->form_validation->set_rules('save_data', lang('format_save_data'), "trim|required");
$this->form_validation->set_rules('original_software', lang('format_original_software'), "trim|required");
$this->form_validation->set_rules('mobile', lang('format_mobile'), "trim|required");
$this->form_validation->set_rules('mark_id', lang('format_mark_id'), "trim|required");
$this->form_validation->set_rules('password', lang('format_password'), "trim|required");
$this->form_validation->set_rules('notes', lang('format_notes'), "trim|required");
$this->form_validation->set_rules('status', lang('format_status'), "trim|required");
$this->form_validation->set_rules('f_step', lang('format_f_step'), "trim|required");
$this->form_validation->set_rules('s_step', lang('format_s_step'), "trim|required");
$this->form_validation->set_rules('invoice_id', lang('format_invoice_id'), "trim|required");
$this->form_validation->set_rules('format_price', lang('format_format_price'), "trim|required");
$this->form_validation->set_rules('format_commission_first', lang('format_format_commission_first'), "trim|required");
$this->form_validation->set_rules('format_commission_second', lang('format_format_commission_second'), "trim|required");
$this->form_validation->set_rules('firm_id', lang('format_firm_id'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('format_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'format_id' => $this->input->post('format_id'),
'save_data' => $this->input->post('save_data'),
'original_software' => $this->input->post('original_software'),
'mobile' => $this->input->post('mobile'),
'mark_id' => $this->input->post('mark_id'),
'password' => $this->input->post('password'),
'notes' => $this->input->post('notes'),
'status' => $this->input->post('status'),
'f_step' => $this->input->post('f_step'),
's_step' => $this->input->post('s_step'),
'invoice_id' => $this->input->post('invoice_id'),
'format_price' => $this->input->post('format_price'),
'format_commission_first' => $this->input->post('format_commission_first'),
'format_commission_second' => $this->input->post('format_commission_second'),
'firm_id' => $this->input->post('firm_id'),
'timestamp' => $this->input->post('timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
