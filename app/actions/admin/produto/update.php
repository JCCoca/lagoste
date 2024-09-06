<?php

$id = input('get', 'id', 'integer');
$titulo = input('post', 'titulo');
$valor = input('post', 'valor', 'money');
$quantidade = input('post', 'quantidade', 'integer');
$id_categoria = input('post', 'id_categoria', 'integer');
$descricao = input('post', 'descricao');

if (
    !empty($id) 
    and !empty($titulo)
    and !empty($valor)
    and !empty($quantidade)
    and !empty($id_categoria)
    and !empty($descricao)
) {
    $data = [
        'titulo' => $titulo,
        'valor' => $valor,
        'quantidade' => $quantidade,
        'id_categoria' => $id_categoria,
        'descricao' => $descricao,
        'atualizado_em' => date('Y-m-d H:i:s')
    ];

    if (isset($_FILES['imagem']) and $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $fileManager = new FileManager();
        $data['imagem'] = $fileManager->upload($_FILES['imagem'], 'produto');

        $produto = DB::query('SELECT * FROM produto WHERE id = :id', [
            ':id' => $id
        ])->fetch();
    }

    $result = DB::update('produto', $data, [
        'id' => $id
    ]);

    if ($result !== false) {
        if (isset($_FILES['imagem']) and $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            @$fileManager->destroy($produto->imagem);
        }

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