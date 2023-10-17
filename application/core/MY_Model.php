<?php
class MY_Model extends CI_Model {

	protected $table_name = '';
	protected $primary_key = 'id';
	protected $primary_filter = 'intval';
	protected $order_by = '';
	protected $rules = array();
	protected $timestamps = FALSE;
	
	function __Construct() {
        parent::__construct();
		
    }
	
	public function get($id = NULL, $single = FALSE) {
		if($id != NULL) {
			$filter = $this->primary_filter;
			$id = $filter($id);
			$this->db->where($this->primary_key,$id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		} else {
			$method = 'result';
		}
		if(!count($this->db->ar_orderby)) {
			$this->db->order_by($this->order_by);
		}
		if ($this->table_name == 'configs') $this->db->where('sg','bill');
		return $this->db->get($this->table_name)->$method();
	}
	public function get_max($where,$zn,$ck) {
		if ($ck == 'min') $ck="asc";
		if ($ck == 'max') $ck="desc";
		$this->db->where($where);
		$this->db->order_by($zn.' '.$ck);
		return $this->db->get($this->table_name)->row();
	}
	
	public function get_by($where, $single) {
		$this->db->where($where);
		$this->db->order_by($this->order_by);
		if ($single) {
			return $this->db->get($this->table_name)->result();
		} else {
			return $this->db->get($this->table_name)->row();
		}
	}
	public function save($data, $id = NULL) {
		if($this->timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		
		if($id === NULL) {
			!isset($data[$this->primary_key]) || $data[$this->primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->table_name);
			$id = $this->db->insert_id();
		} else {
			$filter = $this->primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->primary_key,$id); 
			if ($this->table_name == 'configs') $this->db->where('sg','bill');
			$this->db->update($this->table_name);
		}
		return $id;
	}
	public function get_sum($where,$nm) {
	  $this->db->select_sum($nm);
	  if (empty($where)) {
		  return $this->db->get($this->table_name)->row();
	  } else {
		  return $this->db->get_where($this->table_name,$where)->row();
	  }
	}	
	public function get_count($where) {
	  if (empty($where)) {
		  return $this->db->get($this->table_name)->num_rows;
	  } else {
		  return $this->db->get_where($this->table_name,$where)->num_rows;
	  }
	}	
	public function get_count_like($like,$where) {
          $this->db->from($this->table_name);
          $this->db->like($like);
		  $this->db->where($where);
          return $this->db->get()->num_rows();
	}	
    public function get_bynum($count, $start, $where = FALSE, $order = FALSE, $single = FALSE)
    {
		$this->db->order_by($this->order_by);
        $start = $start * $count;
        $res = $this->db->get_where($this->table_name, $where, $count, $start, $single);
        return $res->result();
    }
	public function get_by_lm($where, $count) {
		$this->db->where($where);
		$this->db->order_by($this->order_by);
        $res = $this->db->get($this->table_name, $count);
        return $res->result();
	}
    public function get_lm($count)
    {
		$this->db->order_by($this->order_by);
        $res = $this->db->get($this->table_name, $count);
        return $res->result();
    }
    public function get_bynum_like($count, $start,$like=FALSE,$where=FALSE,$single=FALSE) {
		
	  $start = $start * $count;
      $this->db->from($this->table_name);
	  $this->db->where($where);
	  $this->db->order_by($this->order_by);
      $this->db->like($like);
	  $this->db->limit($count,$start);
      $res    = $this->db->get();
	  return $res->result();
	}
	public function delete($id) {
		$filter = $this->primary_filter;
		$id = $filter($id);
		
		if(!$id) {
			return FALSE;
		}
		$this->db->where(array($this->primary_key => $id));
		$this->db->limit(1);
		$this->db->delete($this->table_name);
	}	
	
	public function array_from_post($fields){

    $data = array();
    foreach ($fields as $field) {
        $data[$field] = $this->input->post($field);
    }
    return $data;
}
}
?>