<?php
class Especialidade{
    public $id_especialidade;
    public $especialidade;
    public $valor_dia;

    //ID ---------------------
    public function getId(){
        return $this->id_especialidade;
    }

    public function setId($id){
        $this->id_especialidade=$id;
    }

    //especialidade -----------
    public function getEspecialiade(){
        return $this->especialidade
    }

    public function setEspecialidade($especialidade){
        $this->especialidade = $especialidade;
    }

    //Valor -------------------
    public function getValor_dia(){
         return $this->valor_dia;
    }

    public function getValor_dia($valor_dia){
        $this->valor_dia = $valor_dia;
    }


   function add()
    {
        try { 
            $sql = "insert into especialidade(especialidade, valor_dia) value (:especialidade, :valor)";
            require_once("dao.php");
            $dao = new Dao;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":especialidade",getEspecialidade());
            $stman->bindParam(":valor",getValor_dia());
            $stman->execute();

            aviso("cadastrado!");

        } catch (Exception $e) {
            erro("Erro ao cadastrar " .  $e->getMessage());
        }
    }



    function listAll()
    {
        $result=null;
        try { 
            $sql = "select * from especialidade";
            require_once("dao.php");
            $dao = new Dao;
            $stman = $dao->conecta()->prepare($sql);
            $stman->execute();
            $result = $stman->fetchall(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            erro("Erro ao listar" .  $e->getMessage());
        }
        return $result;
    }
}