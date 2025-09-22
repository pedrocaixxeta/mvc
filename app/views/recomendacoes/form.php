<?php include __DIR__ . '/../layout/header.php'; ?>
<?php
$editing = isset($rec) && !empty($rec);
$actionUrl = $editing ? 'index.php?action=update&id=' . $rec['id'] : 'index.php?action=store';
?>
<h2><?= $editing ? 'Editar' : 'Nova' ?> Recomendação</h2>

<?php if(!empty($error)): ?>
    <div class="error"><?=htmlspecialchars($error)?></div>
<?php endif; ?>

<form method="post" action="<?= $actionUrl ?>">
    <label>Usuário (opcional)
        <select name="usuario_id">
            <option value="">-- selecione --</option>
            <?php foreach($usuarios as $u): 
                $sel = ($editing && $rec['usuario_id']==$u['id']) || (isset($_POST['usuario_id']) && $_POST['usuario_id']==$u['id']) ? 'selected' : '';
            ?>
                <option value="<?= $u['id'] ?>" <?= $sel ?>><?= htmlspecialchars($u['nome']) ?> (<?=htmlspecialchars($u['email'])?>)</option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/><br/>
    <label>Gênero
        <select name="genero_id" required>
            <option value="">-- selecione --</option>
            <?php foreach($generos as $g):
                $sel = ($editing && $rec['genero_id']==$g['id']) || (isset($_POST['genero_id']) && $_POST['genero_id']==$g['id']) ? 'selected' : '';
            ?>
                <option value="<?= $g['id'] ?>" <?= $sel ?>><?= htmlspecialchars($g['nome']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/><br/>
    <label>Livro Recomendado
        <input type="text" name="livro_recomendado" value="<?= $editing ? htmlspecialchars($rec['livro_recomendado']) : (htmlspecialchars($_POST['livro_recomendado'] ?? '')) ?>" required/>
    </label>
    <br/><br/>
    <button type="submit"><?= $editing ? 'Salvar alterações' : 'Adicionar' ?></button>
    <a href="index.php">Cancelar</a>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>