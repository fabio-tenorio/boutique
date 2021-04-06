<?php

/* controller dédié aux réservations de rdv sur place à l'onglerie
* et à l'éventuel paiement en amont des prestations préalablement choisies sur le créneau
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelAgenda;
use DateInterval;
use DateTime;

class ControllerAgenda extends Controller {

    public $mainteant;
    public $lundi;
    public $dimanche;
    public $joursDeLaSemaine;
    public $creneaux;

    public function setMaintenant() {
        $this->maintenant = new DateTime();
        return $this->maintenant;
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
            return $this->lundi= $date->modify('last monday');
        }
    }

    public function setDimanche($lundi) {
        if ($lundi instanceof \DateTime) {
            $lundi = clone $lundi;
        } elseif (!$lundi) {
            $lundi = new \DateTime();
        } else {
            $lundi = new \DateTime($lundi);
        }
        $lundi->setTime(23, 59, 59);
        return $this->dimanche = $lundi->add(new \DateInterval('P6D'));
    }

    public function setJoursDeLaSemaine($lundi) {
        list($an, $mois, $jour) = explode("-", $lundi->format('Y-m-d'));
        // Get the weekday of the given date
        $chaqueJour = date('l',mktime('0','0','0', $mois, $jour, $an));
        switch($chaqueJour) {
            case 'Monday': $nombreDeJours = 0; break;
            case 'Tuesday': $nombreDeJours = 1; break;
            case 'Wednesday': $nombreDeJours = 2; break;
            case 'Thursday': $nombreDeJours = 3; break;
            case 'Friday': $nombreDeJours = 4; break;
            case 'Saturday': $nombreDeJours = 5; break;
            case 'Sunday': $nombreDeJours = 6; break;   
        }
        // Timestamp of the monday for that week
        $lundi = mktime('0','0','0', $mois, $jour-$nombreDeJours, $an);
        $secondesParJour = 86400;
        // Get date for 7 days from Monday (inclusive)
        for($i=0; $i<7; $i++)
        {
            $joursDeLaSemaine[$i] = date('d-m-Y',$lundi+($secondesParJour*$i));
        }
        return $joursDeLaSemaine;
    }

    public function setCreneaux(array $jours) {
        $creneaux = [];
        foreach ($jours as $value) {
            
            for ($i=0;$i<12;$i++) {
                $heure = $i + 8;
                $creneaux[$value][$i] = $value." ".$heure.":00:00";
                $creneaux[$value][$i] = strtotime($creneaux[$value][$i]);
                $creneaux[$value][$i] = date("d/m/Y H:i:s", $creneaux[$value][$i]);
            }
        }
        return $creneaux;
    }
    
    public function __construct()
    {
        $this->agenda = new ModelAgenda;
        // les infos pour remplir le créneau
        $this->maintenant = new DateTime();
        if ($this->maintenant->format('N') == 1) {
            $this->lundi = $this->maintenant;
        } else {
            $this->lundi = $this->maintenant->modify('last monday');
        }
        $this->an = $this->maintenant->format('Y');
        $this->semaine = $this->maintenant->format('W');
        $this->mois = $this->maintenant->setISODate($this->an, $this->semaine);
        $this->mois = $this->maintenant->format('m');
        $this->dimanche = new \DateTime();
        
        $this->message = '';
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
        $interval = $now->diff($reservation);
        $negative = ( $interval->invert ? '-' : '' );
        if ($negative.$interval->d > 0) {
            if ($reservation->format('H') >= 8 || $reservation->format('H') <= 20) {
                return true;
            } else {
                return false;
            }
        } elseif ($interval->d == 0) {
            if ($negative.$interval->h > 1) {
                if ($reservation->format('H') >= 8 || $reservation->format('H') <= 20) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function checkConflict($data)
    {
        $allResa = $this->all_reservations();
        $check = true;
        foreach($allResa as $value) {
            foreach($value as $key => $property) {
                if ($key=='datedebut')
                {
                    if ($data === $property)
                    {
                        $check = false;
                    }
                    else
                    {
                        $check = true;
                    }
                }
            }
        }
        if ($check === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // méthode qui regroupe tous les contrôles sur le formulaire
    // il faut utiliser le triple égal pour que tous les contrôles marchent bien
    // vai no ControllerAgenda
    public function checkAll($data)
    {
        if ($this->checkMoment($data)===true)
        {
            if ($this->checkConflict($data)===true) {
                return true;
            }
            else
            {
                return $this->message = 'Cet horaire est déjà réservé';
            }
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
   public function reserverCreneau($datetime)
   {
    // condition pour vérifier si les contrôles retournent true
        $data = [];
        if (isset($_POST['reserver']) && isset($_SESSION)) {
            $data['id_utilisateur']=$_SESSION["user"]->id;
            $data['titrereservation']=$_POST['titrereservation'];
            $data['datedebut']= $datetime;
            if ($this->checkAll($data['datedebut'])===true)
            {
                $this->agenda->reserver($data);
                $this->message = 'réservation réussie';
                $this->index($this->message);
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

    public function index($message = '')
    {
        $this->allResa = $this->all_reservations();
        $this->render('agenda', $this->allResa);
    }

    public function formResaView($jour, $mois, $an, $heure)
    {   
        $date = $an."-".$mois."-".$jour;
        $this->creneau = $date.' '.$heure;
        $this->creneau = date('Y-m-d H:00:00', strtotime($this->creneau));
        $this->render('agendaform', $this->creneau);
    }

    public function supprimeResaView($id)
    {
        $this->creneau = $this->one_reservation($id);
        $this->render('agendasupprime', $this->creneau);
    }

    public function semaineEnPlus($lundi) {
        $this->autreSemaine = true;
        $lundi = new DateTime($lundi);
        $this->setLundi($lundi->add(new DateInterval('P1W')));
        $this->index();
    }

    public function semaineEnMoins($lundi) {
        $this->autreSemaine = true;
        $lundi = new DateTime($lundi);
        $this->setLundi($lundi->sub(new DateInterval('P1W')));
        $this->index();
    }

}


?>