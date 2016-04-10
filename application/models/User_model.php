<?php

class User_model extends BaseModel {

    private $table = "ci_users";
    private $_data = [];

    public function validate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $this->db->or_where('email', $username);

        $query = $this->db->get($this->table);

        if($query->num_rows())
        {
            $row = $query->row_array();

            if(password_verify($password, $row['password']))
            {
                unset($row['password']);
                $this->_data = $row;
                return ERR_NONE;
            }

            return ERR_INVALID_PASSWORD;
        }
        else {
            return ERR_INVALID_USERNAME;
        }

    }

    public function register()
    {

    }

    public function get_data()
    {
        return $this->_data;
    }
}
