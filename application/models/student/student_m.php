<?php
class student_m extends CI_Model
{
    public $id;
    public $fname;
    public $lname;
    public $address;
    public $code;
    public $img;

    public function __construct()
    {
        parent::__construct();
    }

    public function getALL()
    {
        $sql = "SELECT id,fname,lname,address,code FROM detail as d
                LEFT JOIN code as c
                ON d.id = c.id_detail";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getbyCODE()
    {
        $sql = "SELECT id,fname,lname,address,code FROM detail as d
                LEFT JOIN code as c
                ON d.id = c.id_detail
                WHERE c.code = ?";
        $query = $this->db->query($sql, array($this->code));
        return $query->result_array();
    }

    public function setDetail()
    {
        echo ($this->img);
        $sql = "INSERT INTO detail (fname, lname, address,img) 
                 VALUES (?, ?, ?, ?)";
        $query = $this->db->query($sql, array($this->fname, $this->lname, $this->address, $this->img));
    }

    public function setCode()
    {
        $sql = "INSERT INTO code (id_detail,code) 
                VALUES (?,?)";
        $query = $this->db->query($sql, array($this->id, $this->code));
    }

    public function getLastID()
    {
        $sql = "SELECT MAX(id) as code
                FROM detail";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function delData()
    {

        $sql = "DELETE FROM detail 
                WHERE detail.id = ?";
        $query = $this->db->query($sql, array($this->id));

        $sql = "DELETE FROM code 
                WHERE code.id_detail = ?";
        $query = $this->db->query($sql, array($this->id));
    }

    public function getbyID()
    {
        $sql = "SELECT id,fname,lname,address,code,img FROM detail as d
                LEFT JOIN code as c
                ON d.id = c.id_detail
                WHERE d.id = ?";
        $query = $this->db->query($sql, array($this->id));
        return $query->result_array();
    }

    public function update()
    {
        $sql = "UPDATE detail 
                SET fname = ?, lname = ? , address = ?
                WHERE detail.id = ?";
        $query = $this->db->query($sql, array($this->fname, $this->lname, $this->address, $this->id));
        // echo $sql ,$this->code,$this->id ;
        $sql = "UPDATE code 
                SET code = ? 
                WHERE code.id_detail = ?";
        // echo $sql ,$this->code,$this->id ;
        $query = $this->db->query($sql, array($this->code, $this->id));
    }
}
