<?php layout('admin/header', ['title' => 'Editar Produto', 'active' => 'produto']); ?>

<?php

    $id = input('get', 'id', 'integer');

    $produto = DB::query('SELECT * FROM produto WHERE id = :id', [':id' => $id]);

    if (empty($id) or $produto->rowCount() == 0) {
        show401();
    }

?>

<h3 class="mb-3">Editar Produto</h3>

<div class="card card-body">
    <?php 
        component('forms/produto', [
            'action' => route('admin/produto/editar', ['id' => $id]),
            'produto' => $produto->fetch()
        ]);
    ?>
</div>

<?php  layout('admin/footer'); ?>