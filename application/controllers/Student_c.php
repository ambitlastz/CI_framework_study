<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/UniDev.php");
class Student_c extends UniDev
{
    public $flag = 1;
    public $studentsub;
    public function __construct()
    {
        parent::__construct();
        $this->overflow = "overflow/testsub/";
        $this->studentsub = "student/student_m";
        $this->loginsub = "student/login_m";
        $this->imagepath = "assets/img/ ";
    }
    public function index()
    {
        // call load model in subfolder and new name "login_m"
        $this->load->model($this->loginsub, "login_m");
        // get function from login_m and store in $login
        $login = $this->login_m->getuserName();
        //variable $data array stored varivale $login
        $data["login"] = $login;
        // get variable from "view" name user_id then set variable to user_id in "model"
        $this->login_m->user_id = $this->input->post("user_id");
        $this->login_m->user_pass = $this->input->post("user_pass");
        //check user and password textfield is match with data in database ? 
        $a = $this->login_m->getuserName();
        if (!$a == NULL) {
            $this->login();
        }
        // $this->output($this->overflow . 'v_login', $data);
        $this->login();
    }
    // this is main page after login
    public function login()
    {
        $this->load->model($this->studentsub, "stu_m");
        $person = $this->stu_m->getALL();
        $data["person"] = $person;
        if ($this->flag != 0) {
            if (!$this->input->post('s_code') == "") {
                $this->stu_m->code = $this->input->post("s_code");
                $data["s_code"] = $this->stu_m->getbyCODE();
            }
        }
        $this->output($this->overflow . 'v_student', $data);
    }

    public function setDATA()
    {
        $data["add"] = $this->input->get();
        $this->load->model($this->studentsub, "add_m");
        $this->add_m->code = $this->input->post("s_code");
        $this->add_m->fname = $this->input->post("name");
        $this->add_m->lname = $this->input->post("lastname");
        $this->add_m->address = $this->input->post("address");
        
        $this->flag =  0;
        // pre upload image
        $ext = pathinfo(basename($_FILES["upimg"]["name"], PATHINFO_EXTENSION));
        if (empty($ext["extension"])) {
            echo "fails to upload this image";
        } else {
            $new_img_name = "image_" . uniqid() . "." . $ext["extension"];
            $image_path = $this->imagepath;
            $upload_path = $image_path . $new_img_name;
            $processing =  move_uploaded_file($_FILES["upimg"]["tmp_name"], $upload_path);
            $this->add_m->img = $new_img_name;
        }
        $this->add_m->setDetail();
        $id = $this->add_m->getLastID();
        $this->add_m->id = $id[0]["code"];
        $this->add_m->setCode();
        $this->login();
    }

    public function deDATA()
    {
        $this->load->model($this->studentsub, "del_m");
        $this->del_m->id = $this->input->get("deid");
        $this->del_m->delData();
        $this->login();
    }

    public function edDATA()
    {
        $this->load->model($this->studentsub, "ed_m");
        $this->ed_m->id =  $this->input->get("edid");
        $editdata["edid"] = $this->ed_m->getbyID();
        $this->output($this->overflow . 'v_editdata', $editdata);
    }

    public function upDATA()
    {
        $updata = $this->input->post();
        $this->load->model($this->studentsub, "up_m");
        $this->up_m->id = $updata["id"];
        $this->up_m->code = $updata["s_code"];
        $this->up_m->fname = $updata["name"];
        $this->up_m->lname = $updata["lastname"];
        $this->up_m->address = $updata["address"];
        $this->up_m->update();
        $this->flag =  0;
        $this->login();
    }
}
