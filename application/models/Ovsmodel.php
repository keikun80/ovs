<?php
defined ('BASEPATH') or exit ('No direct access script allow');

class Ovsmodel extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }
  public function insUsrInfo($vars)
  {
    if(!empty($vars))
    {
        $this->db->insert('tbl_invent_user', $vars);
    }
  }

  public function checkEmail($vars)
  {
      $list = $this->db->get_where('tbl_invent_user', $vars);
      return $list->num_rows();
  }

  public function ovslist($limit, $offset=0, $condition)
  {
      if(!empty($condition))
      {
          $this->db->where($condition);
      }
      if ($offset > 0) { $this->db->limit($limit, $offset); }
      else { $this->db->limit($limit); }
      $this->db->order_by('vocKey', 'DESC');
      return $this->db->get('tbl_invent_voucher');
  }


}
 ?>
