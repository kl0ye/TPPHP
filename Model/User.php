<?php
    class User 
    {
        private $id;
        private $pseudo;
        private $pass;
        private $email;
        private $date_inscription;
        
        public function __construct (array $data) {
           $this->hydrate($data);
        }

        public function hydrate($data) {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
            if (isset($data['pseudo'])) {
                $this->setPseudo($data['pseudo']);
            }
            if (isset($data['pass'])) {
                $this->setPass($data['pass']);
            }
            if (isset($data['email'])) {
                $this->setEmail($data['email']);
            }
            if (isset($data['date_inscription'])) {
                $this->setDateInscription($data['date_inscription']);
            }

        }
        
        public function getId() {
            return $this->id;
        }
        public function getPseudo() {
            return $this->pseudo;
        }
        public function getPass() {
            return $this->pass;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getDateInscription() {
            return $this->date_inscription;
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
        }
        public function setPass($pass) {
            $this->pass = $pass;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setDateInscription($date) {
            $this->date_inscription = $date;
        }
    }