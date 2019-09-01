<?php
    require_once 'db/dbhelper.php';

    class User extends DBHelper
    {
        private $table = 'user';
        private $fields = array(
            'user_fname',
            'user_lname',
            'user_address',
            'user_birthdate',
            'user_postal_code',
            'user_email',
            'user_phone',
            'user_username',
            'user_password',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addUser($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function getAllUser()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function deleteUser($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'user_id', $ref_id);
        }

        public function updateUser($data, $ref_id)
        {
            return DBHelper::updateRecord($this->table, $this->fields, $data, 'user_id', $ref_id);
        }

        public function deactUser($data, $ref_id)
        {
            return DBHelper::statusUpdate($this->table, 'status', $data, 'user_id', $ref_id);
        }

        public function getUserById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'user_id', $ref_id);
        }
    }
