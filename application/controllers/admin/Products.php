<?php

class Products extends Crud
{
    public $_table = 'products';
    public $_primary_key = 'product_id';
    public $_index_fields = [
        'name',
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
        $this->data['invoice_types'] = dd2menu('invoice_types', ['invoice_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = ($op == 'add') ? '1' : '1';

        $this->form_validation->set_rules('product_id', lang('products_product_id'), "trim|required");
$this->form_validation->set_rules('barcode', lang('products_barcode'), "trim|required");
$this->form_validation->set_rules('name_ar', lang('products_name_ar'), "trim|required");
$this->form_validation->set_rules('name_en', lang('products_name_en'), "trim|required");
$this->form_validation->set_rules('category_id', lang('products_category_id'), "trim|required");
$this->form_validation->set_rules('mark_id', lang('products_mark_id'), "trim|required");
$this->form_validation->set_rules('commission', lang('products_commission'), "trim|required");
$this->form_validation->set_rules('cost', lang('products_cost'), "trim|required");
$this->form_validation->set_rules('profit', lang('products_profit'), "trim|required");
$this->form_validation->set_rules('discount', lang('products_discount'), "trim|required");
$this->form_validation->set_rules('featured', lang('products_featured'), "trim|required");
$this->form_validation->set_rules('image', lang('products_image'), "trim|required");
$this->form_validation->set_rules('amount', lang('products_amount'), "trim|required");
$this->form_validation->set_rules('desc_en', lang('products_desc_en'), "trim|required");
$this->form_validation->set_rules('desc_ar', lang('products_desc_ar'), "trim|required");
$this->form_validation->set_rules('points', lang('products_points'), "trim|required");
$this->form_validation->set_rules('timestamp', lang('products_timestamp'), "trim|required");
$this->form_validation->set_rules('stock_3', lang('products_stock_3'), "trim|required");
$this->form_validation->set_rules('stock_2', lang('products_stock_2'), "trim|required");

        $this->form_validation->set_rules('logo', lang('branches_logo'), "callback_file[logo," . $required ."]");

    }
    protected function onSuccessEvent($op, $id = false)
    {
        $vars = [
            'product_id' => $this->input->post('product_id'),
'barcode' => $this->input->post('barcode'),
'name_ar' => $this->input->post('name_ar'),
'name_en' => $this->input->post('name_en'),
'category_id' => $this->input->post('category_id'),
'mark_id' => $this->input->post('mark_id'),
'commission' => $this->input->post('commission'),
'cost' => $this->input->post('cost'),
'profit' => $this->input->post('profit'),
'discount' => $this->input->post('discount'),
'featured' => $this->input->post('featured'),
'image' => $this->input->post('image'),
'amount' => $this->input->post('amount'),
'desc_en' => $this->input->post('desc_en'),
'desc_ar' => $this->input->post('desc_ar'),
'points' => $this->input->post('points'),
'timestamp' => $this->input->post('timestamp'),
'stock_3' => $this->input->post('stock_3'),
'stock_2' => $this->input->post('stock_2'),

        ];
        if($op == 'add')
            $vars['created_at'] = now();

        foreach ($vars as $vark => $varv)
            $this->{$this->model}->{$vark} = $varv;
        $this->{$this->model}->save();

    }
}
