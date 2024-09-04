<?php layout('admin/header', ['title' => 'Cadastrar Produto', 'active' => 'produto']); ?>

<h3 class="mb-3">Cadastrar Produto</h3>

<?php 

    $categorias = DB::query('SELECT * FROM categoria WHERE excluido_em IS NULL ORDER BY nome ASC');

?>

<div class="card card-body">
    <?php 
        component('forms/produto', [
            'action' => route('admin/produto/cadastrar'),
            'categorias' => $categorias->fetchAll(),
            'requiredImagem' => true
        ]); 
    ?>
</div>

<?php  layout('admin/footer'); ?>