<?php
/*
 * Контроллер информации о пользователе
 */
class Users extends CI_Controller
{
    //Метод отображения имени пользователя
    public function show($id)
    {
        $this->load->view("header");
        $this->load->model("User_model");
        $this->load->model("Group_model");
        $data["user"] = $this->User_model->get_user($id);
        $data["groups"] = $this->Group_model->get_by_user($id);
        $this->load->view("users/show", $data);
        $this->load->view("footer");
    }

    //Метод отображения школы
    public function school($name_school)
    {
        $this->load->view("header");
        $this->load->model("User_model");
        $data["school"] = $this->User_model->get_by_school($name_school);
        $this->load->view("users/show", $data);
        $this->load->view("footer");
    }

    //Метод отображения города
    public function city($city)
    {
        $this->load->view("header");
        $this->load->model("User_model");
        $data["city"] = $this->User_model->get_by_city($city);
        $this->load->view("users/show", $data);
        $this->load->view("footer");
    }

    //Метод отображения отряда
    public function group($group)
    {
        $this->load->view("header");
        $this->load->model("User_model");
        $this->load->model("Group_model");
        $data["users"] = $this->User_model->get_by_group($group);
        $data["group"] = $this->Group_model->get_group($group);
        $data["name"] = $this->Group_model->get_group($group);
        $this->load->view("users/group", $data);
        $this->load->view("footer");
    }

    //Метод логина
    public function login(){
        $this->load->view("header");
        $this->load->model("User_model");
        $this->load->helper('url');
        $login = $this->input->post('login');
        $pass = $this->input->post('password');
        $result = $this->User_model->get_by_login($login);
        if($result['password']==$pass&&$pass!=0){
            redirect('/users/show/'.$result['id'], 'location');
            $this->load->library('session');
            $user_data = array(
                'username'  => $result['name']
            );
            $this->session->set_userdata($user_data);
        }
        else{
            $this->load->view('users/login');
        }
        $this->load->view("footer");
    }
}