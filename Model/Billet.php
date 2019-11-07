<?php
    class Billet
    {
        private $id;
        private $titre;
        private $contenu;
        private $date_creation;
        
        public function __construct (array $data) {
           $this->hydrate($data);
        }

        public function hydrate($data) {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
            if (isset($data['titre'])) {
                $this->setTitre($data['titre']);
            }
            if (isset($data['contenu'])) {
                $this->setContenu($data['contenu']);
            }
            if (isset($data['date_creation_fr'])) {
                $this->setDateCreation($data['date_creation_fr']);
            }

        }
        
        public function getId() {
            return $this->id;
        }
        public function getTitre() {
            return $this->titre;
        }
        public function getContenu() {
            return $this->contenu;
        }
        public function getDateCreation() {
            return $this->date_creation;
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setTitre($titre) {
            $this->titre = $titre;
        }
        public function setContenu($contenu) {
            $this->contenu = $contenu;
        }
        public function setDateCreation($date) {
            $this->date_creation = $date;
        }
    }