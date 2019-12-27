<?php
    class UserManager {
        private $db;

        public function __construct()
        {
            try
            {
                $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

        }

        public function get($pseudo) {
            $req = $this->db->prepare('SELECT id, pseudo, pass, email FROM users WHERE pseudo = :pseudo');
            $req->execute([
                'pseudo' => $pseudo
            ]);
            return new User($req->fetch());
        }
        public function getAllUsers() {
            $data = [];
            $req = $this->db->query('SELECT id, pseudo, pass, email FROM users');
            while ($liste = $req->fetch()) {
                $data[] = new User($liste);
            }
            return $data;
        }

    }