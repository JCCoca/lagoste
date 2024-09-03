<?php layout('admin/header', ['title' => 'Categorias', 'active' => 'categoria']); ?>

<div class="row align-items-center mb-3">
    <div class="col-md-6">
        <h3 class="mb-0">Categorias</h3>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= route('admin/categoria/cadastrar'); ?>" class="btn btn-primary">
            <i class="fa-regular fa-plus"></i> Adicionar
        </a>
    </div>
</div>

<div class="card card-body">
    <?php component('alert-message'); ?>

    <table id="table-categoria" class="table table-sm table-striped table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th class="text-center">ID</th>
                <th>Nome</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
    </table>
</div>

<?php component('modal-delete', ['message' => 'Você tem certeza que deseja excluir esta categoria?']); ?>

<script>
    window.addEventListener('load', (event) => {
        window.tableCategoria = myDataTable('#table-categoria', {
            url: `<?= route('admin/categoria/listar'); ?>`,
            columns: [{
                name: 'id',
                data: 'id',
                class: 'text-center',
                width: '15%'
            }, {
                name: 'nome',
                data: 'nome',
                width: '60%'
            }, {
                name: null,
                data: null,
                searchable: false,
                orderable: false,
                class: 'text-center',
                width: '25%',
                render(data){
                    return `
                        <a href="${data.links.edit}" class="btn btn-sm btn-outline-primary">
                            <i class="fa-regular fa-pencil"></i> Editar
                        </a>

                        <button 
                            type="button" 
                            class="btn btn-sm btn-outline-danger"
                            onclick="confirmDelete('${data.links.delete}')"    
                        >
                            <i class="fa-regular fa-trash-alt"></i> Excluir
                        </button>
                    `;
                }
            }]
        });
    });
</script>

<?php  layout('admin/footer'); ?>