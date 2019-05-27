<?php
class   login_m extends CI_Model
{
    public $user_id;
    public $user_pass;

    public function __construct()
    {
        parent::__construct();
    }

    public function getuserName()
    {
        $sql = "SELECT user_id,user_pass FROM login as c
                WHERE c.user_id = ? AND c.user_pass = ?";
        $query = $this->db->query($sql, array("$this->user_id", $this->user_pass));
        return $query->result_array();
    }
}
