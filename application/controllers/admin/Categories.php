<?php

class Categories extends Crud
{
    public $_table = 'categories';
    public $_primary_key = 'category_id';
    public $_index_fields = [
//        'name',
    ];

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
        $this->data['categories'] = dd2menu('categories', ['category_id' => name()], ['parent_id' => '0']);

        $this->form_validation->set_rules('parent_id', lang('categories_parent_id'), "trim|required");
        $this->form_validation->set_rules('name_en', lang('categories_name_en'), "trim|required");
        $this->form_validation->set_rules('name_ar', lang('categories_name_ar'), "trim|required");
        $this->form_validation->set_rules('desc_en', lang('categories_desc_en'), "trim|required");
        $this->form_validation->set_rules('desc_ar', lang('categories_desc_ar'), "trim|required");
        $this->form_validation->set_rules('display_order', lang('categories_display_order'), "trim|required");
        $this->form_validation->set_rules('status', lang('categories_status'), "trim|required");

    }

    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'parent_id' => $this->input->post('parent_id'),
            'name_en' => $this->input->post('name_en'),
            'name_ar' => $this->input->post('name_ar'),
            'desc_en' => $this->input->post('desc_en'),
            'desc_ar' => $this->input->post('desc_ar'),
            'display_order' => $this->input->post('display_order'),
            'status' => $this->input->post('status'),
        ];
        if ($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
