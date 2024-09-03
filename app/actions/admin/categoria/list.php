<?php

require 'app/repositories/DataTableRepository.php';

$dataTable = new DataTableRepository($_GET, 'categoria', true);

$dataTable->formatData(function($data){
    return [
        'id' => $data->id,
        'nome' => $data->nome,
        'links' => [
            'edit' => route('admin/categoria/editar', ['id' => $data->id]),
            'delete' => route('admin/categoria/excluir', ['id' => $data->id])
        ],
    ];
});

responseJson($dataTable->get());