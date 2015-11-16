<?php

class Reports extends Crud
{
    public $_table = 'reports';
    public $_primary_key = 'report_id';
    public $_index_fields = [
        'full_name',
        'mission',
        'branch',
        'ip',
        'created_at',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = 'reports.*, users.full_name, branches.name as branch';
        $this->{$this->model}->joins = array(
            'users' => array('users.user_id = reports.user_id', 'inner'),
            'branches' => array('branches.branch_id = reports.branch_id', 'inner')
        );
        $this->{$this->model}->order_by['created_at'] = 'DESC';

    }

    public function manage($id = null) {
        return;
    }
    public function delete($id = null) {
        return;
    }
}
