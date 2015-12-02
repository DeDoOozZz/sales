<?php

class Inventory extends Crud
{
    public $_table = 'products';
    public $_primary_key = 'product_id';


    public function __construct()
    {
         parent::__construct();
        $this->_index_fields[] = name();
    }

    public function indexFixes()
    {
     $this->_index_view = 'inventory';

    }
}
