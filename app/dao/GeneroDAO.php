<?php
require_once __DIR__ . '/../config/db.php';
class GeneroDAO {
    private $db;
    public function __construct(){
        $this->db = getPDO();
    }
    public function all(){
        $stmt = $this->db->query('SELECT * FROM generos ORDER BY nome');
        return $stmt->fetchAll();
    }
    public function find($id){
        $stmt = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
