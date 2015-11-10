<?php define('EXT', '.php');
/**
 * The master controller, it prepare the languages and global configurations
 *
 * @author  Muhammad El-Saeed <muhammad@el-saeed.info>
 * @version 1.0
 * @link    http://www.brightery.com
 */
class Brightery_Controller extends CI_Controller
{
    public $language_id;
    protected $module;
    protected $action;
    protected $hash;

    public function __construct()
    {
        parent::__construct();

        $this->load->spark('twiggy/0.8.5');
        $this->lang->load('admin');
//        if( ! $this->module)
//            $this->module = get_class($this);
//        $this->lang = $this->input->get('lang');
//        $this->load->library('configuration');
//        $this->load->helper('error');
//        $this->load->library('language');
//        $this->load->library('style');
//        $this->load->library('license');
//        $this->license->check_license();
//        $this->language_id = $this->language->languageId;Now, New link/Button “Add Certificate”


//        $this->checkModuleStatus();
    }
    public function file($var, $params)
    {
        @list($var, $required) = explode(',', $params);
        if ($this->upload->do_upload($var)) {
            $data = $this->upload->data();
            if ($data['file_name'])
                $this->{$this->model}->{$var} = $data['file_name'];
            return true;
        } else {
            if ($required) {
                $this->form_validation->set_message('file', strip_tags($this->upload->display_errors()));
                return false;
            }
            else
                return true;
        }

    }

    protected function permission($permission = null)
    {
        return ;
        if (!session('user_id'))
            redirect('admin/login');
        if (!$permission)
            return;

        $user = $this->db->where('user_id', session('user_id'))->get('users')->row();
        $selected_permission = array();
        if ($user->permissions)
            $selected_permission = array_keys(unserialize($user->permissions));
        if (!in_array($permission, $selected_permission))
            die( "<script>
                    alert('Permission Denied');
                    window.history.go(-1);
                </script>");
//            show_error("Permission Denied");
    }
}

class Crud extends Brightery_Controller
{
    public $_table;
    public $_index_fields = [];
    public $_primary_key;
    public $model = 'General_model';
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
        $this->{$this->model}->_table = $this->_table;
        $this->{$this->model}->_primary_key = $this->_primary_key;
    }

    public function index($offset = 0) {
        $this->indexFixes();

        $this->{$this->model}->limit = config('pagination_limit');
        $this->{$this->model}->offset = $offset;

        $config['total_rows'] = $this->{$this->model}->get(TRUE);
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['base_url'] = site_url(ADMIN. '/'. $this->_table .'/index');
        $config['per_page'] = config('pagination_limit');

        $this->load->library('pagination', $config);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total'] = $config['total_rows'];

        $this->data['items'] = $this->{$this->model}->get();
        $this->twiggy->set($this->data)
                     ->template('global_index')
                     ->display();

//        $this->load->view($this->_table . '/index', $data);
    }

    public function manage($id = null) {
        $this->data = [];

        if ($id) {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $this->data['item'] = $this->{$this->model}->get();
            if (!$this->data['item'])
                show_404();
            $op = 'edit';
        } else {
            $this->data['item'] = new Std();
            $op = 'add';
        }

        $this->permission($this->_table . '_'. $op);

        $this->load->library("form_validation");
        $this->onValidationEvent($op, $id);
        if ($this->form_validation->run() == FALSE)
            $this->twiggy->set($this->data)
                ->template($this->_table)
                ->display();
        else {
            $this->onSuccessEvent($op, $id);
            redirect(ADMIN . '/' . $this->_table);
        }
    }

    public function delete($id = null) {
        $this->permission($this->_table . '_delete');
        if (!$id)
            show_404();

        $this->{$this->model}->{$this->_primary_key} = $id;
        $this->data['item'] = $this->{$this->model}->get();

        if (!$this->data['item'])
            show_404();

        $this->{$this->model}->delete();
        redirect(ADMIN . '/' . $this->_table);
    }



    protected function indexFixes(){}
    protected function onValidationEvent($op, $id = false) {}
    protected function onSuccessEvent($op, $id = false) {}
}