<?php

$id = input('get', 'id', 'integer');
$nome = input('post', 'nome');

if (!empty($id) and !empty($nome)) {
    $result = DB::update('produto', [
        'nome' => $nome,
        'atualizado_em' => date('Y-m-d H:i:s')
    ], [
        'id' => $id
    ]);

    if ($result !== false) {
        redirect('admin/produto/editar', [
            'id' => $id,
            'success' => 'Edição realizada com sucesso!'
        ]);
    } else {
        redirect('admin/produto/editar', [
            'id' => $id,
            'error' => 'Houve um erro ao tentar realizar a edição, por favor tente mais tarde!'
        ]);
    }
} else {
    redirect('admin/produto/cadastrar', [
        'id' => $id,
        'error' => 'Preencha todos os campos obrigatórios!'
    ]);
}