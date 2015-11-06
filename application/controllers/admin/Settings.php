<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public $layout = 'full';
    public $module = "settings";
    public $image_file = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $this->lang->load('settings');
        $this->output->enable_profiler(FALSE);
//        $this->permission();
    }

    public function index()
    {
        $this->load->library("form_validation");

        $data['item'] = new stdClass();
        foreach ($this->settings_model->get() as $setting) {
            if ($setting->key == 'random_cats')
                $data['item']->{$setting->key} = unserialize($setting->value);
            else
                $data['item']->{$setting->key} = $setting->value;
            $this->form_validation->set_rules('setting[' . $setting->key . ']', $setting->key, "trim");
        }
        if ($this->form_validation->run() == false) {
            $this->load->view("settings/manage", $data);
        } else {
//            $this->image();
            $save = $this->input->post('setting');
            if ($lcn = $this->input->post('lcn')) {
                $lcn['random_cats'] = serialize($lcn['random_cats']);
//                if ($this->image_file)
//                    $lcn['lcn_image'] = $this->image_file;

            }

            $save = array_merge($save, $lcn);

            foreach ($save as $key => $value) {
                $this->settings_model->key = $key;
                $this->settings_model->value = $value;
                $this->settings_model->save();
            }
//            $this->report->set('{report_update_settings}');
            redirect("admin/settings/index");
        }
    }

    function remove_image()
    {
        $this->layout = 'ajax';
        $this->settings_model->key = 'lcn_image';
        $this->settings_model->value = NULL;
        $this->settings_model->save();
    }


    public function image()
    {
        $config['upload_path'] = './cdn/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $data = $this->upload->data();
            if ($data['file_name'])
                $this->image_file = $data['file_name'];
        }
    }

}

/* End of file settings.php */
/* Location: ./application/controllers/admin/settings.php */