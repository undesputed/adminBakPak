<?php
    require_once 'db/dbhelper.php';

    class Delivery extends DBHelper
    {
        private $table = 'delivery';
        private $fields = array(
            'user_id',
            'delivery_status',
            'order_id',
            'delivery_date',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllDelivery()
        {
            return DBHelper::getAllRecord($this->table);
        }
    }
