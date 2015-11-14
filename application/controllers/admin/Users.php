<?php

class Users extends Crud
{
    public $_table = 'users';
    public $_primary_key = 'user_id';
    public $_index_fields = [
        'username',
        'email',
        'ip'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Cdn');
//        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->data['branches'] = dd2menu('branches', ['branch_id' => 'name']);
        $this->data['usergroups'] = dd2menu('usergroups', ['usergroup_id' => 'name']);
        $this->data['user_status'] = dd2menu('user_status', ['user_status_id' => name()]);
        $this->data['languages'] = ddlanguages();

        $this->{$this->model}->custom_select = '*';
        $this->_index_view = 'users_index';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );

        $this->{$this->model}->order_by['full_name'] = 'ASC';

        if ($this->input->get('branch_id'))
            $this->General_model->where('branch_id', $this->input->get('branch_id'));

        if ($this->input->get('usergroup_id'))
            $this->General_model->where('usergroup_id', $this->input->get('usergroup_id'));

        if ($this->input->get('username'))
            $this->General_model->like('username', $this->input->get('username'));

        if ($this->input->get('email'))
            $this->General_model->like('email', $this->input->get('email'));

        if ($this->input->get('phone'))
            $this->General_model->like('phone', $this->input->get('phone'));

        if ($this->input->get('mobile'))
            $this->General_model->like('mobile', $this->input->get('mobile'));

        if ($this->input->get('id_no'))
            $this->General_model->like('id_no', $this->input->get('id_no'));

        if ($this->input->get('passport_no'))
            $this->General_model->like('passport_no', $this->input->get('passport_no'));

        if ($this->input->get('ip'))
            $this->General_model->like('ip', $this->input->get('ip'));

        if ($this->input->get('status'))
            $this->General_model->where('status', $this->input->get('status'));
    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['branches'] = dd2menu('branches', ['branch_id' => 'name']);
        $this->data['usergroups'] = dd2menu('usergroups', ['usergroup_id' => 'name']);
        $this->data['user_status'] = dd2menu('user_status', ['user_status_id' => name()]);
        $this->data['languages'] = ddlanguages();

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '0';

        $this->form_validation->set_rules('branch_id', lang('users_branch_id'), "trim|required");
        $this->form_validation->set_rules('usergroup_id', lang('users_usergroup_id'), "trim|required");
        $this->form_validation->set_rules('language', lang('users_language'), "trim|required");
        $this->form_validation->set_rules('username', lang('users_username'), "trim|required");
        $this->form_validation->set_rules('full_name', lang('users_full_name'), "trim|required");
        $this->form_validation->set_rules('email', lang('users_email'), "trim|required|valid_email");
        $this->form_validation->set_rules('phone', lang('users_phone'), "trim|numeric");
        $this->form_validation->set_rules('mobile', lang('users_mobile'), "trim|required|numeric");
        $this->form_validation->set_rules('password', lang('users_password'), "trim" . $op == 'add'? '|required' : null);
        $this->form_validation->set_rules('address', lang('users_address'), "trim");
        $this->form_validation->set_rules('notes', lang('users_notes'), "trim");
        $this->form_validation->set_rules('salary', lang('users_salary'), "trim|numeric");
        $this->form_validation->set_rules('commision', lang('users_commision'), "trim|required");
        $this->form_validation->set_rules('id_no', lang('users_id_no'), "trim|required");
        $this->form_validation->set_rules('id_expiredate', lang('users_id_expiredate'), "trim|required");
        $this->form_validation->set_rules('passport_no', lang('users_passport_no'), "trim|required");
        $this->form_validation->set_rules('passport_expiredate', lang('users_passport_expiredate'), "trim|required");
        $this->form_validation->set_rules('status', lang('users_status'), "trim|required");
        $this->form_validation->set_rules('image', lang('users_image'), "callback_file[image," . $required . "]");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'branch_id' => $this->input->post('branch_id'),
            'usergroup_id' => $this->input->post('usergroup_id'),
            'language' => $this->input->post('language'),
            'username' => $this->input->post('username'),
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'mobile' => $this->input->post('mobile'),
            'address' => $this->input->post('address'),
            'notes' => $this->input->post('notes'),
            'salary' => $this->input->post('salary'),
            'commision' => $this->input->post('commision'),
            'id_no' => $this->input->post('id_no'),
            'id_expiredate' => $this->input->post('id_expiredate'),
            'passport_no' => $this->input->post('passport_no'),
            'passport_expiredate' => $this->input->post('passport_expiredate'),
            'status' => $this->input->post('status'),
//            'ban_time' => $this->input->post('ban_time'),
//            'image' => $this->input->post('image'),
        ];
        if ($this->input->post('password'))
            $vars['password'] = md5($this->input->post('password'));
        if ($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
