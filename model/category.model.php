<?php
    require_once 'db/dbhelper.php';

    class Category extends DBHelper
    {
        private $table = 'category';
        private $fields = array(
            'category_name',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllCategory()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getCatById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'cat_id', $ref_id);
        }
    }
