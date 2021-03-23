<?php
/*
*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelAgenda extends Model {
    
    // vai no ModelAgenda e parte no ControllerAgenda
    public function selectReservations() {
        $tab=[];
        $pdo=$this->connect_db('boutique');
        $reqlogin = $pdo->prepare("SELECT r.id, r.id_utilisateur, r.titrereservation, r.typeevenement, r.datedebut, r.heuredebut FROM reservation AS r INNER JOIN utilisateurs AS u ON r.id_utilisateur = u.id");
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
        $pdo = $this->connect_db('reservationsalles');
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
        $id_utilisateur=$tab['id_utilisateur'];
        $titrereservation=$tab['titrereservation'];
        $datedebut=$tab['datedebut'];
        // $heuredebut=$tab['heuredebut'];
        $pdo=$this->connect_db('boutique');
        $sql= "INSERT INTO reservation (id_utilisateur, titrereservation, datedebut) VALUES (:id_utilisateur, :titrereservation, :datedebut)";
        $stm=$pdo->prepare($sql);
        $result=$stm->execute(['id_utilisateur'=>$id_utilisateur, 'titrereservation'=>$titrereservation, 'datedebut'=>$datedebut]);
        return $result;
        // return $this->erreur = "votre réservation a bien été prise en compte";
    }

    // vai no ModelAgenda
    public function pickReservation($id)
    {
        $event=[];
        $pdo=$this->connect_db('boutique');
        $req = $pdo->prepare("SELECT * FROM reservation AS r INNER JOIN utilisateurs AS u ON r.id_utilisateur = u.id WHERE r.id = $id");
        $req->execute($event);
        $result=$req->fetchAll();
        return $result;      
    }
}


?>