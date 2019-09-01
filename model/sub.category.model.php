<?php
    require_once 'db/dbhelper.php';

    class Sub_Category extends DBHElper
    {
        private $table = 'sub_categories';
        private $fields = array(
            'sub_category_name',
            'cat_id',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllSubCat()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getSubCatById($ref_id)
        {
            return DBHelper::getRecord($this->table, 'cat_id', $ref_id);
        }

        public function getSubById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'id', $ref_id);
        }
    }
