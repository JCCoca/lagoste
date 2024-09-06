<?php

$id = input('get', 'id', 'integer');

if (!empty($id)) {
    $result = DB::update('produto', [
        'excluido_em' => date('Y-m-d H:i:s')
    ], [
        'id' => $id
    ]);

    if ($result !== false) {
        $produto = DB::query('SELECT * FROM produto WHERE id = :id', [
            ':id' => $id
        ])->fetch();

        $fileManager = new FileManager();

        $fileManager->destroy($produto->imagem);
        
        redirect('admin/produto', [
            'success' => 'Exclução realizada com sucesso!'
        ]);
    } else {
        redirect('admin/produto', [
            'error' => 'Houve um erro ao tentar realizar a exclusão, por favor tente mais tarde!'
        ]);
    }
} else {
    redirect('admin/produto', [
        'error' => 'Por favor, informe o ID!'
    ]);
}