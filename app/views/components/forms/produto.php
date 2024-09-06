<?php component('alert-message'); ?>

<form action="<?= $action; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="mb-3">
        <label for="titulo" class="form-label">
            Título<span class="text-danger">*</span>
        </label>
        <input 
            type="text" 
            name="titulo" 
            id="titulo" 
            class="form-control" 
            value="<?= $produto->titulo ?? ''; ?>" 
            required
        >
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="valor" class="form-label">
                    Valor<span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    name="valor" 
                    id="valor" 
                    class="form-control money" 
                    value="<?= $produto->valor ?? ''; ?>" 
                    required
                >
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="quantidade" class="form-label">
                    Quantidade<span class="text-danger">*</span>
                </label>
                <input 
                    type="number" 
                    name="quantidade" 
                    id="quantidade" 
                    class="form-control" 
                    value="<?= $produto->quantidade ?? ''; ?>" 
                    min="0"
                    step="1"
                    required
                >
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="id-categoria" class="form-label">
                    Categoria<span class="text-danger">*</span>
                </label>
                <select 
                    type="text" 
                    name="id_categoria" 
                    id="id-categoria" 
                    class="form-select" 
                    required
                >
                    <option value="">Selecione uma categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option 
                            value="<?= $categoria->id; ?>" 
                            <?= ($categoria->id === ($produto->id_categoria ?? null)) ? 'selected' : ''; ?>
                        >
                            <?= $categoria->nome; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="imagem" class="form-label">
                    Imagem<?php if ($requiredImagem): ?><span class="text-danger">*</span><?php endif ?>
                </label>
                <input 
                    type="file" 
                    name="imagem" 
                    id="imagem" 
                    class="form-control" 
                    accept="images/*"
                    <?= $requiredImagem ? 'required' : ''; ?>
                >
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">
            Descrição<span class="text-danger">*</span>
        </label>
        <textarea 
            name="descricao" 
            id="descricao" 
            class="form-control" 
            rows="6"
            required
        ><?= $produto->descricao ?? ''; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa-regular fa-floppy-disk"></i> Salvar
    </button>

    <a href="<?= route('admin/produto'); ?>" class="btn btn-secondary">
        <i class="fa-regular fa-arrow-left"></i> Voltar
    </a>
</form>