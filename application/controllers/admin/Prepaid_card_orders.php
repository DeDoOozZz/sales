<?php

class Prepaid_card_orders extends Brightery_Controller {

    public $_table = 'prepaid_card_orders';
    public $_primary_key = 'prepaid_card_order_id';

    public function index() {
        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);
        $this->data['card_types'] = dd2menu('card_types', ['card_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = 1;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', lang('quantity').'quantity', "trim|required");
        $this->form_validation->set_rules('card_type_id', lang('prepaid_card_orders_card_type_id'), "trim|required");
        $this->form_validation->set_rules('prepaid_card_id', lang('prepaid_card_orders_prepaid_card_id'), "trim|required");
        $this->form_validation->set_rules('paid', lang('paid'), "trim|required");


        if ($this->form_validation->run() == false) {
            $this->twiggy->set($this->data)->template('prepaid_card_orders')->display();
        } else {
            // TODO: CREATE INVOICE AND ORDER PROCESS
            $this->load->library('order');
            $vars = [
                'prepaid_card_order_id' => $this->input->post('prepaid_card_order_id'),
                'card_type_id' => $this->input->post('card_type_id'),
                'prepaid_card_id' => $this->input->post('prepaid_card_id'),
                'total_cards' => $this->input->post('total_cards'),
                'date' => $this->input->post('date'),
                'invoice_id' => $this->input->post('invoice_id'),
            ];
            $vars['created_at'] = now();


            $invoice_code = $this->order->invoice_code();
            $invoice_id = $this->order->createInvoice(['user_id' => $this->user->user_id ,
                'code' => $invoice_code,
                'client_id' => 0,
                'due' => $this->input->post('total_price'),
                'paid' => $this->input->post('paid'),
                'branch_id' => $this->user->branch_id,
                'invoice_status_id' => 1,
                'created_at' => date("Y-m-d H:i:s")]);

            $data = array(
                'total_cards' => $this->input->post('quantity'),
                'date' => date("Y-m-d H:i:s"),
                'invoice_id' => $invoice_id 
            );
            $this->db->insert('prepaid_card_orders', $data);
            $insert_id = $this->db->insert_id();
            $cards = array(
                'user_id' => $this->user->user_id,
                'prepaid_card_order_id' => $insert_id);
            $this->db->where('prepaid_card_order_id')->where('prepaid_card_type_id' ,$this->input->post('prepaid_card_id'))->limit($this->input->post('quantity'))->update('prepaid_cards', $cards);
            $invoice_id;
            redirect(ADMIN.'/invoices/view/'.$invoice_id);
            die(json_encode(['invoice_id' => $this->order->invoice_id]));
        }
    }

    public function prepaid_cards($id = false) {
        echo json_encode(dd2menu('prepaid_card_types', ['prepaid_card_type_id' => name()], ['card_type_id' => $id]));
    }

    public function get_image($id = false) {
        $this->data['prepaid_card_type_id'] = $id;
        $result = $this->db->where('prepaid_card_type_id', $id)->get('prepaid_card_types')->row();
        $image = $result->image;
        echo $img = $this->cdn->image('prepaid_card_orders', $image);
    }

    public function get_remain($prepaid_card_type_id = false) {
        $result = $this->db->where('prepaid_card_type_id', $prepaid_card_type_id)
                        ->where('prepaid_card_order_id', NULL)
                        ->get('prepaid_cards')->num_rows();
        echo $result;
    }

    public function get_price($prepaid_card_type_id = FALSE) {
        $price = $this->db->where('prepaid_card_type_id', $prepaid_card_type_id)->get('prepaid_card_types')->row();
        $total_price = $price->price - $price->discount;
        echo $total_price;
    }

    public function save_order($prepaid_card_type_id = FALSE, $QTY = FALSE) {
        $data = array(
            'total_cards' => $QTY,
            'date' => date("Y-m-d H:i:s")
        );
        $this->db->insert('prepaid_card_orders', $data);
        $insert_id = $this->db->insert_id();
        $cards = array('prepaid_card_type_id' => $prepaid_card_type_id,
            'prepaid_card_order_id' => $insert_id);
        $this->db->where('prepaid_card_order_id')->update('prepaid_card_orders', $cards)->limit($QTY);
        exit();
    }

}
