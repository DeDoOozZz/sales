<?php

class Order
{
    public $order_id = null;
    public $invoice_id = null;
    public $product_details = [];

    public function __get($key)
    {
        return get_instance()->$key;
    }

    /**
     * PLACE AN ORDER
     */
    public function placeOrder($order, $products, $transactions)
    {
        // GET ORDER TOTAL
        $total = $this->getOrderTotal($products);
        // CREATE INVOICE
        $this->invoice_id = $this->createInvoice([
            'code' => $this->invoice_code(),
            'user_id' => $order['user_id'],
            'client_id' => $order['client_id'],
            'due' => $total['due'],
            'paid' => $order['paid'],
            'branch_id' => $order['branch_id'],
            'created_at' => now(),
            'invoice_status_id' => 1,
        ]);

        // CREATE ORDER
        $this->db->insert('orders', array_merge($order, ['invoice_id' => $this->invoice_id]));
        $this->order_id = $this->db->insert_id();
        // ORDER PRODUCTS
        foreach ($products as $product_id => $qty) {
            $this->db->insert('order_products', [
                'product_id' => $product_id,
                'qty' => $qty,
                'order_id' => $this->order_id,
                'price' => $total['price'][$product_id]
            ]);
            // DEDUCT PRODUCTS FROM INVENTORY
            $this->deductProductFromInventory($product_id, $qty, $order['branch_id']);
        }

        // USER COMMISSION
        $this->addUserCommission($order['user_id'], $total['commissions']);

        // CLIENT POINTS
        $this->addClientPoints($order['client_id'], $total['points']);

        // TRANSACTIONS
        $this->insertTransactions($transactions);
    }

    /**
     * CREATE DEVICE ORDER
     */
    public function deviceOrder($order) {

        $total = $this->getDeviceTotal($order['device_id']);
        // CREATE INVOICE
        $this->invoice_id = $this->createInvoice([
            'code' => $this->order->invoice_code(),
            'user_id' => $this->user->user_id,
            'client_id' => $order['client_id'],
            'due' => $total->price - $total->discount,
            'paid' => $order['paid'],
            'branch_id' => $order['branch_id'],
            'created_at' => now(),
            'invoice_status_id' => 1,
        ]);

        $order['invoice_id'] = $this->invoice_id;
        $this->db->insert('device_orders', $order);

    }
    public function getDeviceTotal($device_id) {
        return $this->db->where('device_id', $device_id)->get('devices')->row();
    }
    /**
     * CREATE INVOICE
     */
    public function createInvoice($invoice) {
        $this->db->insert('invoices', $invoice);
        $this->invoice_id = $this->db->insert_id();
        return $this->invoice_id;
    }
    /**
     * REVERT ORDER PRODUCTS
     */
    public function revertProduct()
    {

    }

    /**
     * GET ORDER TOTAL
     */
    public function getOrderTotal($products)
    {
        $totalDue = 0;
        $totalPoints = 0;
        $totalCommissions = 0;
        $productPrice = [];
        foreach ($products as $product_id => $qty) {
            $prod = $this->db->select("(price-discount) as amount, points, commission")->where('product_id', $product_id)->get('products')->row();
            $totalDue += $prod->amount;
            $totalPoints += $prod->points;
            $totalCommissions += $prod->commission;
            $productPrice[$product_id] = $prod->amount;
        }
        return ['due' => $totalDue, 'points' => $totalPoints, 'commissions' => $totalCommissions, 'price' => $productPrice];
    }


    public function addClientPoints($client_id, $points)
    {
//        $this->db ->where('client_id', $client_id)
//                  ->set("points = points + $points", null, null, false)
//                  ->update('clients');
    }

    /**
     * CHECK PRODUCT AVAILABILITY
     */
    public function checkProductAvailability($products)
    {
        $result = true;
        $errors = '';
        $branch_id = $this->user->branch_id;
        foreach ($products as $product_id => $qty) {
            $r = $this->db->query("SELECT
            (SELECT SUM(qty) FROM `product_inventory` WHERE `operation` = '+' AND product_id = '$product_id' AND branch_id = '$branch_id') -
            (SELECT SUM(qty) FROM `product_inventory` WHERE `operation` = '-' AND product_id = '$product_id' AND branch_id = '$branch_id') AS qty, (SELECT " . name() . " FROM products WHERE product_id = '$product_id') AS product")->row();
            if ($r->qty < $qty) {
                $result = false;
                $errors .= sprintf(lang('orders_product_is_not_available'), $r->product, $r->qty);
            }
        }
        return ['result' => $result, 'errors' => $errors];
    }

    /**
     * DEDUCT PRODUCT FROM INVENTORY
     */
    public function deductProductFromInventory($product_id, $qty, $branch_id)
    {
        $this->db->insert('product_inventory', [
            'product_id' => $product_id,
            'qty' => $qty,
            'branch_id' => $branch_id,
            'operation' => '-',
        ]);
    }

    /**
     * REVERT PRODUCT TO INVENTORY
     */
    public function increaseProductToInventory($product_id, $qty, $branch_id)
    {
        $this->db->insert('product_inventory', [
            'product_id' => $product_id,
            'qty' => $qty,
            'branch_id' => $branch_id,
            'operation' => '+',
        ]);
    }

    /**
     * MAKE A USER COMMISSION
     */
    public function addUserCommission($user_id, $amount)
    {
        // TODO
        $this->db->insert('user_commissions', [
            'op' => '+',
            'amount' => $amount,
            'purpose' => 'sales',
            'created_at' => now(),
            'user_id' => $user_id,
        ]);
    }

    /**
     * REVERT USER COMMISSION
     */
    public function removeUserCommission()
    {

    }

    public function removeClientPoints()
    {

    }

    public function insertTransactions($transactions)
    {
        foreach ($transactions['accepted'] as $item) {
            if ($item) {
                $this->db->insert('offline_transactions', [
                    'order_id' => $this->order_id,
                    'status' => 'accepted',
                    'number' => $item
                ]);
            }
        }
        foreach ($transactions['refused'] as $item) {
            if ($item) {
                $this->db->insert('transactions', [
                    'order_id' => $this->order_id,
                    'status' => 'refused',
                    'number' => $item
                ]);
            }
        }
    }

    /**
     * Generate Invoice Code
     * @return string
     */
    public function invoice_code()
    {
        return uniqid();
    }

}