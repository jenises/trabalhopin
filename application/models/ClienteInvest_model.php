<?php
class ClienteInvest_model extends CI_Model
{

    /**
     * author:Jenises Rudolf
     * email: silva018-mg@yahoo.com.br
     *
     */
    
    function __construct()
    {
        parent::__construct();
    }

    
    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idclienteinvest', 'desc');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id)
    {
        $this->db->where('idclienteinvest', $id);
        $this->db->limit(1);
        return $this->db->get('clienteinvest')->row();
    }
    
    function add($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        
        return false;
    }
    
    function edit($table, $data, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }
        
        return false;
    }
    
    function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        
        return false;
    }

    function count($table)
    {
        return $this->db->count_all($table);
    }
    
    
    function checkCPF($cpf) {
        $this->db->where('documento', $cpf);
        //$this->db->where('situacao', 1);
        $this->db->limit(1);
        return $this->db->get('clienteinvest')->row();

    }
        
    /*public function getOsByCliente($id)
    {
        $this->db->where('clientes_id', $id);
        $this->db->order_by('idOs', 'desc');
        $this->db->limit(10);
        return $this->db->get('os')->result();
    }
     * 
     */
}
