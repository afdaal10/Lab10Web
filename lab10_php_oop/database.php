<?php

class Database {

    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        include_once("config.php");
        $this->host     = $config['host'];
        $this->user     = $config['username'];
        $this->password = $config['password'];
        $this->db_name  = $config['db_name'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        if ($where) {
            $where = " WHERE $where";
        }
        $sql = $this->conn->query("SELECT * FROM $table $where");
        return $sql->fetch_assoc();
    }

    public function insert($table, $data) {
        if (!is_array($data)) return false;

        foreach ($data as $key => $val) {
            $col[] = $key;
            $valArr[] = "'$val'";
        }

        $columns = implode(",", $col);
        $values  = implode(",", $valArr);

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    public function update($table, $data, $where) {
        foreach ($data as $key => $val) {
            $update[] = "$key = '$val'";
        }

        $updateValue = implode(",", $update);
        $sql = "UPDATE $table SET $updateValue WHERE $where";
        return $this->conn->query($sql);
    }

    public function delete($table, $filter) {
        $sql = "DELETE FROM $table $filter";
        return $this->conn->query($sql);
    }
}
?>
