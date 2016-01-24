<?php

class Format_orders extends Brightery_Controller {

    public $_table = 'format_orders';
    public $_primary_key = 'format_order_id';

    public function index() {
        $this->load->library('order');
        $this->load->library('form_validation');
        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);

        $this->form_validation->set_rules('save_data', lang('format_orders_save_data'), "trim|required");
        $this->form_validation->set_rules('original_software', lang('format_orders_original_software'), "trim|required");
        $this->form_validation->set_rules('mobile', lang('format_orders_mobile'), "trim|required");
        $this->form_validation->set_rules('client_id', lang('format_orders_client_id'), "trim");
        $this->form_validation->set_rules('password', lang('format_orders_password'), "trim");
        $this->form_validation->set_rules('notes', lang('format_orders_notes'), "trim");
        $this->form_validation->set_rules('paid', lang('format_orders_paid'), "trim|required");

        if ($this->form_validation->run() == false) {
            $this->twiggy->set($this->data)->template('format_orders')->display();
        } else {
            $invoice_code = $this->order->invoice_code();
            $invoice_id = $this->order->createInvoice(['user_id' => $this->user->user_id,
                'code' => $invoice_code,
                'client_id' => 0,
                'due' => config('format_price'),
                'paid' => $this->input->post('paid'),
                'branch_id' => $this->user->branch_id,
                'invoice_status_id' => 1,
                'created_at' => date("Y-m-d H:i:s")]);
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
//                's_step_user_id' => $this->input->post('s_step_user_id'),
            ];

            $this->db->insert('format_orders', $vars);
            redirect(ADMIN . '/invoices/view/' . $invoice_id);
// format_commission_first
            // format_commission_second
        }
    }

    public function step2() {
        $this->load->library('form_validation');
//        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);
//        $this->form_validation->set_rules('save_data', lang('format_save_data'), "trim|required");
//        if ($this->form_validation->run() == false) {
        $this->twiggy->set($this->data)->template('format_orders')->display();
//        } else {
//
//        }
    }

    public function step2_proccess($id = false) {
        if (!$id)
            show_404();
    }

}
