<?php
    require_once 'db/dbhelper.php';

    class Order extends DBHelper
    {
        private $table = 'orders';
        private $fields = array(
            'user_id',
            'cart_id',
            'item_id',
            'order_totalPrice',
            'payment_status',
            'order_date',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllOrders()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getOrderById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'order_id', $ref_id);
        }
    }
