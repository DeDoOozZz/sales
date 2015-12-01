<?php

class Prepaid_card_orders extends Brightery_Controller
{
    public $_table = 'prepaid_card_orders';
    public $_primary_key = 'prepaid_card_order_id';

    public function index()
    {
        $this->data['clients'] = dd2menu('clients', ['client_id' => 'name']);
        $this->data['card_types'] = dd2menu('card_types', ['card_type_id' => name()]);

        $config['upload_path'] = './cdn/' . $this->_table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $required = 1;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('prepaid_card_order_id', lang('prepaid_card_orders_prepaid_card_order_id'), "trim|required");
        $this->form_validation->set_rules('card_type_id', lang('prepaid_card_orders_card_type_id'), "trim|required");
        $this->form_validation->set_rules('prepaid_card_id', lang('prepaid_card_orders_prepaid_card_id'), "trim|required");
        $this->form_validation->set_rules('total_cards', lang('prepaid_card_orders_total_cards'), "trim|required");
        $this->form_validation->set_rules('date', lang('prepaid_card_orders_date'), "trim|required");
        $this->form_validation->set_rules('invoice_id', lang('prepaid_card_orders_invoice_id'), "trim|required");

        if($this->form_validation->run() == false) {
            $this->twiggy->set($this->data)->template('prepaid_card_orders')->display();
        }
        else
        {
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


//            $this->order->deviceOrder($vars);
            die(json_encode(['invoice_id' => $this->order->invoice_id]));
        }





    }



    public function prepaid_cards($id = false){
        echo json_encode(dd2menu('prepaid_card_types', ['prepaid_card_type_id' => name()], ['card_type_id'=>$id]));

    }
}
