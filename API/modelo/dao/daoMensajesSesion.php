<?php
    class DaoMensajesSesion{
        private static function inicializar(){
            if(!isset($_SESSION["mensajes"])){
                $_SESSION["mensajes"] = array();
            }
        }

        public function crear($mensaje){
            self::inicializar();
            array_push($_SESSION["mensajes"], $mensaje);
        }

        public function buscar($id){
         //TO DO
        }

        public function actualizar($mensaje){
        //TO DO
        }

        public function eliminar($id){
        //TO DO
        }

        public function listar(){
            self::inicializar();
            return $_SESSION["mensajes"];
        }

    }
?>