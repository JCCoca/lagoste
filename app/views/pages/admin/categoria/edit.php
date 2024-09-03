<?php layout('admin/header', ['title' => 'Editar Categoria', 'active' => 'categoria']); ?>

<?php

    $id = input('get', 'id', 'integer');

    $categoria = DB::query('SELECT * FROM categoria WHERE id = :id', [':id' => $id]);

    if (empty($id) or $categoria->rowCount() == 0) {
        show401();
    }

?>

<h3 class="mb-3">Editar Categoria</h3>

<div class="card card-body">
    <?php 
        component('forms/categoria', [
            'action' => route('admin/categoria/editar', ['id' => $id]),
            'categoria' => $categoria->fetch()
        ]);
    ?>
</div>

<?php  layout('admin/footer'); ?>