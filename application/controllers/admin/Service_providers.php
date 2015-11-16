<?php

class Service_providers extends Crud
{
    public $_table = 'service_providers';
    public $_primary_key = 'service_provider_id';

    public function __construct()
    {
        parent::__construct();
        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
        $this->{$this->model}->order_by[name()] = 'ASC';

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['countries'] = dd2menu('countries', ['country_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '0';

        $this->form_validation->set_rules('name_ar', lang('service_providers_name_ar'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('service_providers_name_en'), "trim|required");
        $this->form_validation->set_rules('logo', lang('service_providers_logo'), "callback_file[logo," . $required . "]");
        $this->form_validation->set_rules('country_id', lang('service_providers_country_id'), "trim|required");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'service_provider_id' => $this->input->post('service_provider_id'),
            'name_ar' => $this->input->post('name_ar'),
            'name_en' => $this->input->post('name_en'),
            'country_id' => $this->input->post('country_id'),
        ];

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
