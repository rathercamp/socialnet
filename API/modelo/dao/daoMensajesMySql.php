<?php
    class DaoMensajesMySql{
        public function crear($mensaje){
            $depago = $mensaje->tipoUsuario == "pago" ? 1 : 0;
            $fecha = $mensaje->fecha->format("c");
            $consulta = "INSERT INTO mensajes(nombre, texto, depago, fecha) 
                        VALUES (?, ?, ?, ?)";

            Mysqlbd::consultaEscritura($consulta, $mensaje->nombre, $mensaje->texto, $depago, $fecha);
        }

        public function buscar($id){
            $resultado = Mysqlbd::consultaLectura("SELECT * FROM mensajes WHERE id = ?", $id);
            if(count($resultado) < 1){
                return null;
            }else{
                return $this->mensajeFromValueArray($resultado[0]);
            }
        }

        public function actualizar($mensaje){
            $depago = $mensaje->tipoUsuario == "pago" ? 1 : 0;
            $fecha = $mensaje->fecha->format("c");
            $consulta = "UPDATE mensajes SET nombre = ?, texto = ?, depago = ?, fecha = ? WHERE id = ?";

            Mysqlbd::consultaEscritura($consulta, $mensaje->nombre, $mensaje->texto, $depago, $fecha, $mensaje->id);
        }

        public function eliminar($id){
            $consulta = "DELETE FROM mensajes WHERE id = ?";

            Mysqlbd::consultaEscritura($consulta, $id);
        }

        public function listar(){
            $resultado = Mysqlbd::consultaLectura("SELECT * FROM mensajes");

            $retorno = array();
            foreach($resultado as $fila){
                $mensaje = $this->mensajeFromValueArray($fila);
                array_push($retorno, $mensaje);
            }
            return $retorno;
        }

        private function mensajeFromValueArray($fila){
            $depago = $fila["depago"] ? "pago" : "normal";
            $fecha = new Datetime($fila["fecha"]);
            return $mensaje = new Mensaje($fila["id"], $fila["nombre"], $fila["texto"], $depago , $fecha);

        }
    }
?>