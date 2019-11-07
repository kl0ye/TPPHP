<?php
    class Commentaire
    {
        private $id;
        private $id_billet;
        private $pseudo;
        private $commentaire;
        private $date_commentaire;
        
        public function __construct (array $data) {
           $this->hydrate($data);
        }

        public function hydrate($data) {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
            if (isset($data['id_billet'])) {
                $this->setIdBillet($data['id_billet']);
            }
            if (isset($data['pseudo'])) {
                $this->setPseudo($data['pseudo']);
            }
            if (isset($data['commentaire'])) {
                $this->setCommentaire($data['commentaire']);
            }
            if (isset($data['date_commentaire_fr'])) {
                $this->setDateCommentaire($data['date_commentaire_fr']);
            }

        }

        //Getter
        
        public function getId() {
            return $this->id;
        }
        public function getIdBillet() {
            return $this->id_billet;
        }
        public function getPseudo() {
            return $this->pseudo;
        }
        public function getCommentaire() {
            return $this->commentaire;
        }
        public function getDateCommentaire() {
            return $this->date_commentaire;
        }
        
        //Setter

        public function setId($id) {
            $this->id = $id;
        }
        public function setIdBillet($id_billet) {
            $this->id_billet = $id_billet;
        }
        public function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
        }
        public function setCommentaire($commentaire) {
            $this->commentaire = $commentaire;
        }
        public function setDateCommentaire($date) {
            $this->date_commentaire = $date;
        }
    }