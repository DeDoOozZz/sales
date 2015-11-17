<?php

class Orders extends Brightery_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = ['clients' => dd2menu('clients', ['client_id'=>'name'], false, ['' => lang('orders_select_client')])];
        $this->twiggy->set($data)->template('orders')->display();
    }

    public function barcode_process($barcode) {

        if( ! $barcode)
            die(json_encode(['error' => lang('orders_invalid_barcode')]));
        $product = $this->db->where('barcode', $barcode)->get('products')->row();

        if( ! $product)
            die( json_encode(['error' => lang('orders_invalid_barcode')]));

        echo json_encode([
            'product' => $product->{name()},
            'barcode' => $product->barcode,
            'price' => $product->price,
            'discount' => $product->discount,
        ]);
    }

}
