<?php

class Invoices extends Brightery_Controller
{
    public $_table = 'invoices';
    public $_primary_key = 'invoice_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function popup($invoice_id = false, $type = 'small')
    {
        if (!$invoice_id)
            show_404();

        $data['item'] = $this->db->select("invoices.*, users.full_name as user, clients.name as client, branches.name as branch, invoice_status." . name() . ' as status')
            ->where('invoices.invoice_id', $invoice_id)
            ->join('users', 'users.user_id = invoices.user_id', 'left')
            ->join('clients', 'clients.client_id = invoices.client_id', 'left')
            ->join('branches', 'branches.branch_id = invoices.branch_id', 'left')
            ->join('invoice_status', 'invoice_status.invoice_status_id = invoices.invoice_status_id', 'left')
            ->get('invoices')
            ->row();

        $data['order'] = $this->db->select('order_products.*, products.' . name() . ' as product')
            ->where('orders.invoice_id', $invoice_id)
            ->join('order_products', 'order_products.order_id = orders.order_id')
            ->join('products', 'products.product_id = order_products.product_id')
            ->get('orders')
            ->result();

        $data['device'] = $this->db->select('device_orders.*, devices.' . name() . ' as name, devices.price, devices.discount')
            ->where('invoice_id', $invoice_id)
            ->join('devices', 'devices.device_id = device_orders.device_id')
            ->get('device_orders')
            ->row();

        $data['service'] = $this->db->select('service_orders.*, services.desc as name, services.price, services.discount')
            ->where('invoice_id', $invoice_id)
            ->join('services', 'services.service_id = service_orders.service_id')
            ->get('service_orders')
            ->row();

        $data['maintenance'] = $this->db->select('*')
            ->where('invoice_id', $invoice_id)
            ->get('format_orders')
            ->row();

        $data['prepaid_card'] = $this->db->select('*')
            ->where('invoice_id', $invoice_id)
            ->join('prepaid_cards', 'prepaid_cards.prepaid_card_order_id = prepaid_card_orders.prepaid_card_order_id')
            ->get('prepaid_card_orders')
            ->result();

        $types = [
            'small' => 'invoices_small',
            'a4' => 'invoices_a4',
            'matrix' => 'invoices_matrix',
        ];

        $this->twiggy->set($data)->template($types[$type])->display();
    }
}
