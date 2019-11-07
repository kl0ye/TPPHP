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
            $req = $this->db->prepare('SELECT id, id_billet, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire');
            $req->execute([
                'id_billet' => $idBillet
            ]);
            return new Commentaire($req->fetch());
        }

        public function getAllCommentaire($idBillet) {
            $req = $this->db->prepare('SELECT id, id_billet, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire');
            $req->execute([
                'id_billet' => $idBillet
            ]);
            while ($liste = $req->fetch()) {
                $commentaire = new Commentaire($liste);
                echo '<div class="show-commentaires">
                <p>
                    <strong> ' . htmlspecialchars($commentaire->getPseudo()) .' </strong> 
                    <em class="small-date">le '. $commentaire->getDateCommentaire().'</em>
                </p>
                <p class="ml-3">'.nl2br(htmlspecialchars($commentaire->getCommentaire())).'</p>
               </div><br />';
            }
            /*while ($commentaire = $req->fetch()) {
                $commentaire = new Commentaire($commentaire);
                var_dump($commentaire);
            }*/
        }


    }
