<?php

class Reports extends Crud
{
    public $_table = 'reports';
    public $_primary_key = 'report_id';
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

        $this->form_validation->set_rules('user_id', lang('reports_user_id'), "trim|required");
        $this->form_validation->set_rules('membership', lang('reports_membership'), "trim|required");
        $this->form_validation->set_rules('mission', lang('reports_mission'), "trim|required");
        $this->form_validation->set_rules('branch_id', lang('reports_branch_id'), "trim|required");
        $this->form_validation->set_rules('ip', lang('reports_ip'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required . "]");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'user_id' => $this->input->post('user_id'),
            'membership' => $this->input->post('membership'),
            'mission' => $this->input->post('mission'),
            'branch_id' => $this->input->post('branch_id'),
            'ip' => $this->input->post('ip'),
        ];
        if ($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
