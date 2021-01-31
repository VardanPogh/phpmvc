<?php

class DB {

	private $conn;
	private $query;

	public function __construct()
	{
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->conn = $conn;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
	}

	public function prepare($sql)
	{
	    $this->query = $this->conn->prepare($sql);
	}

	public function bindParam($type, $values = []) {
        $this->query->bind_param($type, ...$values);
    }

	public function select() {
        $result = $this->query;
        $data = [];
        if ($result->num_rows > 0) {
            while ($row_user = $result->fetch_assoc()) {
                $data[] = $row_user;
            }
        }
        return $data;
    }

    public function query($sql) {
        $this->query = $this->conn->query($sql);
    }


    public function execute() {
        $this->query->execute();
    }
    public function getResult() {
	    return $this->query->get_result();
    }

}