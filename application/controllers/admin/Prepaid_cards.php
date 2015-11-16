<?php

class Prepaid_cards extends Crud
{
    public $_table = 'prepaid_cards';
    public $_primary_key = 'prepaid_card_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function indexFixes()
    {
        $this->_index_view = 'prepaid_cards_index';

        $this->{$this->model}->custom_select = 'prepaid_cards.*, users.full_name as user, prepaid_card_types.' . name() . ' as prepaid_card_type, prepaid_card_types.cost, ';
        $this->{$this->model}->joins = array(
            'prepaid_card_types' => ['prepaid_card_types.prepaid_card_type_id = prepaid_cards.prepaid_card_type_id', 'inner'],
            'users' => ['users.user_id = prepaid_cards.user_id', 'inner'],
        );

        if ($this->input->get('number'))
            $this->{$this->model}->where('number', $this->input->get('number'));

        if ($this->input->get('serial'))
            $this->{$this->model}->where('serial', $this->input->get('serial'));

        if (!$this->input->get('serial') && !$this->input->get('number'))
            $this->{$this->model}->where('prepaid_card_id', 0);

    }

    protected function onValidationEvent($op, $id = false)
    {
        $this->data['prepaid_card_types'] = dd2menu('prepaid_card_types', ['prepaid_card_type_id' => name()]);
        $this->form_validation->set_rules('prepaid_card_type_id', lang('prepaid_cards_prepaid_card_type_id'), "trim|required");
        $this->form_validation->set_rules('number[]', lang('prepaid_cards_number'), "trim|required");
        $this->form_validation->set_rules('serial[]', lang('prepaid_cards_serial'), "trim");
        $this->form_validation->set_rules('expire_date[]', lang('prepaid_cards_expire_date'), "trim");
    }

    protected function onSuccessEvent($op, $id = false)
    {
        foreach ($this->input->post('number') as $key => $value) {
            if (!$value)
                continue;
            $vars = [
                'prepaid_card_type_id' => $this->input->post('prepaid_card_type_id'),
                'number' => $this->input->post('number')[$key],
                'serial' => $this->input->post('serial')[$key],
                'expire_date' => $this->input->post('expire_date')[$key],
            ];
            if ($op == 'add') {
                $vars['user_id'] = $this->user->user_id;
                $vars['created_at'] = now();
                $vars['prepaid_card_order_id'] = null;
            }
            foreach ($vars as $vark => $varv)
                $this->{$this->model}->{$vark} = $varv;
            $this->{$this->model}->save();
        }
    }

    public function get_prepaid_card_type_logo($id = null)
    {
        $type = $this->db
            ->select('prepaid_card_types.image, service_providers.logo, service_providers.' . name())
            ->where('prepaid_card_type_id', $id)
            ->join('service_providers', 'service_providers.service_provider_id = prepaid_card_types.service_provider_id')
            ->get('prepaid_card_types')->row();
        echo json_encode([
            'image' => $this->cdn->image('prepaid_card_types', $type->image),
            'name' => $type->{name()},
            'logo' => $this->cdn->image('service_providers', $type->logo)
        ]);

    }

    public function get_sold_card_details($id = null)
    {
        $type = $this->db
            ->where('prepaid_card_orders.prepaid_card_order_id', $id)
            ->join('invoices', 'invoices.invoice_id = prepaid_card_orders.invoice_id')
//            ->join('clients', 'invoices.client_id = clients.client_id')
            ->join('prepaid_cards', 'prepaid_cards.prepaid_card_order_id = prepaid_card_orders.prepaid_card_order_id')
            ->get('prepaid_card_orders')->row();
        $this->twiggy->set(['item' => $type])->template('prepaid_card_order_details')->display();

    }
}
