<?php component('alert-message'); ?>

<form action="<?= $action; ?>" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="nome" class="form-label">
            Nome<span class="text-danger">*</span>
        </label>
        <input 
            type="text" 
            name="nome" 
            id="nome" 
            class="form-control" 
            value="<?= $categoria->nome ?? ''; ?>" 
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa-regular fa-floppy-disk"></i> Salvar
    </button>

    <a href="<?= route('admin/categoria'); ?>" class="btn btn-secondary">
        <i class="fa-regular fa-arrow-left"></i> Voltar
    </a>
</form>