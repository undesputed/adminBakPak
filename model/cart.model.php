<?php
    require_once 'db/dbhelper.php';

    class Cart extends DBHelper
    {
        private $table = 'cart';
        private $fields = array(
            'user_id',
            'item_code',
            'quantity',
        );

        public function __contruct()
        {
            return DBHelper::__contruct();
        }

        public function getAllCart()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getCartQty($ref_id)
        {
            return DBHelper::getCartQuantity($this->table, 'user_id', $ref_id);
        }

        public function getCartById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'user_id', $ref_id);
        }
    }
