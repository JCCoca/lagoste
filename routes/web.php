<?php

Route::setGet('', pages('site/home'));
Route::setGet('sobre-nos', pages('site/sobre_nos'));
Route::setGet('fale-conosco', pages('site/fale_conosco'));
Route::setPost('enviar-mensagem', actions('site/enviar_mensagem'));

Route::setGet('login', pages('auth/login'), 'guest');
Route::setPost('authenticate', actions('auth/authenticate'), 'guest');
Route::setGet('logout', actions('auth/logout'), 'auth');

Route::setGet('admin', pages('admin/home'), 'auth');

Route::setGet('admin/categoria', pages('admin/categoria/index'), 'auth');
Route::setGet('admin/categoria/listar', actions('admin/categoria/list'), 'auth');
Route::setGet('admin/categoria/cadastrar', pages('admin/categoria/create'), 'auth');
Route::setPost('admin/categoria/cadastrar', actions('admin/categoria/store'), 'auth');
Route::setGet('admin/categoria/editar', pages('admin/categoria/edit'), 'auth');
Route::setPost('admin/categoria/editar', actions('admin/categoria/update'), 'auth');
Route::setPost('admin/categoria/excluir', actions('admin/categoria/destroy'), 'auth');

Route::setGet('admin/produto', pages('admin/produto/index'), 'auth');
Route::setGet('admin/produto/listar', actions('admin/produto/list'), 'auth');
Route::setGet('admin/produto/cadastrar', pages('admin/produto/create'), 'auth');
Route::setPost('admin/produto/cadastrar', actions('admin/produto/store'), 'auth');
Route::setGet('admin/produto/editar', pages('admin/produto/edit'), 'auth');
Route::setPost('admin/produto/editar', actions('admin/produto/update'), 'auth');
Route::setPost('admin/produto/excluir', actions('admin/produto/destroy'), 'auth');