<?php

$titulo = input('post', 'titulo');
$valor = input('post', 'valor', 'money');
$quantidade = input('post', 'quantidade', 'integer');
$id_categoria = input('post', 'id_categoria', 'integer');
$descricao = input('post', 'descricao');

if (
    !empty($titulo)
    and !empty($valor)
    and !empty($quantidade)
    and !empty($id_categoria)
    and !empty($descricao)
    and isset($_FILES['imagem'])
) {
    $fileManager = new FileManager();

    $dirImagem = $fileManager->upload($_FILES['imagem'], 'produto');

    $idProduto = DB::create('produto', [
        'titulo' => $titulo,
        'valor' => $valor,
        'quantidade' => $quantidade,
        'id_categoria' => $id_categoria,
        'imagem' => $dirImagem,
        'descricao' => $descricao,
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