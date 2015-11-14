<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_settings extends Brightery_Controller
{
    public $layout = 'full';
    public $module = "settings";
    public $image_file = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
        $this->General_model->_table = 'settings';
        $this->General_model->_primary_key = 'key';
        $this->output->enable_profiler(FALSE);
//        $this->permission();
    }

    public function index()
    {
        $this->load->library("form_validation");
        $data['languages'] = ddlanguages();
        $data['item'] = new stdClass();
        foreach ($this->General_model->get() as $setting) {
//            if ($setting->key == 'random_cats')
//                $data['item']->{$setting->key} = unserialize($setting->value);
//            else
                $data['item']->{$setting->key} = $setting->value;
            $this->form_validation->set_rules('setting[' . $setting->key . ']', $setting->key, "trim");
        }
        if ($this->form_validation->run() == false) {
//foreach($data['item'] as $item) {
//    echo '$lang[\'general_settings_'.$item.'\'] = \''.ucfirst($item).'\';'."\n";
//    echo '<div class="form-group">
//                                <label class="col-sm-3 control-label">{{ lang(\'settings_'.$item.'\') }}</label>
//
//                                <div class="col-sm-9">
//                                    {{ form_input(\'setting['.$item.']\', set_value(\'setting['.$item.']\', item.'.$item.'), \'class="bg-focus form-control" data-required="true" id="'.$item.'"\') }}
//                                </div>
//                            </div>
//                            <div class="form-group-separator"></div>';
//}
            $this->twiggy->set($data)->template("general_settings")->display();
        } else {
//            $this->image();
            $save = $this->input->post('setting');

//            if ($lcn = $this->input->post('lcn')) {
//                $lcn['random_cats'] = serialize($lcn['random_cats']);
////                if ($this->image_file)
////                    $lcn['lcn_image'] = $this->image_file;
//
//            }
//
//            $save = array_merge($save, $lcn);
//
            foreach ($save as $key => $value) {
                $this->General_model->key = $key;
                $this->General_model->value = $value;
                $this->General_model->save();
            }
//            $this->report->set('{report_update_settings}');
            redirect(ADMIN. "/general_settings/index");
        }
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