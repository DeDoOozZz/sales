<?php

class Invoices extends Brightery_Controller
{
    public $_table = 'invoices';
    public $_primary_key = 'invoice_id';
    public $model = 'General_model';
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
        $this->{$this->model}->_table = $this->_table;
        $this->{$this->model}->_primary_key = $this->_primary_key;
    }

    public function index()
    {
        $this->permission($this->_table, 'index');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', lang('invoices_code'), 'trim|required|callback_check');
        if ($this->form_validation->run() == false) {
            $this->twiggy->set($this->data)
                ->template("invoices_index")
                ->display();
        } else {
            redirect(ADMIN . "/invoices/view/" . $this->data['item']->invoice_id);
        }
    }
//
//    public function list()
//    {
//
//        $this->permission($this->_table, 'index');
//        $this->indexFixes();
//
//        $this->{$this->model}->limit = config('pagination_limit');
//        $this->{$this->model}->offset = $offset;
//
//        $config['total_rows'] = $this->{$this->model}->get(TRUE);
//        $config['suffix'] = '?' . http_build_query($_GET);
//        $config['base_url'] = site_url(ADMIN . '/' . $this->_table . '/index');
//        $config['per_page'] = config('pagination_limit');
//
//        $this->load->library('pagination', $config);
//        $this->data['pagination'] = $this->pagination->create_links();
//        $this->data['total'] = $config['total_rows'];
//
//        $this->data['items'] = $this->{$this->model}->get();
//        $this->twiggy->set($this->data)
//            ->template("invoices_index")
//            ->display();
//    }

    private function invoiceData($invoice_id)
    {
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

        $data['branch'] = $this->db->select('*')
            ->where('branch_id', $data['item']->branch_id)
            ->get('branches')
            ->result();
        if($data['order'][0])
        $data['offline_transactions'] = $this->db->select('*')
            ->where('order_id', $data['order'][0]->order_id)
            ->get('offline_transactions')
            ->result();

        return $data;
    }

    public function popup($invoice_id = false, $type = 'small')
    {
        if (!$invoice_id)
            show_404();
        $data = $this->invoiceData($invoice_id);
        $types = [
            'small' => 'invoices_small',
            'a4' => 'invoices_a4',
            'matrix' => 'invoices_matrix',
        ];

        $this->twiggy->set($data)->template($types[$type])->display();
    }

    public function view($invoice_id = false, $type = 'a4')
    {
        if (!$invoice_id)
            show_404();
        $data = $this->invoiceData($invoice_id);
        $types = [
            'small' => 'invoices_small',
            'a4' => 'invoices_a4',
            'matrix' => 'invoices_matrix',
        ];

        $this->twiggy->set($data)->template($types[$type])->display();
    }

    public function check()
    {
        $this->form_validation->set_message('check', lang("global_check_invoice"));
        $this->data['item'] = $this->db->where('code', $this->input->post('code'))->get('invoices')->row();
        if (!$this->data['item'])
            return false;
        return true;
    }
}
