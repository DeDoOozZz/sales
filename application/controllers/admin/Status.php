<?php

class Status extends CI_Controller {
    public function index() {
        echo json_encode(['status' => 'success']);
    }
}