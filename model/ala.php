<?php

class ala {
    public $id_ala;
    public $hospital;
    public $especialidade;
    public $nome;
    public $quant;
    
    function add(){
        try{
            $sql = "insert into endereco (hospital, especialiade, nome, quant) 
            values (:hospital, :especialidade, :nome, :quant)";
            require_once("dao.php");
            $dao = new Dao;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":hospital", $this->hospital);
            $stman->bindParam(":especialidade", $this->especialidade);
            $stman->bindParam(":nome", $this->nome);
            $stman->bindParam(":quant", $this->quant);
            $stman->execute();  
            aviso("Cadastrado!");        
        } catch(PDOException $e){
            erro("Erro! " . $e->getMessage());
        }
    }
}

