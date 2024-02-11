<?php 

    class ServicioMensajes{

        public static function insertarMensaje($mensaje){
            $daoMensajes = new DaoMensajesMySql();
            $daoMensajes->crear($mensaje);
        }

        public static function buscarMensaje($id){
            $daoMensajes = new DaoMensajesMySql();
            return $daoMensajes->buscar($id);
        }

        public static function actualizarMensaje($mensaje){
            $daoMensajes = new DaoMensajesMySql();
            $daoMensajes->actualizar($mensaje);
        }

        public static function eliminarMensaje($id){
            $daoMensajes = new DaoMensajesMySql();
            $daoMensajes->eliminar($id);
        }

        public static function obtenerMensajes(){
            $daoMensajes = new DaoMensajesMySql();
            return $daoMensajes->listar();
        }
    }
?>