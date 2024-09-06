<?php layout('site/header', ['title' => 'Início']); ?>

<?php

    $produtos = DB::query('
        SELECT * FROM produto 
        WHERE 
            excluido_em IS NULL 
        ORDER BY 
            RAND()
    ')->fetchAll();

?>

<div class="container py-4">
    <h2 class="text-center mb-4">
        Lançamentos
    </h2>

    <div class="row">
        <?php foreach ($produtos as $produto): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img 
                        src="<?= storage($produto->imagem); ?>" 
                        class="card-img-top" 
                        style="
                            object-fit: cover;
                            object-position: top;
                            width: 100%;
                            height: 250px;
                        "
                    >
                    <div class="card-body">
                        <h5 class="card-title"><?= $produto->titulo; ?></h5>
                        <p class="card-text">
                            <?= $produto->descricao; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg btn-pill btn-hover-scale">
            <i class="fa-regular fa-basket-shopping-plus"></i> Adquira Agora
        </button>
    </div>
</div>

<?php layout('site/footer'); ?>