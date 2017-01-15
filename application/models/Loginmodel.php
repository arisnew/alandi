<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'user';  //choose table
        $this->isNew = false;
    }

    public function getRules() {    //set rule validasi form

        $username = array(
            'field' => 'username-input', 'label' => 'Username',
            'rules' => 'trim|required|max_length[50]'
        );

        $pass = array(
            'field' => 'password-input', 'label' => 'Password',
            'rules' => 'trim|required|max_length[21]'
        );

        return array($username, $pass);
    }
}