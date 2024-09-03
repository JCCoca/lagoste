<?php

$id = input('get', 'id', 'integer');

if (!empty($id)) {
    $result = DB::update('categoria', [
        'excluido_em' => date('Y-m-d H:i:s')
    ], [
        'id' => $id
    ]);

    if ($result !== false) {
        redirect('admin/categoria', [
            'success' => 'Exclução realizada com sucesso!'
        ]);
    } else {
        redirect('admin/categoria', [
            'error' => 'Houve um erro ao tentar realizar a exclusão, por favor tente mais tarde!'
        ]);
    }
} else {
    redirect('admin/categoria', [
        'error' => 'Por favor, informe o ID!'
    ]);
}