<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php @layout('head', ['title' => $title]); ?>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-lagoste">
            <div class="container">
                <a href="<?= route(''); ?>" class="navbar-brand">
                    <img src="<?= asset('images/logo_horizontal.png'); ?>" class="navbar-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route(''); ?>">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('sobre-nos'); ?>">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('fale-conosco'); ?>">Fale Conosco</a>
                        </li>
                        <?php if (isGuest()): ?>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary my-1" href="<?= route('login'); ?>">Login</a>
                            </li>
                        <?php endif ?>

                        <?php if (isAuth()): ?>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary my-1" href="<?= route('admin'); ?>">Painel Admin</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>