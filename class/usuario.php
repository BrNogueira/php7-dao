<?php

class Usuario {
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    public function getDeslogin() {
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }


    public function getDessenha() {
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDtcadastro() {
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadById($id){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM dbphp7.tb_usuarios WHERE id = :ID", array(":ID"=>$id
    ));
        if (count($results) > 0) {
            
            $row = $results[0];
            $this->setIdusuario($row['id']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
    }
    public function getList(){
        $sql = new Sql();

        return $sql->select("SELECT * FROM dbphp7.tb_usuarios ORDER BY deslogin");
    }

    public function search($login) {
        $sql = new Sql();

        return $sql->select("SELECT * FROM dbphp7.tab_usuarios Where deslogin LIKE :SEARCH ORDER BY deslogin", array(
         ':SEARCH'=>"%".$login."%"
        ));
    }
    public function login($login, $password){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM dbphp7.tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
    ));
        if (count($results) > 0) {
            
            $row = $results[0];
            $this->setIdusuario($row['id']);

            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        } else {
            Throw new Exception("Login e/ou senha inválidos.");
        }
    }

    public function __toString() {
        return json_encode(array(
            "id"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()
        ));
    }
}

?> 