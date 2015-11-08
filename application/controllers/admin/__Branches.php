<?php

class Branches extends Crud
{
    public $_table = 'branches';
    public $_primary_key = 'branch_id';
    public $layout = 'full';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];

    }

    public function indexFixes() {
        $this->{$this->model}->custom_select = 'companies.*, business_types.name';
        $this->{$this->model}->joins = array(
            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
        );
        $this->{$this->model}->order_by['companies.business_name'] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false) {
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('business_type_id', 'Bussiness Type', 'trim|required');
        $this->form_validation->set_rules('logo', 'Logo', "trim|callback_image[$id]");
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('state', 'State', "trim");
        $this->form_validation->set_rules('phone', 'Phone', "trim");
        $this->form_validation->set_rules('email', 'Email', "trim|valid_email");
        $this->form_validation->set_rules('address', 'Address', "trim");
        $this->form_validation->set_rules('note', 'Note', "trim");
        $this->form_validation->set_rules('person_in_charge', 'Person in Charge', "trim");
        $this->form_validation->set_rules('person_in_charge_phone', 'Person in charge Phone', "trim");
        $this->form_validation->set_rules('person_in_charge_email', 'Person in Charge email ', "trim");
    }

    protected function onSuccessEvent($op, $id = false) {
        $this->{$this->model}->business_name = $this->input->post('business_name');
        $this->{$this->model}->website = $this->input->post('website');
        $this->{$this->model}->business_type_id = $this->input->post('business_type_id');
        $this->{$this->model}->city = $this->input->post('city');
        $this->{$this->model}->state = $this->input->post('state');
        $this->{$this->model}->phone = $this->input->post('phone');
        $this->{$this->model}->email = $this->input->post('email');
        $this->{$this->model}->address = $this->input->post('address');
        $this->{$this->model}->note = $this->input->post('note');
        $this->{$this->model}->person_in_charge = $this->input->post('person_in_charge');
        $this->{$this->model}->person_in_charge_phone = $this->input->post('person_in_charge_phone');
        $this->{$this->model}->person_in_charge_email = $this->input->post('person_in_charge_email');
        $this->{$this->model}->save();

    }
}
