<?php
    class OpinionModel{
        private $db;

        public function __construct() {
            $this->db = new PDO(
                "mysql:host=".MYSQL_HOST .
                ";dbname=".MYSQL_DB.";charset=utf8", 
                MYSQL_USER, MYSQL_PASS);
        }
        public function getOpinion(){
            $query = $this->db->prepare('SELECT * FROM opinion');
            $query->execute();

            $opiniones = $query->fetchAll(PDO::FETCH_OBJ); 

            return $opiniones;
        }
         
        public function InsertOpinion($dni, $fecha, $reputacion, $id_profesor){
            $query = $this->db->prepare('INSERT INTO opinion ($dni, $fecha, $reputacion, $id_profesor) VALUES ( ?, ?, ?, ?)');
             $query->execute([$dni, $fecha, $reputacion, $id_profesor]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
        }
   
    }