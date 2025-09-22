<?php
// Simple front controller and router
require_once __DIR__ . '/app/config/db.php';
require_once __DIR__ . '/app/controllers/RecomendacaoController.php';

$controller = new RecomendacaoController();

// very small router using "action" param
$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch($action){
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
