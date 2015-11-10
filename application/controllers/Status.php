<?php

class Status extends Brightery_Controller {

    public $layout = 'full';
    public $module = 'status';
    public $model = 'Status_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index() {

        $this->load->library('pagination');
        $this->{$this->model}->order_by['status.name'] = 'ASC';
        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/status/index');
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
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[status.name]');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->{$this->model}->name = $this->input->post('name');

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

}
