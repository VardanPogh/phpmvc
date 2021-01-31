<?php

class Task
{

    private $db;
    private $table = 'task';

    public function __construct()
    {
        $this->db = new DB;
    }

    public function store($name, $email, $text)
    {
        $this->db->prepare("INSERT INTO {$this->table} (`name`, `email`, `text`, `status`) VALUES (?, ?, ?, ?)");
        $this->db->bindParam('ssss', [$name, $email, $text, 0]);

        return $this->db->execute();
    }

    public function edit($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        return $this->db->select()[0];
    }

    public function update($id, $text, $status)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        $oldText = $this->db->select()[0]['text'];
        $isEdited = false;
        $query = false;
        if ($oldText != $text) {
            $isEdited = true;
        }

        if ($isEdited == true) {
            if (isset($status)) {
                $this->db->prepare("UPDATE {$this->table} SET text = ?, status = ?, is_edited = true WHERE id = ?");
                $this->db->bindParam('sss', [$text, $status, $id]);
            } else {
                $this->db->prepare("UPDATE {$this->table} SET is_edited = true, text = ? WHERE id = ?");
                $this->db->bindParam('ss', [$text, $id]);
            }
            $query = true;
        } else {
            if (isset($status)) {
                $this->db->prepare("UPDATE {$this->table} SET status = ? WHERE id = ?");
                $this->db->bindParam('ss', [$status, $id]);
                $query = true;
            }
        }
        if ($query) {
            return $this->db->execute();
        }
        return false;
    }

    public function destroy($id)
    {
        $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $this->db->bindParam('s', [$id]);
        return $this->db->execute();
    }

    public function select($limit, $offset = 0, $orderBy = ['id', 'ASC'], $column = '*')
    {
        $this->db->query("SELECT {$column} FROM {$this->table} ORDER BY {$orderBy[0]} {$orderBy[1]} LIMIT {$offset}, {$limit}");
        return $this->db->select();
    }

    public function getCount()
    {
        $this->db->query("SELECT COUNT('id') as count FROM {$this->table}");
        return $this->db->select();
    }

}