<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Lista de Recomendações</h2>
<?php if(empty($recs)): ?>
    <p>Nenhuma recomendação encontrada.</p>
<?php else: ?>
<table>
    <thead><tr><th>ID</th><th>Livro</th><th>Gênero</th><th>Usuário</th><th>Ações</th></tr></thead>
    <tbody>
    <?php foreach($recs as $r): ?>
        <tr>
            <td><?=htmlspecialchars($r['id'])?></td>
            <td><?=htmlspecialchars($r['livro_recomendado'])?></td>
            <td><?=htmlspecialchars($r['genero_nome'] ?? '-')?></td>
            <td><?=htmlspecialchars($r['usuario_nome'] ?? '-')?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $r['id'] ?>">Editar</a> |
                <a href="index.php?action=delete&id=<?= $r['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>