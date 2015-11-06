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
//    public $lang;
//    public $language;
    public $language_id;
    protected $module;
    protected $action;
    protected $hash;

    public function __construct()
    {
        parent::__construct();

        $this->load->spark('twiggy/0.8.5');

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

    protected function permission($permission = null)
    {
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
