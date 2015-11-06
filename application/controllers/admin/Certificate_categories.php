<?php

class Certificate_categories extends Brightery_Controller {

    public $layout = 'full';
    public $module = 'certificate_categories';
    public $model = 'Certificate_categories_model';

    public function __construct() {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index() {
//       $this->{$this->model}->custom_select = 'certificate_categories.*, categories.name ';
//        $this->{$this->model}->joins = array(
//            'categories' => array('certificate_categories.category_id = categories.category_id', 'inner')
//
//        );
        $this->load->library('pagination');
        $this->Categories_model->order_by['categories.name'] = 'ASC';
        $config['total_rows'] = $this->Categories_model->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/certificate_categories/index');
        $config['per_page'] = config('pagination_limit');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        if ($this->uri->segment(4))
            $this->Categories_model->offset = $this->uri->segment(4);

        $data['total'] = $config['total_rows'];
        $this->Categories_model->limit = config('pagination_limit');
        $data['items'] = $this->Categories_model->get();
        $this->load->view($this->module . '/index', $data);
    }

    public function manage($id = null) {

        $data = array();
        $data['selected_certificates'] = array();
        $this->load->model('certificates_model');
        if ($id) {
            $this->Categories_model->category_id = $id;
            $data['item'] = $this->Categories_model->get();

            foreach ($this->db->where('category_id', $id)->get('certificate_categories')->result() as $st)
                $data['selected_certificates'][] = $st->certificate_id;

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
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[categories.name]');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        $this->form_validation->set_rules('certificates[]', 'Certificates', "trim|required");
        $data['certificates'] = dd2menu('certificates', array('certificate_id' => 'name'), FALSE, TRUE, array('certificates.name' => 'ASC'));

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->Categories_model->name = $this->input->post('name');
            $id = $this->Categories_model->save();

            $this->db->where('category_id', $id)->delete('certificate_categories');
            $this->Certificate_categories_model->category_id = $id;
            foreach ($this->input->post('certificates') as $certificate) {
                $this->Certificate_categories_model->certificate_id = $certificate;
                $this->Certificate_categories_model->save();
            }

            redirect('admin/' . $this->module);
        }
    }

    public function delete($id = null) {
        $this->permission($this->module . '_delete');
        if (!$id)
            show_404();
        $this->Categories_model->category_id = $id;
        $data['item'] = $this->Categories_model->get();
        if (!$data['item'])
            show_404();
        $this->Categories_model->delete();
        redirect('admin/' . $this->module);
    }

}
