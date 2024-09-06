<?php layout('admin/header', ['title' => 'Produtos', 'active' => 'produto']); ?>

<div class="row align-items-center mb-3">
    <div class="col-md-6">
        <h3 class="mb-0">Produtos</h3>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= route('admin/produto/cadastrar'); ?>" class="btn btn-primary">
            <i class="fa-regular fa-plus"></i> Adicionar
        </a>
    </div>
</div>

<div class="card card-body">
    <?php component('alert-message'); ?>

    <table id="table-produto" class="table table-sm table-striped table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th class="text-center">ID</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
    </table>
</div>

<?php component('modal-delete', ['message' => 'Você tem certeza que deseja excluir esta produto?']); ?>

<script>
    window.addEventListener('load', (event) => {
        window.tableProduto = myDataTable('#table-produto', {
            url: `<?= route('admin/produto/listar'); ?>`,
            columns: [{
                name: 'id',
                data: 'id',
                class: 'text-center',
                width: '10%'
            }, {
                name: 'titulo',
                data: 'titulo',
                width: '20%'
            }, {
                name: 'valor',
                data: 'valor',
                width: '15%'
            }, {
                name: 'quantidade',
                data: 'quantidade',
                width: '15%'
            }, {
                name: 'nome_categoria',
                data: 'nome_categoria',
                width: '15%'
            },{
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