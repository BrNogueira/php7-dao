<?php

require_once("config.php");
    //carrega um usuario
    // $root = new Usuario();

    // $root->loadById(3);

    // echo $root;
    //========================================================
   
    //carrega uma lista de usuarios

    // $lista = Usuario::getList();

    // echo json_encode($lista);

    //========================================================

    //carrega uma lista de usuários buscando pelo login

   // $search = Usuario::search("jose");
    //  echo json_encode($search);

   //========================================================= 
    //carrega um susário usando o login 

    // $usuario = new Usuario();
    // $usuario->login("root","root");

    // echo $usuario;

    //========================================================= 

    $search = Usuario::search("ro");
    echo json_encode($search);
?>