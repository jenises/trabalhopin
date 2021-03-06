<?php
class ClienteEmp_model extends CI_Model
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
        $this->db->join('perfilemp', 'perfilemp.idclienteemp = clienteemp.idclienteemp');
        $this->db->order_by('clienteemp.idclienteemp', 'desc');
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
        $this->db->select('clienteemp.*, perfilemp.*');
        $this->db->join('perfilemp', 'perfilemp.idclienteemp = clienteemp.idclienteemp');
        $this->db->where('clienteemp.idclienteemp', $id);
        $this->db->limit(1);
        return $this->db->get('clienteemp')->row();
    }
    
    function add($table, $data)
    {
        
        $this->db->insert($table, $data);
        return $this->addPerfil($this->db->insert_id());
        /*if ($this->db->affected_rows() == '1') {
            
        }
        */
        
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
    
    private function addPerfil($id) {
        $this->db->query("insert into perfilemp values(".$id.")");
        if ($this->db->affected_rows() >= 0) {
            return $id;
        }
        else {
            exit("nao inseriu perfil");
        }
        
        
    }
    
    
    public function AtualizaLogo($id, $logo) {
        $this->db->set('imagem', $logo);
        $this->db->where('idclienteemp', $id);
        return $this->db->update('perfilemp');
         
    }
    
    public function AtualizaPerfil($data, $id) {
        $this->db->where("idclienteemp", $id);
        $this->db->update('perfilemp', $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }

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
