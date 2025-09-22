<?php
require_once __DIR__ . '/../dao/RecomendacaoDAO.php';
class RecomendacaoService {
    private $dao;
    public function __construct(){
        $this->dao = new RecomendacaoDAO();
    }
    public function listAll(){
        return $this->dao->all();
    }
    public function get($id){
        return $this->dao->find($id);
    }
    public function create($data){
        // validações simples
        $livro = trim($data['livro_recomendado'] ?? '');
        if ($livro === ''){
            throw new Exception('O campo "livro_recomendado" não pode ficar vazio.');
        }
        // opcional: prevenir duplicatas exatas por usuário e gênero
        // (simplificação: não implementado; pode ser adicionado aqui)
        return $this->dao->create($data);
    }
    public function update($id, $data){
        $livro = trim($data['livro_recomendado'] ?? '');
        if ($livro === ''){
            throw new Exception('O campo "livro_recomendado" não pode ficar vazio.');
        }
        return $this->dao->update($id, $data);
    }
    public function delete($id){
        return $this->dao->delete($id);
    }
}
