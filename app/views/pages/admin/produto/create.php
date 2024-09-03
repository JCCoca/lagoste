<?php layout('admin/header', ['title' => 'Cadastrar Produto', 'active' => 'produto']); ?>

<h3 class="mb-3">Cadastrar Produto</h3>

<div class="card card-body">
    <?php 
        component('forms/produto', [
            'action' => route('admin/produto/cadastrar')
        ]); 
    ?>
</div>

<?php  layout('admin/footer'); ?>