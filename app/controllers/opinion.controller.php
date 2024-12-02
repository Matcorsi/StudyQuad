<?php
    require 'app/models/opinion.model.php';
    require 'app/models/profesor.model.php';
    require 'app/views/form.alta.phtml';

    class OpinionController{
        private $modelOpinion;
        private $modelProfesor;
        private $view;

        public function __construct() {
            $this->modelOpinion = new OpinionModel();
            $this->modelProfesor = new ProfesorModel();
            $this->view = new View();
        }

        public AddOpinion(){
            if(!isset($_POST['dni']) || empty($_POST['dni'])){
                $this->view->showError('Falta completar el dni');
            }

            if(!isset($_POST['fecha']) || empty($_POST['fecha'])){
                $this->view->showError('Falta completar la fecha');
            }

            if(!isset($_POST['reputacion']) || empty($_POST['reputacion'])){
                $this->view->showError('Falta completar la reputacion');
            }

            if(!isset($_POST['id_profesor']) || empty($_POST['id_profesor'])){
                $this->view->showError('Falta completar el profesor');
            }

            $dni = $_POST['dni'];
            $fecha = $_POST['fecha'];
            $reputacion = $_POST['reputacion'];
            $id_profesor = $_POST['id_profesor'];

            $id = $this->model->insertOpinion($dni, $fecha, $reputacion, $id_profesor);
            $this->view->showMensaje('Se agrego con exito' + $id);
        }

    }