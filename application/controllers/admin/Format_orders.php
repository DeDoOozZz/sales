<?php

class Format_orders extends Brightery_Controller
{
    public $_table = 'format_orders';
    public $_primary_key = 'format_order_id';
//    public $_index_fields = [
//        'name',
//    ];

    public function __construct()
    {
        parent::__construct();
//        $this->_index_fields[] = name();
    }

    public function index() {
        $this->load->library('order');
        $this->load->library('form_validation');
        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);

        $this->form_validation->set_rules('save_data', lang('format_save_data'), "trim|required");
        $this->form_validation->set_rules('original_software', lang('format_original_software'), "trim|required");
        $this->form_validation->set_rules('mobile', lang('format_mobile'), "trim|required");
        $this->form_validation->set_rules('client_id', lang('format_client_id'), "trim");
        $this->form_validation->set_rules('password', lang('format_password'), "trim");
        $this->form_validation->set_rules('notes', lang('format_notes'), "trim");
        $this->form_validation->set_rules('paid', lang('orders_paid'), "trim|required");

        if($this->form_validation->run() == false) {
            $this->twiggy->set($this->data)->template('format_orders')->display();
        }
        else
        {
            $invoice_id = $this->order->createInvoice([
                'code' => $this->invoice_code(),
                'user_id' => $this->user->user_id,
                'client_id' => $this->input->post('client_id'),
                'due' => config('format_price'),
                'paid' => $this->input->post('paid'),
                'branch_id' => $this->user->branch_id,
                'created_at' => now(),
                'invoice_status_id' => 1,
            ]);
            $vars = [
                'save_data' => $this->input->post('save_data'),
                'original_software' => $this->input->post('original_software'),
                'mobile' => $this->input->post('mobile'),
                'client_id' => $this->input->post('client_id'),
                'password' => $this->input->post('password'),
                'notes' => $this->input->post('notes'),
                'f_step_user_id' => $this->user->user_id,
                'invoice_id' => $invoice_id,
                'status' => 'in_progress',
                'created_at' => now(),
                'branch_id' => $this->user->branch_id,
                'format_price' => config('format_price'),
                //'s_step_user_id' => $this->input->post('s_step_user_id'),
            ];

            $this->db->insert('format_orders', $vars);
            // format_commission_first
            // format_commission_second
        }
    }

    public function indexFixes()
    {
        $this->{$this->model}->custom_select = '*';
//        $this->{$this->model}->joins = array(
//            'business_types' => array('business_types.business_type_id = companies.business_type_id', 'inner')
//        );
//        $this->{$this->model}->order_by[name()] = 'ASC';

    }

}
