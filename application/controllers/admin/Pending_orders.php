<?php

class Pending_orders extends Brightery_Controller
{
    public $_table = 'pending_orders';
    public $_primary_key = 'pending_order_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $menu = [];
//        $menu[] = ['id'=>'', 'name' => lang('global_select_from_menu')];
        $orders = $this->db->where('user_id', $this->user->user_id)
            ->get('pending_orders')
            ->result();
        foreach ($orders as $order)
            $menu[] = [
                'id' => $order->pending_order_id,
                'name' => $order->name
            ];
        echo json_encode(['orders' => $menu]);
    }

    public function load_order_details($order_id)
    {
        if (!$order_id)
            show_404();
        $products = [];
        $orders_products = $this->db->where('pending_order_id', $order_id)
            ->join('products', 'products.product_id = pending_order_products.product_id')
            ->get('pending_order_products')
            ->result();
        foreach ($orders_products as $product)
            $products[] = [
                'product_id' => $product->product_id,
                'product' => $product->{name()},
                'barcode' => $product->barcode,
                'original_price' => $product->price,
                'unit_price' => $product->price - $product->discount,
                'discount' => $product->discount,
            ];
        echo json_encode(['products' => $products]);
    }

    public function save()
    {
        $this->load->model('General_model');
        $this->General_model->_table = $this->_table;
        $this->General_model->_primary_key = $this->_primary_key;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pending_order_name', lang('pending_orders_name'), "trim|required");
        $this->form_validation->set_rules('client_id', lang('pending_orders_client_id'), "trim");
        if ($this->form_validation->run()) {
            $vars = [
                'name' => $this->input->post('pending_order_name'),
                'user_id' => $this->user->user_id,
                'client_id' => $this->input->post('client_id'),
                'branch_id' => $this->user->branch_id,
            ];
            $vars['created_at'] = now();

            foreach ($vars as $vark => $varv)
                $this->General_model->{$vark} = $varv;
            $id = $this->General_model->save();

            foreach ($this->input->post('qty') as $k => $v) {
                $this->db->insert('pending_order_products', [
                    'pending_order_id' => $id,
                    'product_id' => $this->input->post('product_id')[$k],
                    'qty' => $v
                ]);
            }
            echo json_encode(['success' => 'true']);
        } else {
            echo json_encode(['errors' => validation_errors()]);
        }
    }
}
