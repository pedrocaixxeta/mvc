<?php
require_once __DIR__ . '/../config/db.php';
class RecomendacaoDAO {
    private $db;
    public function __construct(){
        $this->db = getPDO();
    }
    public function all(){
        $sql = 'SELECT r.*, u.nome as usuario_nome, g.nome as genero_nome
                FROM recomendacoes r
                LEFT JOIN usuarios u ON u.id = r.usuario_id
                LEFT JOIN generos g ON g.id = r.genero_id
                ORDER BY r.id DESC';
        return $this->db->query($sql)->fetchAll();
    }
    public function find($id){
        $stmt = $this->db->prepare('SELECT * FROM recomendacoes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($data){
        $stmt = $this->db->prepare('INSERT INTO recomendacoes (usuario_id, genero_id, livro_recomendado) VALUES (?, ?, ?)');
        $stmt->execute([$data['usuario_id'] ?: null, $data['genero_id'] ?: null, $data['livro_recomendado']]);
        return $this->db->lastInsertId();
    }
    public function update($id, $data){
        $stmt = $this->db->prepare('UPDATE recomendacoes SET usuario_id = ?, genero_id = ?, livro_recomendado = ? WHERE id = ?');
        return $stmt->execute([$data['usuario_id'] ?: null, $data['genero_id'] ?: null, $data['livro_recomendado'], $id]);
    }
    public function delete($id){
        $stmt = $this->db->prepare('DELETE FROM recomendacoes WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
