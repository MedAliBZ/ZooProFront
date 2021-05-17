<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function profile() {
        $this->view('profile');
    }

    public function resetPass(){
        $this->view('resetPass');
    }

    public function resetKey(){
        $this->view('resetKey');
    }

    public function getUsername(){
        $this->view('getUsername');
    }

    public function detailplante(){
        $this->view('detailplante');
    }

    public function plante(){
        $this->view('plante');
    }

    public function detailAnimal() {
        $this->view('detailAnimal');
    }

    public function animaux() {
        $this->view('animaux');
    }

     public function enclos() {
        $this->view('enclos');
    }

    public function animauxInEnclos() {
        $this->view('animauxInEnclos');
    }
    
    public function evenement() {
        $this->view('evenement');
    }

    
    public function sponsor() {
        $this->view('sponsor');
    }



}
