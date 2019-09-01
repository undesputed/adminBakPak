<?php
    require_once 'db/dbhelper.php';

    class Notification extends DBHelper
    {
        private $table = 'notification';
        private $fields = array(
            'name',
            'message',
            'status',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getNotif()
        {
            return DBHelper::getNotification();
        }

        public function updateNotification($data, $ref_id)
        {
            return DBHelper::updateNotif($data, 'id', $ref_id);
        }

        public function getAllNotif()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function deleteNotif($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'id', $ref_id);
        }
    }
