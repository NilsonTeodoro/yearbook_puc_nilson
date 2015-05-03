<?php
    require_once("participantes.php");

    class turma
    {
        public $participantes;
        
        function __construct()
        {
            $this->participantes = array();
        }	

        function addParticipante($participante){
           array_push($this->participantes, $participante);
        }

        function mostrar(){
           foreach($this->participantes as $participante){
               $participante->mostraDados();
             }
        }
    }

?>