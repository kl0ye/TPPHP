<?php
    class CommentairesManager {
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

        public function get($idBillet) {
            $req = $this->db->prepare('SELECT id, id_billet, pseudo, commentaire, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire');
            $req->execute([
                'id_billet' => $idBillet
            ]);
            return new Commentaire($req->fetch());
        }

        public function getOne($id) {
            $req = $this->db->prepare('SELECT id, id_billet, pseudo, commentaire, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
            return new Commentaire($req->fetch());
        }

        public function getAllCommentaire($idBillet) {
            $data = [];
            $req = $this->db->prepare('SELECT id, id_billet, pseudo, commentaire, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire');
            $req->execute([
                'id_billet' => $idBillet
            ]);
            while ($liste = $req->fetch()) {
                $data[] = new Commentaire($liste);
            }
            return $data;
        }

        public function getListCommentaire() {
            $data = [];
            $req = $this->db->query('SELECT id, id_billet, pseudo, commentaire, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires ORDER BY date_commentaire');
            while ($liste = $req->fetch()) {
                $data[] = new Commentaire($liste);
            }
            return $data;
        }

        public function add($idBillet, $pseudo, $commentaire) {
            $req =  $this->db->prepare('INSERT INTO commentaires (id_billet, pseudo, commentaire, signaler, date_commentaire) VALUES(:id_billet, :pseudo, :commentaire, 0, NOW())');
            $req->execute([
                'id_billet' => $idBillet,
                'pseudo' => $pseudo,
                'commentaire' => $commentaire
                ]);
        }

        public function delete($id)
        {
            $reqDeleteCom = $this->db->prepare('DELETE FROM commentaires WHERE id = :id');
            $reqDeleteCom->execute([
                'id' => $id
            ]);
        }

        public function signal($id)
        {
            $reqSignalCom = $this->db->prepare('UPDATE commentaires SET signaler = 1 WHERE id = :id');
            $reqSignalCom->execute([
                'id' => $id
            ]);
        }

        public function approuve($id)
        {
            $reqSignalCom = $this->db->prepare('UPDATE commentaires SET signaler = 0 WHERE id = :id');
            $reqSignalCom->execute([
                'id' => $id
            ]);
        }
    }
