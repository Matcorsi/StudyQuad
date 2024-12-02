<?php
    require 'app/models/opinion.model.php';
    require 'app/views/opiniones.phtml';
    
    class OpinionController{
        private $modelOpinion;
        private $view;

        public function __construct() {
            $this->modelOpinion = new OpinionModel();
            $this->view = new OpinionView();
            
        }

        public function listarOpiniones(){
                //obtengo los jugadores de la DB
                $opiniones = $this->modelOpinion->getOpinion();

                //mando los jugadores a la vista
                $this->view->showOpiniones($opiniones);
            }
            public function AddOpinion()
            {
                if(!isset($_POST['dni']) || empty($_POST['dni'])){
                    echo 'error';
    
                }
    
                if(!isset($_POST['fecha']) || empty($_POST['fecha'])){
                    echo 'error';
                }
    
                if(!isset($_POST['reputacion']) || empty($_POST['reputacion'])){
                    echo 'error';
                }
                if(!isset($_POST['id_profesor']) || empty($_POST['id_profesor'])){
                    echo 'error';
                }
    
                $dni = $_POST['dni'];
                $fecha = $_POST['fecha'];
                $reputacion = $_POST['reputacion'];
                $id_profesor = $_POST['id_profesor'];
    
                $id = $this->modelOpinion->insertOpinion($dni, $fecha, $reputacion, $id_profesor);
            
            }



      }