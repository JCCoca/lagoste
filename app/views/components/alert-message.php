<?php if (isset($_GET['success']) and !empty($_GET['success'])): ?>
    <div class="alert alert-success mb-3" role="alert">
        <?= $_GET['success']; ?>
    </div>
<?php elseif (isset($_GET['error']) and !empty($_GET['error'])): ?>
    <div class="alert alert-danger mb-3" role="alert">
        <?= $_GET['error']; ?>
    </div>
<?php endif ?>