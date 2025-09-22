<?php
require_once __DIR__ . '/../config/db.php';
class UsuarioDAO {
    private $db;
    public function __construct(){
        $this->db = getPDO();
    }
    public function all(){
        $stmt = $this->db->query('SELECT * FROM usuarios ORDER BY nome');
        return $stmt->fetchAll();
    }
    public function find($id){
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($data){
        $stmt = $this->db->prepare('INSERT INTO usuarios (nome, email) VALUES (?, ?)');
        $stmt->execute([$data['nome'], $data['email']]);
        return $this->db->lastInsertId();
    }
}
