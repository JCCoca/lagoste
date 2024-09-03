<?php layout('site/header', ['title' => 'Início']); ?>

<div class="container py-4">
    <h2 class="text-center mb-4">
        Lançamentos
    </h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="<?= asset('images/banner1.jpeg'); ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Social</h5>
                    <p class="card-text">
                        A moda social combina estilo e responsabilidade, promovendo práticas éticas e sustentáveis na produção e consumo de roupas. 
                        Ela valoriza a transparência, a justiça social e o impacto positivo, priorizando materiais ecológicos e o apoio a comunidades e trabalhadores.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="<?= asset('images/banner2.jpeg'); ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Inverno</h5>
                    <p class="card-text">
                        A moda inverno destaca conforto e elegância, com peças quentes e estilosas como casacos de lã, cachecóis, suéteres e botas. 
                        Os tecidos são mais pesados, com cores sóbrias e texturas ricas, proporcionando proteção e sofisticação nos dias frios.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <img src="<?= asset('images/banner3.jpeg'); ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Casual</h5>
                    <p class="card-text">
                        A moda casual é descontraída e prática, ideal para o dia a dia. Inclui peças como jeans, camisetas, tênis e suéteres, combinando conforto e estilo sem formalidade. 
                        É versátil, permitindo expressar personalidade com simplicidade e funcionalidade em diversos contextos.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg btn-pill btn-hover-scale">
            <i class="fa-regular fa-basket-shopping-plus"></i> Adquira Agora
        </button>
    </div>
</div>

<?php layout('site/footer'); ?>