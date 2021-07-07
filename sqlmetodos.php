<?php
  require 'conexion.php';
  
    class Consultainfo extends Connectsisanti{
        
        public function __construct(){
            parent::__construct();
        }
        
        /*Método Getter devuelve Select de La base de Datos SISANTI*/
        public function get_informacion($sql){
            try{
                $query = $this->conexionBBDD->prepare($sql);
                $query->execute(array());
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                $query->closeCursor();
                return $resultado;
                $this->conexionBBDD = null;
            
            }catch (Exception $e){
                die("Error con la Conexi&oacute;n de la BBDD de FUERZA DE TAREA".$e);
            }
            
        }
        
        /*Método Setter inserta información en la base de datos FUERZA DE TAREA*/
        public function set_informacion($sql){
            try {
                $query = $this->conexionBBDD->prepare($sql);
                $query->execute(array());
                $query->closeCursor();
                $this->conexionBBDD = null;
                
            } catch (Exception $e) {
                echo $e->getMessage()."<br/>";
                die("Error con la Conexi&oacute;n de la BBDD de Fuerza de Tarea no lo hagas");
            }
        }
        
        /*Metodo para ver duplicados y conteo de registros*/
        public function duplicados_registros($sql){
            try {
                $query = $this->conexionBBDD->prepare($sql);
                $query->execute(array());
                //$resultado = $query->fetchColumn();
                $num_filas = $query->rowCount();
                $query->closeCursor();
                return $num_filas;
                
                $this->conexionBBDD = null;
                
            } catch (Exception $e) {
                die("Error con la Conexi&oacute;n de la BBDD de Fuerza de Tarea");
            }
        }
        
    }

?>