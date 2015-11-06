<?php

class Companies extends Brightery_Controller {

    public $layout = 'full';
    public $module = 'companies';
    public $model = 'Companies_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index() {

        $this->{$this->model}->custom_select = 'companies.*, business_types.name';
        $this->{$this->model}->joins = array(
            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
        );
        $this->load->library('pagination');
        $this->{$this->model}->order_by['companies.business_name'] = 'ASC';
        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/companies/index');
        $config['per_page'] = config('pagination_limit');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        if ($this->uri->segment(4))
            $this->{$this->model}->offset = $this->uri->segment(4);

        $data['total'] = $config['total_rows'];
        $this->{$this->model}->limit = config('pagination_limit');
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module . '/index', $data);
    }

    public function manage($id = null) {
        $data = array();

        if ($id) {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();
            if (!$data['item'])
                show_404();
            $this->permission($this->module . '_edit');
            $op = 'edit';
        } else {
            $data['item'] = new Std();
            $this->permission($this->module . '_add');
            $op = 'add';
        }

        $this->load->library("form_validation");
        if ($op == 'add') {
            $this->form_validation->set_rules('business_name', 'Business Name', 'trim|required|is_unique[companies.business_name]');
        } else {
            $this->form_validation->set_rules('business_name', 'Business Name', 'trim|required');
        }
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


        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
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
            redirect('admin/' . $this->module);
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
        redirect('admin/' . $this->module);
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
