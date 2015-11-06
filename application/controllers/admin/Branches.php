<?php

class Branches extends Brightery_Controller {

    public $layout = 'full';
    public $module = 'companies';
    public $model = 'Branches_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index($id = null) {
        $this->{$this->model}->custom_select = 'branches.*, companies.company_id, countries.name';
        $this->{$this->model}->joins = array(
            'companies' => array('companies.company_id = branches.company_id', 'inner'),
            'countries' => array('countries.country_id = branches.country_id', 'inner')
        );
        if ($id) {
            $this->{$this->model}->{'companies.company_id'} = $id;
        }
        $this->{$this->model}->order_by['branches.branch_name'] = 'ASC';
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module . '/branches', $data);
    }

    public function manage($id = null) {
        $data = array();
        if (!$id) {
            show_404();
        }

        if (strpos($id, 'c_') !== false) {
            $company_id = str_replace('c_', '', $id);
            $this->{$this->model}->company_id = $company_id;
            $data['item'] = new Std();
            $this->permission($this->module . '_add');
            $op = 'add';
        } else {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();
            if (!$data['item'])
                show_404();
            $company_id = $data['item']->company_id;
            $this->permission($this->module . '_edit');
            $op = 'edit';
        }

        $this->load->library("form_validation");
        if ($op == 'add') {
            $this->form_validation->set_rules('branch_name', 'branch Name', 'trim|required|is_unique[branches.branch_name]');
        } else {
            $this->form_validation->set_rules('branch_name', 'branch Name', 'trim|required');
        }
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('state', 'State', "trim");
        $this->form_validation->set_rules('phone', 'Phone', "trim");
        $this->form_validation->set_rules('fax', 'Fax', "trim");
        $this->form_validation->set_rules('email', 'Email', "trim|valid_email");
        $this->form_validation->set_rules('address', 'Address', "trim");
        $this->form_validation->set_rules('note', 'Note', "trim");
        $this->form_validation->set_rules('person_in_charge', 'Person in Charge', "trim");
        $this->form_validation->set_rules('person_in_charge_phone', 'Person in charge Phone', "trim");
        $this->form_validation->set_rules('person_in_charge_email', 'Person in Charge email ', "trim");

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage_branches', $data);

        else {
            $this->{$this->model}->branch_name = $this->input->post('branch_name');
            $this->{$this->model}->country_id = $this->input->post('country_id');
            $this->{$this->model}->city = $this->input->post('city');
            $this->{$this->model}->state = $this->input->post('state');
            $this->{$this->model}->phone = $this->input->post('phone');
            $this->{$this->model}->fax = $this->input->post('fax');
            $this->{$this->model}->email = $this->input->post('email');
            $this->{$this->model}->address = $this->input->post('address');
            $this->{$this->model}->note = $this->input->post('note');
            $this->{$this->model}->person_in_charge = $this->input->post('person_in_charge');
            $this->{$this->model}->person_in_charge_phone = $this->input->post('person_in_charge_phone');
            $this->{$this->model}->person_in_charge_email = $this->input->post('person_in_charge_email');

            $this->{$this->model}->save();
            redirect('admin/branches/index/' . $company_id);
        }
    }

    public function delete($id = null) {
        $this->permission($this->module . '_delete');
        if (!$id)
            show_404();
        $this->{$this->model}->{$this->_primary_key} = $id;
        $data['item'] = $this->{$this->model}->get();
        if (!$data['item'])
            show_404();

        $this->{$this->model}->delete();
        $company_id = $data['item']->company_id;
        redirect('admin/branches/index/' . $company_id);
    }

    public function image($var, $id) {
        $config['upload_path'] = './cdn/companies_logo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $data = $this->upload->data();
            if ($data['file_name'])
                $this->{$this->model}->logo = base_url() . '/cdn/companies_logo/' . $data['file_name'];
        }
        return true;
    }

}
