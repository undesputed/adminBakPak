<?php
    require_once 'db/dbhelper.php';

    class Supplier extends DBHelper
    {
        private $table = 'supplier';
        private $fields = array(
            'supplier_name',
            'address',
            'contact_no',
            'contact_email',
            'tin_number',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllSupplier()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getSuppById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'supp_id', $ref_id);
        }
    }
