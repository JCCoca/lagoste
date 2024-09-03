<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php @layout('head', ['title' => $title]); ?>
    <script src="<?= asset('js/sidebar.js'); ?>"></script>
</head>
<body style="background-color: var(--bs-secondary-bg); height: 100%;">
    <div id="sidebar">
        <?php layout('admin/sidebar', ['active' => $active]); ?>
    </div>
    <div id="content">
        <nav class="navbar bg-white" style="height: 70px;">
            <div class="container-fluid">
                <button 
                    type="button" 
                    id="btn-toggler-sidebar" 
                    class="navbar-toggler" 
                    data-open="true"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="dropdown">
                    <a 
                        href="#" 
                        class="
                            d-flex 
                            align-items-center 
                            justify-content-between 
                            text-decoration-none 
                            dropdown-toggle
                        " 
                        style="color: #e61942;"
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        <div class="d-flex align-items-center">
                            <img src="<?= asset('images/profile.jpg'); ?>" width="32" height="32" class="rounded-circle me-2">
                            <strong><?= getSession()['auth']['nome']; ?></strong>
                        </div>
                    </a>
                    <ul class="dropdown-menu shadow me-2">
                        <li>
                            <a  href="#" class="dropdown-item">
                                <i class="fa-regular fa-user me-2"></i> Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="<?= route('logout'); ?>" class="dropdown-item">
                                <i class="fa-regular fa-arrow-right-from-bracket me-2"></i> Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4" style="min-height: calc(100vh - (56px + 70px));">