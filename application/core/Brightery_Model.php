<?php
/**
 * @package Brightery_model
 * @property string $custom_select Customized select query string
 * @property string $entity Table name
 * @property array $joins array(joined_table => joining_conddition)
 * @property array $_primary_key  table primary key
 * @property array $columns array of affected table columns
 * @property integer $limit Limit query results
 * @property integer $offset the offset
 * @property array $order_by array('id' => 'DESC')
 *
 * @version 1.0
 * @author Muhammad El-Saee <muhammad@el-saeed.info>
 */

class Brightery_model extends CI_Model {
    public $custom_select = FALSE;
    public $_table;
    public $_primary_key;
    public $joins = FALSE;
    public $limit = FALSE;
    public $offset = FALSE;
    public $order_by = FALSE;
    public $columns = array();
    public $_where = array();
    public $_like = array();
    public $_or_like = array();

    public function __set($name, $value)
    {
        $this->columns[$name] = $value;
    }

    public function __construct() {
        parent::__construct();
    }

    public function get($count = false) {
        if($this->custom_select)
            $this->db->select($this->custom_select);
        if($count)
            $this->db->select("COUNT(*) AS count");
        $row = FALSE;

        if($this->columns)
        foreach($this->columns as $key => $value) {
            $this->db->where($key, $value);
            if($key == $this->_primary_key)
                $row = TRUE;
        }

        if($this->_where)
        foreach($this->_where as $key => $value) {
            $this->db->where($key, $value);
        }

        if($this->_like)
        foreach($this->_like as $key => $value) {
            $this->db->like($key, $value, 'both');
        }

        if($this->_or_like)
        foreach($this->_or_like as $key => $value) {
            $this->db->or_like($key, $value, 'both');
        }

        if($this->order_by)
        foreach($this->order_by as $key => $value) {
            $this->db->order_by($key, $value);
        }

        if($this->joins)
        foreach($this->joins as $key => $value) {
            $this->db->join($key, $value[0], $value[1]);
        }
        if( ! $count)
        if($this->limit)
            $this->db->limit($this->limit, $this->offset);

        $query = $this->db->get($this->_table);

        if($count)
            return $query->row()->count;

        if($row)
            return $query->row();
        else
            return $query->result();
    }

    public function save() {
        $update = FALSE;
        if($this->columns)
        foreach($this->columns as $key => $value) {
            if($key == $this->_primary_key){
                $update = TRUE;
                $id = $value;
                $this->db->where($key, $value);
            }
            else
                $this->db->set($key, $value);
        }
        if($update) {
            $this->db->update($this->_table);
            return $this->columns[$this->_primary_key];
        }
        else {
            $this->db->insert($this->_table);
            return $this->db->insert_id();
        }
    }

    public function delete() {
        if($this->columns)
        foreach($this->columns as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    public function where($key, $value) {
        $this->_where[$key] = $value;
    }
    public function like($key, $value) {
        $this->_like[$key] = $value;
    }
    public function or_like($key, $value) {
        $this->_or_like[$key] = $value;
    }
}