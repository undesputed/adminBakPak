<?php
    require_once 'db/dbhelper.php';

    class Log extends DBHelper
    {
        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function login($data)
        {
            return DBHelper::logginAdmin($data);
        }
    }
