<?php
    require 'app/models/opinion.model.php';
    require 'app/models/profesor.model.php';
    require 'app/views/opiniones.phtml';
    
    class OpinionController{
       private $modelOpinion;
       private $modelProfesor;
       private $view;

       public function __construct(){
        $this->modelOpinion = new OpinionModel();
        $this->modelProfesor = new ProfesorModel();
        $this->view = new OpinionView();
       }

       // listar todo
       public function showOpiniones(){
         $opiniones = $this->modelOpinion->getOpiniones();
         $profesores = $this->modelProfesor->getProfesores();

         $this->view->showOpiniones($opiniones,$profesores);
       }

       // insert opinion
       public function insertOpinion(){
            if(!isset($_POST['dni']) || empty($_POST['dni'])){
                // $this->view->showError('Falta completar este campo');
            }
            if(!isset($_POST['fecha']) || empty($_POST['fecha'])){
                // $this->view->showError('Falta completar este campo');
            }if(!isset($_POST['reputacion']) || empty($_POST['reputacion'])){
                // $this->view->showError('Falta completar este campo');
            }if(!isset($_POST['id_profesor']) || empty($_POST['id_profesor'])){
                // $this->view->showError('Falta completar este campo');
            }

            $dni = $_POST['dni'];
            $fecha = $_POST['fecha'];
            $reputacion = $_POST['reputacion'];
            $id_profesor = $_POST['id_profesor'];

            $opiniones_dni = $this->modelOpinion->getOpinionesDni($dni);

            foreach($opiniones_dni as $opinion){
                if($opinion->id_profesor == $id_profesor){
                    echo 'Usted ya califico a este profesor';
                } else {
                    $this->modelOpinion->addOpinion($dni,$fecha,$reputacion,$id_profesor);
                    // $this->view->showMessage('Opinion agregada con exito');
                    header('Location: ' . BASE_URL);
                }
            }
            
       }

       // eliminar opinion
       public function eraseOpinion($id){
            $opinion = $this->modelOpinion->getOpinion($id);
             if(!$opinion){
                echo 'No existe la opinion';
             }

            $this->modelOpinion->deleteOpinion($id);
            
       }

       // modificar opinion
       public function updateOpinion($id,$dni,$fecha,$reputacion,$id_profesor){
            $opinion = $this->modelOpinion->getOpinion($id);
            if(!$opinion){
                // $this->view->showError('No existe la opinion');
            }
            $this->modelOpinion->updateOpinion($id,$dni,$fecha,$reputacion,$id_profesor);

       }

       public function getOpinionXfecha($fecha){
            $opinion = $this->modelOpinion->getOpinionXFecha($fecha);
            $profesores = $this->modelProfesor->getProfesores();
            if($opinion){
                $this->view->showOpiniones($opinion,$profesores);
            }
       }


      }