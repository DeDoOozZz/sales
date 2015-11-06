<?php

class Certificates extends Brightery_Controller {

    public $layout = 'full';
    public $module = 'certificates';
    public $model = 'Certificates_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index() {
        $this->load->library('pagination');
        $this->{$this->model}->order_by['certificates.name'] = 'ASC';
        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/certificates/index');
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

            $data['selected_crops'] = dd2menu('certificate_crops', array('certificate_crop_id' => 'crop_id'), array('certificate_id' => $id), TRUE);

            $this->permission($this->module . '_edit');
            $op = 'edit';
        } else {
            $data['selected_crops'] = array();
            $data['item'] = new Std();
            $this->permission($this->module . '_add');
            $op = 'add';
        }

        $data['crops'] = dd2menu('crops', array('crop_id' => 'name'), FALSE, TRUE, array('crops.name' => 'ASC'));

        $this->load->library("form_validation");
        if ($op == 'add') {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[certificates.name]');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        $this->form_validation->set_rules('short_code', 'Short Code', 'trim|required|alpha_dash');
        $this->form_validation->set_rules("description", 'Description', "trim");
        $this->form_validation->set_rules("note", 'Note', "trim");

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->{$this->model}->name = $this->input->post('name');
            $this->{$this->model}->short_code = $this->input->post('short_code');
            $this->{$this->model}->note = $this->input->post('note');
            $this->{$this->model}->description = $this->input->post('description');

            $cid = $this->{$this->model}->save();

            $this->db->where('certificate_id', $cid)->delete('certificate_crops');
            foreach ($this->input->post('crops') as $crop) {
                $this->db->insert('certificate_crops', array(
                    'certificate_id' => $cid,
                    'crop_id' => $crop
                ));
            }

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
