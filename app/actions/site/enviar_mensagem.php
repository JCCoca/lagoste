<?php 

$nome = input('post', 'nome');
$email = input('post', 'email', 'email');
$telefone = input('post', 'telefone');
$sexo = input('post', 'sexo');
$mensagem = input('post', 'mensagem');

if (
    !empty($nome)
    and !empty($email) 
    and !empty($telefone) 
    and !empty($sexo) 
    and !empty($mensagem) 
) {
    $create = DB::create('fale_conosco', [
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'sexo' => $sexo,
        'mensagem' => $mensagem,
        'data_hora_mensagem' =>  date('Y-m-d H:i:s')
    ]);

    if ($create !== false) {
        redirect('fale-conosco', ['success' => 'Mensagem enviada com sucesso!']);
    } else {
        redirect('fale-conosco', ['error' => 'Houve um erro ao tentar enviar a sua mensagem, por favor tente mais tarde!']);
    }
} else {
    redirect('fale-conosco', ['error' => 'Preencha todos os campos!']);
}