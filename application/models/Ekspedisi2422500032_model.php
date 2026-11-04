
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi2422500032_model extends CI_Model
{
    private $table = 'ekspedisi2422500032';

    public function get_all()
    {
        return $this->db
            ->order_by('id_ekspedisi032', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, array(
                'id_ekspedisi032' => (int) $id
            ))
            ->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_ekspedisi032', (int) $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_ekspedisi032', (int) $id)
            ->delete($this->table);
    }

    public function count_ekspedisi2422500032($id)
    {
        return (int) $this->db
            ->where('ekspedisi2422500032_id', (int) $id)
            ->count_all_results($this->table);
    }
}
