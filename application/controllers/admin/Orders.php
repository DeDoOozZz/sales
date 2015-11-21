<?php

class Orders extends Brightery_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = ['clients' => dd2menu('clients', ['client_id' => 'name'], false, ['' => lang('orders_select_client')])];
        $this->twiggy->set($data)->template('orders')->display();
    }

    public function barcode_process($barcode)
    {
        if (!$barcode)
            die(json_encode(['error' => lang('orders_invalid_barcode')]));
        $product = $this->db->where('barcode', $barcode)->get('products')->row();

        if (!$product)
            die(json_encode(['error' => lang('orders_invalid_barcode')]));

        echo json_encode([
            'product_id' => $product->product_id,
            'product' => $product->{name()},
            'barcode' => $product->barcode,
            'original_price' => $product->price,
            'unit_price' => $product->price - $product->discount,
            'discount' => $product->discount,
        ]);
    }

    public function get_clients()
    {
        echo json_encode(['clients' => dd2menu('clients', ['client_id' => 'name'], false, ['' => lang('orders_select_client')])]);
    }

    public function order()
    {
        $this->load->library('Order');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('client_id', lang('pending_orders_client_id'), "trim|required");
        $this->form_validation->set_rules('payment', null, "callback_check_payment");
        if ($this->form_validation->run()) {

            foreach ($this->input->post('product_id') as $k => $v)
                $products[$v] = $this->input->post('qty')[$k];

            $availability = $this->order->checkProductAvailability($products);
            if( ! $availability['result'])
                die(json_encode($availability));

            $order = [
                'branch_id' => $this->user->branch_id,
                'user_id' => $this->user->user_id,
                'client_id' => $this->input->post('client_id'),
                'paid' => $this->input->post('paid'),
                'created_at' => now()
            ];

            $transactions = [
                'accepted' => $this->input->post('accepted_transactions'),
                'refused' => $this->input->post('refused_transactions'),
            ];

            $this->order->placeOrder($order, $products, $transactions);

            die(json_encode(['invoice_id' => $this->order->invoice_id]));
        }
        else
        {
            echo json_encode(['errors' => validation_errors()]);
        }
    }

    public function check_availability() {
        $this->load->library('Order');
        $qty = $this->input->get('qty');
        $product_id = $this->input->get('product_id');
        $availability = $this->order->checkProductAvailability([$product_id=>$qty]);
        if( ! $availability['result'])
            die(json_encode($availability));
    }

    public function check_payment() {
        $this->form_validation->set_message('check_payment', lang("orders_there_is_no_products"));

        if( ! $this->input->post('product_id'))
            return false;
        foreach ($this->input->post('product_id') as $k => $v)
            $products[$v] = $this->input->post('qty')[$k];

        $this->form_validation->set_message('check_payment', lang('orders_check_payment'));

        $total = $this->order->getOrderTotal($products);
        if($this->input->post('accepted_transactions') && $this->input->post('accepted_transactions')[0])
            return true;

        if($this->input->post('paid') >= $total['due'])
            return true;
        return false;
    }

}
