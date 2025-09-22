<?php
require_once __DIR__ . '/../services/RecomendacaoService.php';
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../dao/GeneroDAO.php';

class RecomendacaoController {
    private $service;
    private $usuarioDAO;
    private $generoDAO;
    public function __construct(){
        $this->service = new RecomendacaoService();
        $this->usuarioDAO = new UsuarioDAO();
        $this->generoDAO = new GeneroDAO();
    }

    public function index(){
        $recs = $this->service->listAll();
        include __DIR__ . '/../views/recomendacoes/list.php';
    }

    public function create(){
        $usuarios = $this->usuarioDAO->all();
        $generos = $this->generoDAO->all();
        include __DIR__ . '/../views/recomendacoes/form.php';
    }

    public function store(){
        try{
            $data = [
                'usuario_id' => $_POST['usuario_id'] ?: null,
                'genero_id' => $_POST['genero_id'] ?: null,
                'livro_recomendado' => $_POST['livro_recomendado'] ?? ''
            ];
            $this->service->create($data);
            header('Location: index.php');
            exit;
        } catch(Exception $e){
            $error = $e->getMessage();
            $usuarios = $this->usuarioDAO->all();
            $generos = $this->generoDAO->all();
            include __DIR__ . '/../views/recomendacoes/form.php';
        }
    }

    public function edit($id){
        $rec = $this->service->get($id);
        $usuarios = $this->usuarioDAO->all();
        $generos = $this->generoDAO->all();
        include __DIR__ . '/../views/recomendacoes/form.php';
    }

    public function update($id){
        try{
            $data = [
                'usuario_id' => $_POST['usuario_id'] ?: null,
                'genero_id' => $_POST['genero_id'] ?: null,
                'livro_recomendado' => $_POST['livro_recomendado'] ?? ''
            ];
            $this->service->update($id, $data);
            header('Location: index.php');
            exit;
        } catch(Exception $e){
            $error = $e->getMessage();
            $rec = $this->service->get($id);
            $usuarios = $this->usuarioDAO->all();
            $generos = $this->generoDAO->all();
            include __DIR__ . '/../views/recomendacoes/form.php';
        }
    }

    public function delete($id){
        $this->service->delete($id);
        header('Location: index.php');
        exit;
    }
}
