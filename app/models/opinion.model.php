<?php
    class OpinionModel{
        private $db;

        public function __construct(){
            $this->db =  new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        }

        public function getOpiniones(){
            $query = $this->db->prepare('SELECT * FROM opinion');
            $query->execute();
            $opiniones = $query->fetchAll(PDO::FETCH_OBJ);
            return $opiniones;
        }

        public function getOpinionXFecha($fecha){
            $query = $this->db->prepare('SELECT * FROM opinion WHERE fecha = ?');
            $query->execute([$fecha]);
            $opiniones = $query->fetchAll(PDO::FETCH_OBJ);
            return $opiniones;
        }

        public function getOpinionesDni($dni){
            $query = $this->db->prepare('SELECT * FROM opinion WHERE dni = ?');
            $query->execute([$dni]);
            $opiniones_dni = $query->fetchAll(PDO::FETCH_OBJ);
            return $opiniones_dni;
        }

        public function getOpinion($id){
            $query = $this->db->prepare('SELECT * FROM opinion WHERE id = ?');
            $query->execute([$id]);
            $opinion = $query->fetch(PDO::FETCH_OBJ);
            return $opinion;
        }

        public function addOpinion($dni,$fecha,$reputacion,$id_profesor){
            $query = $this->db->prepare('INSERT INTO opinion(dni, fecha, reputacion,id_profesor) VALUES (?,?,?,?)');
            $query->execute([$dni,$fecha,$reputacion,$id_profesor]);
            $id = $this->db->lastInsertId();
            return $id;
        }

        public function updateOpinion($dni,$fecha,$reputacion,$id_profesor,$id){
            $query = $this->db->prepare('UPDATE opinion SET dni = ?, fecha = ?, reputacion = ?, id_profesor = ? WHERE id = ?');
            $query->execute([$dni,$fecha,$reputacion,$id_profesor, $id]);
        }

        public function deleteOpinion($id){
            $query = $this->db->prepare('DELETE FROM opinion WHERE id = ?');
            $query->execute([$id]);
        }

   
    }