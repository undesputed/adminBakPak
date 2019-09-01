<?php

session_start();
class DBHelper
{
    //properties
    private $hostname = 'localhost'; //127.0.0.1
    private $username = 'root';
    private $password = '';
    private $database = 'bakpak';
    private $conn;

    // Constructor
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Login
    public function logginUser($data)
    {
        $flag = false;
        $sql = 'SELECT * FROM USER WHERE user_username = ? AND user_password = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $_SESSION['user'] = $row['user_lname'].','.$row['user_fname'];
            $_SESSION['user_id'] = $row['user_id'];
            $flag = true;
        } else {
            echo "<script> alert('Error'); </script>";
        }
        $this->conn = null;

        return $flag;
    }

    public function logginAdmin($data)
    {
        $flag = false;
        $sql = 'SELECT * FROM admin WHERE username = ? AND password = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $_SESSION['admin'] = $row['fname'].','.$row['lname'];
            $_SESSION['admin_id'] = $row['id'];
            $flag = true;
        } else {
            echo "<script> alert('Error'); </script>";
        }

        $sthis->conn = null;

        return $flag;
    }

    // Create
    public function insertRecord($data, $fields, $table)
    {
        $ok;
        $fld = implode(',', $fields);
        $q = array();
        foreach ($data as $d) {
            $q[] = '?';
        }
        $plc = implode(',', $q);
        $sql = "INSERT INTO $table($fld) VALUES($plc)";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ok;
    }

    // Retrieve
    public function getAllRecord($table)
    {
        $rows;
        $sql = "SELECT * FROM $table";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $rows;
    }

    public function getAllProducts($table)
    {
        $rows;
        $sql = "SELECT * FROM $table LIMIT 4";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $rows;
    }

    public function getNewArrival($table)
    {
        date_default_timezone_set('Asia/Manila');
        $startDate = date('Y-m-d');
        $date = DateTime::createFromFormat('Y-m-d', $startDate);
        $limitDate = $date->modify('-15 day');
        $newArrival = $limitDate->format('Y-m-d');
        $rows;
        $sql = "SELECT * FROM $table WHERE prod_date_added <= ".$startDate.' AND prod_date_added >= '.$newArrival;
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOExceptio $e) {
            echo $e->getMessage();
        }
        echo $sql;
        // return $rows;
    }

    //-----
    public function getRecordById($table, $field_id, $ref_id)
    {
        $sql = "SELECT * FROM $table WHERE $field_id = ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($ref_id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
        // $this->conn = null;
    }

    //---
    public function getRecord($table, $field_id, $ref_id)
    {
        $row;
        $sql = "SELECT * FROM $table WHERE $field_id = ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($ref_id));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    public function checkRecord($data, $table)
    {
        $flag = false;
        $sql = 'SELECT * FROM $table WHERE user_id = ? AND prod_id = ?';
        $stmt = $this->conn->prepare($sql);
        $ok = $stmt->execute($data);
        $row = $ok->fetch(PDO::FETCH_ASSOC);
        if ($ok) {
            $flag = true;
        } else {
            echo "<script> alert('Error'); </script>";
        }

        return $flag;
    }

    public function getRecordByDateRange($table, $ref_id, $owner, $ref_id2, $diary, $from, $until)
    {
        $row;
        $sql = "SELECT * FROM $table WHERE $ref_id = ? && $ref_id2 = ? AND story_date BETWEEN ? AND ? ORDER BY story_date";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($owner, $diary, $from, $until));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    public function searchRecord($table, $keyword)
    {
        $row;
        $sql = "SELECT * FROM $table WHERE story_title like ? OR story_content like ? OR story_status like ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%'));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    public function searchRecordByid($table, $ref_id, $owner, $keyword)
    {
        $row;
        $sql = "SELECT * FROM $table WHERE $ref_id = ? and story_title like ? OR story_content like ? OR story_status like ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($owner, '%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%'));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    public function searchRecordDiary($table, $keyword)
    {
        $row;
        $sql = "SELECT * FROM $table WHERE diary_label like ? OR diary_status like ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array('%'.$keyword.'%', '%'.$keyword.'%'));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    // Update
    public function updateRecord($table, $fields, $data, $field_id, $ref_id)
    {
        $ok;
        $flds = implode('=?,', $fields).'=?';
        $sql = "UPDATE $table SET $flds WHERE $field_id=$ref_id";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        echo $ok;
        // return $ok;
    }

    public function statusUpdate($table, $fields, $data, $field_id, $ref_id)
    {
        $ok;
        $sql = "UPDATE user SET user_status=? where $field_id = $ref_id";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        echo $ok;
    }

    public function updateStatus($table, $field_id, $ref_id)
    {
        $sql = "UPDATE $table SET user_status='INACTIVE' WHERE $field_id = $ref_id";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ok;
    }

    public function getqty($table, $ref_id)
    {
        $row;
        $sql = "SELECT * from $table where prod_id = ?";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($ref_id));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
    }

    // Delete
    public function deleteRecord($table, $field_id, $ref_id)
    {
        $ok;
        $sql = "DELETE FROM $table WHERE $field_id=?";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute(array($ref_id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ok;
    }

    // Some functions
    public function countRecord($field, $table)
    {
        $sql = "SELECT count($field) FROM $table";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
        // $this->conn = null;
    }

    public function countRecordGroup($field, $other, $countName, $table, $ref_id)
    {
        $sql = "SELECT $other,count($field) AS $countName  FROM $table group by $ref_id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $row;
        // $this->conn = null;
    }

    //
    // function destroy(){
    //     $this->conn=null;
    // }
    public function getByRelation($table, $fields_id, $ref_id, $data)
    {
        // $tables = implode(",",$table);
        $sql = "SELECT * FROM $table WHERE $fields_id = $ref_id AND $fields_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getAllRecordId($field, $table)
    {
        $rows;
        $sql = "SELECT $field FROM $table";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $rows;
    }

    //----- STORED PROCEDure
    public function getProcedure($table)
    {
        $rows;
        $sql = 'call display'.$table.'()';
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $rows;
    }

    public function getNotification()
    {
        $rows;
        $sql = "SELECT * FROM notification WHERE status = 'UNREAD'";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $rows;
    }

    public function updateNotif($data, $field_id, $ref_id)
    {
        $ok;
        $sql = "UPDATE notification SET status=? WHERE $field_id = $ref_id ";
        try {
            $stmt = $this->conn->prepare($sql);
            $ok = $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ok;
    }

    public function getCartQuantity($table, $field_id, $ref_id)
    {
        $ok;
        $sql = "SELECT SUM(quantity) as qty FROM $table where $field_id = $ref_id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ok = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ok;
    }
}
