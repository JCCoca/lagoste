<?php

$nome = input('post', 'nome');

if (!empty($nome)) {
    $idCategoria = DB::create('categoria', [
        'nome' => $nome,
        'criado_em' => date('Y-m-d H:i:s')
    ]);

    if ($idCategoria !== false) {
        redirect('admin/categoria/cadastrar', [
            'success' => 'Cadastro realizado com sucesso!'
        ]);
    } else {
        redirect('admin/categoria/cadastrar', ['
            error' => 'Houve um erro ao tentar realizar o cadastro, por favor tente mais tarde!'
        ]);
    }
} else {
    redirect('admin/categoria/cadastrar', [
        'error' => 'Preencha todos os campos obrigatórios!'
    ]);
}