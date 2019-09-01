<?php
     require_once 'db/dbhelper.php';

     class Bundled_item extends DBHelper
     {
         private $table = 'bundle';
         private $fields = array(
             'item_id',
             'date_added',
             'item_name_bundled',
         );

         public function __construct()
         {
             return DBHelper::__construct();
         }

         public function addBundle($data)
         {
             return DBHelper::insertRecord($data, $this->fields, $this->table);
         }
     }
