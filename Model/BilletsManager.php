<?php
    class BilletsManager {
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

        public function add($titre, $contenu) 
        {
            $req = $this->db->prepare('INSERT INTO billet (titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
            $req->execute([
                'titre' => $titre, 
                'contenu' => $contenu, 
            ]);
        }

        public function getAfterAdd($contenu) 
        {
            $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet WHERE contenu = :contenu');
            $req->execute([
                'contenu' => $contenu
            ]);
            return new Billet($req->fetch());
        }

        public function get($id) 
        {
            $req = $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
            if ($data = $req->fetch())
                return new Billet($data);
            else 
                return false;
        }

        public function getAllBillet() {
            $data = [];
            $req = $this->db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY date_creation');
            while ($liste = $req->fetch()) {
                $data[] = new Billet($liste);
            }
            return $data;
        }

        public function getAllIdBillet() {
            $data = [];
            $req = $this->db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY date_creation');
            while ($liste = $req->fetch()) {
                $data[] = $liste['id'];
            }
            return $data;
        }

        public function getLastBillet() {
            $req = $this->db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY id DESC LIMIT 1');
            if ($data = $req->fetch())
                return new Billet($data);
            else 
                return false;
        }

        public function update($titre, $contenu, $id) 
        {
            $reqUpdate =  $this->db->prepare('UPDATE billet SET titre = :titre , contenu = :contenu WHERE billet . id = :id');
            $reqUpdate->execute([
                    'titre' => $titre, 
                    'contenu' => $contenu, 
                    'id' => $id
            ]);
        }

        public function delete($id)
        {
            $reqDeleteArticle = $this->db->prepare('DELETE FROM billet WHERE id = :id');
            $reqDeleteArticle->execute([
                'id' => $id
            ]);
        }
    }