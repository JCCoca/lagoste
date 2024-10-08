<?php

require 'app/repositories/DataTableRepository.php';

$dataTable = new DataTableRepository('produto');

$dataTable
    ->select('produto.*, categoria.nome AS nome_categoria')
    ->join('categoria', 'produto.id_categoria', '=', 'categoria.id');

$dataTable->formatData(function($data){
    return [
        'id' => $data->id,
        'titulo' => $data->titulo,
        'valor' => $data->valor,
        'quantidade' => $data->quantidade,
        'nome_categoria' => $data->nome_categoria,
        'links' => [
            'edit' => route('admin/produto/editar', ['id' => $data->id]),
            'delete' => route('admin/produto/excluir', ['id' => $data->id])
        ],
    ];
});

responseJson($dataTable->get());