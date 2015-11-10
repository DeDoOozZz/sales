<?php

class Users extends Crud
{
    public $_table = 'users';
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

        $this->form_validation->set_rules('id', lang('users_id'), "trim|required");
$this->form_validation->set_rules('firm_id', lang('users_firm_id'), "trim|required");
$this->form_validation->set_rules('usergroup_id', lang('users_usergroup_id'), "trim|required");
$this->form_validation->set_rules('language', lang('users_language'), "trim|required");
$this->form_validation->set_rules('name', lang('users_name'), "trim|required");
$this->form_validation->set_rules('full_name', lang('users_full_name'), "trim|required");
$this->form_validation->set_rules('email', lang('users_email'), "trim|required");
$this->form_validation->set_rules('phone', lang('users_phone'), "trim|required");
$this->form_validation->set_rules('mobile', lang('users_mobile'), "trim|required");
$this->form_validation->set_rules('password', lang('users_password'), "trim|required");
$this->form_validation->set_rules('address', lang('users_address'), "trim|required");
$this->form_validation->set_rules('notes', lang('users_notes'), "trim|required");
$this->form_validation->set_rules('salary', lang('users_salary'), "trim|required");
$this->form_validation->set_rules('commision', lang('users_commision'), "trim|required");
$this->form_validation->set_rules('id_no', lang('users_id_no'), "trim|required");
$this->form_validation->set_rules('id_expiredate', lang('users_id_expiredate'), "trim|required");
$this->form_validation->set_rules('passport_no', lang('users_passport_no'), "trim|required");
$this->form_validation->set_rules('passport_expiredate', lang('users_passport_expiredate'), "trim|required");
$this->form_validation->set_rules('ip', lang('users_ip'), "trim|required");
$this->form_validation->set_rules('status', lang('users_status'), "trim|required");
$this->form_validation->set_rules('ban_time', lang('users_ban_time'), "trim|required");
$this->form_validation->set_rules('image', lang('users_image'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('users_timestamp'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'id' => $this->input->post('id'),
'firm_id' => $this->input->post('firm_id'),
'usergroup_id' => $this->input->post('usergroup_id'),
'language' => $this->input->post('language'),
'name' => $this->input->post('name'),
'full_name' => $this->input->post('full_name'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'mobile' => $this->input->post('mobile'),
'password' => $this->input->post('password'),
'address' => $this->input->post('address'),
'notes' => $this->input->post('notes'),
'salary' => $this->input->post('salary'),
'commision' => $this->input->post('commision'),
'id_no' => $this->input->post('id_no'),
'id_expiredate' => $this->input->post('id_expiredate'),
'passport_no' => $this->input->post('passport_no'),
'passport_expiredate' => $this->input->post('passport_expiredate'),
'ip' => $this->input->post('ip'),
'status' => $this->input->post('status'),
'ban_time' => $this->input->post('ban_time'),
'image' => $this->input->post('image'),
'timestamp' => $this->input->post('timestamp'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
