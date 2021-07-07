<?php
/*Clase conexi�n que efectua la interacci�n con la BBDD sisanti*/

require "config.php";
    class Connectsisanti {
        protected $conexionBBDD;
        
        public function __construct(){
            try{
            $this->conexionBBDD = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NOMBRE,DB_USUARIO,DB_PASS);
            $this->conexionBBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexionBBDD->exec(DB_CHARSET);
            
            return $this->conexionBBDD;
            
            }catch (Exception $e){
                echo "<script> alert('ERROR EN LA CONEXION DE LA BASE DE DATOS\n VERIFIQUE CON EL ADMINISTRADOR');</script>";
            }
        }
    }
?>