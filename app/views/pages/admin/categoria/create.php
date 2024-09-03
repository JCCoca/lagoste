<?php layout('admin/header', ['title' => 'Cadastrar Categoria', 'active' => 'categoria']); ?>

<h3 class="mb-3">Cadastrar Categoria</h3>

<div class="card card-body">
    <?php 
        component('forms/categoria', [
            'action' => route('admin/categoria/cadastrar')
        ]); 
    ?>
</div>

<?php  layout('admin/footer'); ?>