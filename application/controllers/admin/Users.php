<?php if (!defined('BASEPATH')) die('No direct script access allowed');

class Users extends Brightery_Controller
{
    public $layout = 'full';
    public $module = 'users';
    public $model = 'users_model';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission($this->module . '_index');
    }

    public function index()
    {
        $this->load->library('pagination');
        $this->{$this->model}->order_by['users.name'] = 'ASC';
        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url('admin/users/index');
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

    public function manage($id = NULL)
    {
        $data = array();
        $data['permissions'] = array(
            'users' => 'Users',
            'service_providers' => 'Service Providers',
            'options' => 'Options',
            'users' => 'Users',
            'grades' => 'Grades',
            'files' => 'Files',
            'consultants' => 'Consultants',
            'companies' => 'Companies',
            'certificates' => 'Certificates',
            'certificate_categories' => 'Categories',
            'business_types' => 'Business Types',
            'branches' => "Branches",
            'crops' => "Crops",
            'status' => "Status",
        );
        $data['oprations'] = array(
            'index' => 'Read',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        );
        $data['selected_permission'] = array();

        if ($id) {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();
            if (!$data['item'])
                show_404();

            if ($data['item']->permissions)
                $data['selected_permission'] = array_keys(unserialize($data['item']->permissions));
            $this->permission($this->module . '_edit');
            $op = 'edit';
        } else {
            $data['item'] = new Std();
            $this->permission($this->module . '_add');
            $op = 'add';
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        if ($op == 'add') {
            $this->form_validation->set_rules("email", 'Email', "trim|required|is_unique[users.email]");
        } else {
            $this->form_validation->set_rules("email", 'Email', "trim|required");
        }
        if ($id)
            $this->form_validation->set_rules('password', 'Password', 'trim');
        else
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules("phone", 'Phone', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->users_model->name = $this->input->post('name');
            $this->users_model->username = $this->input->post('username');
            $this->users_model->phone = $this->input->post('phone');
            $this->users_model->email = $this->input->post('email');
            $this->users_model->alert = $this->input->post('alert') == 1 ? 1 : 0;
            $this->users_model->permissions = serialize($this->input->post('permission'));

            if (strlen($this->input->post('password')) > 0)
                $this->{$this->model}->password = md5($this->input->post('password'));

            $this->{$this->model}->save();
            redirect('admin/' . $this->module);
        }
    }

    public function delete($id = null)
    {
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

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */