<?php

/* controller dédié aux réservations de rdv sur place à l'onglerie
* et à l'éventuel paiement en amont des prestations préalablement choisies sur le créneau
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelAgenda;
use DateTime;

class ControllerAgenda extends Controller {

    public $creneau;
    public $lundi;

    public function __construct()
    {
        $this->agenda = new ModelAgenda;
        
        // les infos pour remplir le créneau
        
        $this->jour = new \DateTime();
        $this->an = $this->jour->format('Y');
        $this->semaine = $this->jour->format('W');
        $this->mois = $this->jour->setISODate($this->an, $this->semaine);
        // le nombre du mois courant
        $this->mois = $this->jour->format('m');
        // le lundi (jour 01) de la semaine courante
        // $this->jour->setTime(0, 0, 0);
        if ($this->jour->format('N') === 1) {
            // If the date is already a Monday, return it as-is
            $this->lundi = $this->jour;
        } else {
            // Otherwise, return the date of the nearest Monday in the past
            // This includes Sunday in the previous week instead of it being the start of a new week
            $this->lundi = $this->jour->modify('last monday');
        }        
        // $this->lundi = $this->jour->format('d');
        $this->dimanche = new \DateTime();
        $this->dimanche = $this->jour->add(new \DateInterval('P6D'));
        $this->message = '';
    }

    public function setLundi ($date) {
            if ($date instanceof \DateTime) {
                $date = clone $date;
            } elseif (!$date) {
                $date = new \DateTime();
            } else {
                $date = new \DateTime($date);
            }
    
            $date->setTime(0, 0, 0);
    
            if ($date->format('N') == 1) {
                // If the date is already a Monday, return it as-is
                return $this->lundi = $date;
            } else {
                // Otherwise, return the date of the nearest Monday in the past
                // This includes Sunday in the previous week instead of it being the start of a new week
                return $this->lundi= $date->modify('last monday');
            }
    }

    // LA GESTION DES DONNÉES

    public function pickHour($string)
    {
        if (is_string($string)) {
            return $string[11].$string[12];    
        } else
        {
            return "ce n'est pas une chaîne de caractères";
        }
    }

    // méthode pour controler si les donnés de la réservation sont cohérents avec le jour et l'heure au moment de la réservation

    public function checkMoment($data)
    {
        $now = new DateTime();
        // $now = $now->format('Y-m-d H:00:00');
        $reservation = new DateTime($data);
        // $reservation = $reservation->format('Y-m-d H:00:00');
        // var_dump($day);
        $interval = $now->diff($reservation);
        echo $interval->days;
        // echo "la difference entre ".$now." et ".$data." est ".$difference;
    }

    // public function checkConflict($data)
    // {
    //     $allResa = $this->all_reservations();
    //     $cetteResa = explode (' ', $data['datedebut']);
    //     // var_dump($allResa);
    //     $check = true;
    //     foreach($allResa as $value) {
    //         foreach($value as $key => $property) {
    //             if ($key=='datedebut')
    //             {
    //                 $autreResa = explode(' ', $property);
    //                 if ($cetteResa[0] == $autreResa[0])
    //                 {
    //                     if ($cetteResa[1] == $autreResa[1])
    //                     {
    //                         $check = false;
    //                     }
    //                     else
    //                     {
    //                         $check = true;
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $check = true;
    //                 }
    //             }
    //         }
    //     }
    //     if ($check === true)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    // méthode qui regroupe tous les contrôles sur le formulaire
    // il faut utiliser le triple égal pour que tous les contrôles marchent bien
    // vai no ControllerAgenda
    public function checkAll($data)
    {
        if ($this->checkMoment($data)===true)
        {
            // if ($this->checkConflict($data)===true) {
                return true;
            // }
            // else
            // {
            //     return $this->message = 'Cet horaire est déjà réservé';
            // }
        }
        else
        {
            return $this->message = "Ce n'est plus possible de faire cette réservation";
        }
    }
    
  //  cette méthode retourne le numéro des jours de la semaine en cours
   public function week()
   {
      $datetime=new \DateTime;
      return $datetime->format('D');
   }

   // LES REQUÊTES
   public function reserverCreneau($date, $heure)
   {
    // condition pour vérifier si les contrôles retournent true
        $data = [];
        if (isset($_POST['reserver']) && isset($_SESSION)) {
            $data['id_utilisateur']=$_SESSION["user"]->id;
            $data['titrereservation']=$_POST['titrereservation'];
            $data['datedebut']=''.$date.' '.$heure;
            if ($this->checkAll($data['datedebut'])===true)
            {
                $this->agenda->reserver($data);
                $this->index();
            } else
            {
                $this->index();
            }
        }
   }

   public function all_reservations () {
       return $this->agenda->get_all('reservation');
   }

   public function one_reservation($id) {
        return $this->agenda->get_one('reservation', $id);
   }

   public function supprimer_reservation($id) {
       $this->agenda->delete('reservation', $id);
       $this->index();
   }

    // LES VIEWS

    public function affichageTableau($row, $col)
    {
        for ($i=0;$i<$row;$i++)
        {
            $dayNum=$col+5;
            for ($j=$col;$j<$dayNum;$j++)
            {
            $tableau[$i][$j]="test";
            }
        }
        return $tableau;
    }

    public function index()
    {
        $this->allResa = $this->all_reservations();
        $this->render('agenda', $this->allResa);
    }

    public function formResaView($date, $heure)
    {   
        $this->creneau = [$date, $heure];
        $this->render('agendaform', $this->creneau);
    }

    public function supprimeResaView($id)
    {
        $this->creneau = $this->one_reservation($id);
        $this->render('agendasupprime', $this->creneau);
    }

}


?>