<nav class="d-flex flex-column h-100">
    <div class="d-flex align-items-center justify-content-center">
        <a href="<?= route(''); ?>">
            <img 
                src="<?= asset('images/logo_horizontal_branca.png'); ?>" 
                style="width: 220px; height: auto;"
            >
        </a>
    </div>

    <hr>

    <ul class="nav nav-pills nav-lagoste flex-column">
        <li class="nav-item">
            <a href="<?= route('admin'); ?>" class="nav-link text-white <?= $active === 'home' ? 'active' : ''; ?>">
                <i class="fa-regular fa-house me-2"></i> Inicio
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= route('admin/categoria'); ?>" class="nav-link text-white <?= $active === 'categoria' ? 'active' : ''; ?>">
                <i class="fa-regular fa-tags me-2"></i> Categorias
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= route('admin/produto'); ?>" class="nav-link text-white <?= $active === 'produto' ? 'active' : ''; ?>">
                <i class="fa-regular fa-boxes-stacked me-2"></i> Produtos
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-white <?= $active === 'usuario' ? 'active' : ''; ?>">
                <i class="fa-regular fa-users me-2"></i> Usuários
            </a>
        </li>
    </ul>
</nav>