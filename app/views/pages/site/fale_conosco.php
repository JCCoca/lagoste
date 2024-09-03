<?php layout('site/header', ['title' => 'Fale Conosco']); ?>

<div class="container py-4">
    <h2 class="text-center mb-4">
        Fale Conosco
    </h2>

    <?php component('alert-message'); ?>

    <form action="<?= route('enviar-mensagem'); ?>" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input 
                type="text" 
                name="nome" 
                id="nome" 
                class="form-control" 
                value="<?= getSession()['auth']['nome'] ?? ''; ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control"
                value="<?= getSession()['auth']['email'] ?? ''; ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input 
                type="tel" 
                name="telefone" 
                id="telefone" 
                class="form-control"
            >
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" id="sexo" class="form-select">
                <option selected>Selecione um sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea 
                name="mensagem" 
                id="mensagem" 
                class="form-control" 
                rows="6"
            ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-regular fa-paper-plane"></i> Enviar
        </button>
        <button type="reset" class="btn btn-secondary">
            <i class="fa-regular fa-eraser"></i> Limpar
        </button>
    </form>
</div>

<?php layout('site/footer'); ?>