<?php 
    class Conectar{
        protected $dbh;

        Protected function conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:host=52.152.236.67;dbname=g1_20","G1_20","fVl9pd2E");
                return $conectar;
            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>