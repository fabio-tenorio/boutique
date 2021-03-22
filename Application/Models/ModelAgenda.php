<?php
/*
*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelAgenda extends Model {
    
    public function connect()
    {
        // $this->connectDb();
        echo "Je suis ModelAgenda ";
    }

    // vai no ModelAgenda e parte no ControllerAgenda
    public function selectReservations() {
        $tab=[];
        $pdo=$this->connect_db('reservationsalles');
        $reqlogin = $pdo->prepare("SELECT r.id, r.titre, r.description, r.debut, r.fin, r.id_utilisateur, u.nom, u.login FROM reservations AS r INNER JOIN utilisateurs AS u ON r.id_utilisateur = u.id");
        $reqlogin->execute($tab);
        $result=$reqlogin->fetchAll();
        return $result;
    }

    //méthode pour controler si la demande de réservation est compatible avec les autres réservations déjà enrégistrées
    // vai parte no ControllerAgenda e parte no ModelAgenda
    public function controleHeures ($datedebut, $datefin)
    {
        $datedebut=$this->completedebut;
        $datefin=$this->completefin;
        $pdo = $this->connectdb('reservationsalles');
        $req = $pdo->prepare("SELECT * FROM reservations WHERE 'datedebut' BETWEEN debut AND fin OR 'datefin' BETWEEN debut AND fin");
        $req->execute();
        $result = $req->fetchAll();
//        $result = $req->rowCount();
        if($result == 0)
        {
            return TRUE;
        }
        else
        {
           $erreur = "Votre réservation ne peut pas être enregistrée";
           return $erreur;
        }
    }

    // vai uma parte no ModelAgenda e uma parte no ControllerAgenda
    public function reserver($tab)
    {
        // $allres=selectReservations();        
        // $hashedpass = password_hash($password, PASSWORD_BCRYPT);
        $titre=$tab['titre'];
        $description=$tab['description'];
        $debut=$tab['debut'];
        $fin=$tab['fin'];
        $id_utilisateur=$tab['id_utilisateur'];
        $pdo=$this->connectdb('reservationsalles');
        $sql= "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)";
        $stm=$pdo->prepare($sql);
        $result=$stm->execute(['titre'=>$titre, 'description'=>$description, 'debut'=>$debut, 'fin'=>$fin, 'id_utilisateur'=>$id_utilisateur]);
        return $this->erreur = "votre réservation a bien été prise en compte";
    }

    // vai no ModelAgenda
    public function pickReservation($id)
    {
        $event=[];
        $pdo=$this->connect_db('reservationsalles');
        $req = $pdo->prepare("SELECT * FROM reservations AS r INNER JOIN utilisateurs AS u ON r.id_utilisateur = u.id WHERE r.id = $id");
        $req->execute($event);
        $result=$req->fetchAll();
        return $result;      
    }
}


?>