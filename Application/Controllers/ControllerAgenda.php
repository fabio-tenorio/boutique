<?php

/* controller dédié aux réservations de rdv sur place à l'onglerie
* et à l'éventuel paiement en amont des prestations préalablement choisies sur le créneau
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelAgenda;

class ControllerAgenda extends Controller {

    public function __construct()
    {
        $agenda = new ModelAgenda;
    }

    // vai no ControlllerAgenda (méthode de view)
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

    //méthode pour récuperer les chiffres correspondant aux heures dans un string datetime SQL
    // vai no ControlllerAgenda
    public function pickHour($string)
    {
        if (is_string($string)) {
            return $string[11].$string[12];    
        } else
        {
            return "ce n'est pas une chaîne de caractères";
        }
    }

    //méthode pour récuperer les chiffres correspondant aux jours dans un string datetime SQL
    // vai no ControlllerAgenda
    public function pickDay($string)
    {
        return $string[8].$string[9];
    }

    //méthode pour controler si il y a des incohérences de saisie dans le formulaire rempli
    // vai no ControlllerAgenda
    public function checkSaisie($tab)
    {
        if ($this->datedebut==$this->datefin)
            {
                if ($this->heuredebut<$this->heurefin)
                {
                    if ($this->heuredebut>=$this->debutcreneau)
                    {
                        if ($this->heuredebut<=$this->fincreneau)
                        {
                            if ($this->heurefin>=$this->minfinresa)
                            {
                                if ($this->heurefin<=$this->maxfinresa)
                                {
                                    return TRUE;
                                } else
                                {
                                    $erreur = "l'heure de fin de réservation jusqu'à 18h";
                                    return $erreur;
                                }
                            } else
                            {
                                $erreur= "l'heure minimum de fin de réservation commence à 9h";
                                return $erreur;
                            }
                        } else
                        {
                            $erreur = "la salle n'est pas disponible à cette heure du soir";
                            return $erreur;
                        }
                    } else
                    {
                        $erreur = "la salle n'est pas disponible à cette heure du matin";
                        return $erreur;
                    }
                } else
                {
                    $erreur = "l'heure de fin ne peut pas être inférieure à l'heure de début de la réservation";
                    return $erreur;
                }
            } else
            {
                $erreur="la date de début doit être égale à la date de fin de la réservation";
                return $erreur;
            }   
    }

    // méthode pour controler si les donnés de la réservation sont cohérents avec le jour et l'heure au moment de la réservation
    // vai no ControlllerAgenda
    public function checkNow()
    {
        if ($this->datedebut<$this->moment)
        {
            $erreur = "c'est trop tard pour faire cette réservation";
            return $erreur;
        }

        if ($this->heuredebut>$this->hournow)
        {
            return TRUE;
        } else
        {
            if ($this->datedebut>$this->moment)
            {
                return TRUE;
            } else
            {
                $erreur = "c'est trop tard pour faire cette réservation";
                return $erreur;
            }
        }
    }

    // méthode pour controler si le formulaire de réservation a été complétement rempli
    // vai no ControlllerAgenda
    public function checkRemplissage($tab)
    {
        if (isset($tab['reserver']) && $tab['reserver']=='reserver')
        {
            if(empty($tab['titre']));
            {
                $erreur = "Vous devez renseigner un titre";
                return $erreur;
            } 
        
            if(empty($tab['description']))
            {
                $erreur = "Vous devez renseigner une description";
                return $erreur;
            } 
        
            if(empty($tab['datedebut']))
            {
                $erreur = "Vous devez renseigner une date de début";
                return $erreur;
            } 
        
            if(empty($tab['heuredebut']))
            {
                $erreur = "Vous devez renseigner une heure de début";
                return $erreur;
            } 
        
            if(empty($tab['datefin']))
            {
                $erreur = "Vous devez renseigner une date de fin";
                return $erreur;
            } 
        
            if(empty($tab['heurefin']))
            {
                $erreur = "Vous devez renseigner une heure de fin";
                // header('location:')
                return $erreur;
            }
        } else
        {
          return TRUE;
        }
    }

// méthode qui regroupe tous les contrôles sur le formulaire
// il faut utiliser le triple égal pour que tous les contrôles marchent bien
// vai no ControllerAgenda
    // public function checkAll($tab)
    // {
    //     if ($this->checkRemplissage($tab)===TRUE)
    //     {
    //         if ($this->checkSaisie($tab)===TRUE)
    //         {
    //             if ($this->checkNow($tab)===TRUE)
    //             {
    //                 if ($this->controleHeures($this->completedebut, $this->completefin)===TRUE)
    //                 {
    //                     return TRUE;
    //                 } else
    //                 {
    //                     return FALSE;
    //                 }
                    
    //             } else
    //             {
    //                 return FALSE;
    //             }
    //         } else
    //         {
    //             return FALSE;
    //         }
    //     } else
    //     {
    //         return FALSE;
    //     }
    // }
    
    //méthode pour calculer l'intervale des heures entre la date de début et la date de fin d'un événement
    // public function calcInterval($dateDebut, $hourDebut, $dateFin, $hourFin)
    // {
    //     if ($dateDebut==$dateFin)
    //     {
    //         $interval = 18-$hourDebut;
    //         return $interval;
    //     } else
    //     {
    //         if ($dateDebut<$dateFin)
    //         {
    //             $interval = $hourFin-8;
    //             return $interval;
    //         }
    //     }
    // }
    //    cette méthode retourne le numéro des jours de la semaine en cours
    // vai no ControllerAgenda
     public function week()
     {
         $datetime=new \DateTime;
         return $datetime->format('D');
     }

    // afin de contrôler si une réservation peut être faite, il faut:
    // savoir si il y a d'autres réservations déjà enrégistrées pour le même jour. True si il y en a, false si il y en a pas
    // vai no ControllerAgenda
    public function dayCheck($day)
    {
        
        if ($this->day==$day)
        {
            
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function index()
    {
        // echo "Je suis ControllerAgenda";
        $data = $this->affichageTableau(8, 7);
        $this->render('agenda', $data);
    }
}


?>