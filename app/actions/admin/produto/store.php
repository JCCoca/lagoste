<?php

$nome = input('post', 'nome');

if (!empty($nome)) {
    $idProduto = DB::create('produto', [
        'nome' => $nome,
        'criado_em' => date('Y-m-d H:i:s')
    ]);

    if ($idProduto !== false) {
        redirect('admin/produto/cadastrar', [
            'success' => 'Cadastro realizado com sucesso!'
        ]);
    } else {
        redirect('admin/produto/cadastrar', ['
            error' => 'Houve um erro ao tentar realizar o cadastro, por favor tente mais tarde!'
        ]);
    }
} else {
    redirect('admin/produto/cadastrar', [
        'error' => 'Preencha todos os campos obrigatórios!'
    ]);
}