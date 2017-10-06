<?php
/***********************************************************************************************************************
 * Projet: Phpmesure
 * Auteur: Tristan Fleury - tristan.fleury.gre@gmail.com
 * Année de production: 2017
 * Licence: GNU General Public License (GPL), version 3
 * Copyright © 2017 Tristan Fleury
 **********************************************************************************************************************/

namespace viduc\phpmesure\src\Controller;

use viduc\phpmesure\src\Model\Mesure;

class Phpmesure
{
    private $nomApplication;
    private $serveurNom;
    private $serveurPort;
    
    public function __construct() 
    {

    }
    
    /**
     * Fonction appelée lors du lancement d'une méthode
     * @param String $nomMethode
     * @return String - le nom de la méthode concaténer avec le microtime 
     */
/*    public function debutMesure($nomMethode)
    {
        return $nomMethode."|".$this->microtime_float();
    }
    
    /**
     * Fonction appelée par une méthode pour le calcul et l'envoie de la mesure
     * L'enregistrement est envoyé ensuite au serveur
     * @param String $class - le nom de la class avec le namespace
     * @param String $methode - le nom de la méthode
     * @param microtime $debut Le microtime du début de la méthode
     * @param microtime $fin Le microtime de fin de la méthode
     * @return Boolean
     */
    public function mesure($classname = null,$methode = null,$debut = null, $fin = null)
    {
        if(!is_null($classname) && !is_null($methode)){
            if(is_null($debut)){$debut = $this->microtime_float();}
            if(is_null($fin)){$fin = $debut;}
            $mesure = new Mesure();
            $mesure->setApplication($this->getNomApplication());
            $mesure->setClassname($classname);
            $mesure->setMethode($methode);
            $mesure->setDuree($this->microtime_float($fin)-$this->microtime_float($debut));
            $this->envoieMesure($mesure);
            return true;
        }
        return false;
    }
    
    /**
     * Fonction qui envoie la mesure au serveur principal
     * @param Object $mesure
     */
    private function envoieMesure($mesure)
    {
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $json = json_encode($mesure);
        $len = strlen($json);
var_dump($json);
        socket_sendto($sock, $json, $len, 0, $this->getServeurNom(), $this->getServeurPort());
        socket_close($sock);
    }
    
    /**
     * Fonction qui créé un microtine de type float
     * @return float
     */
    private function microtime_float($microtime = null)
    {
        if($microtime === null){$microtime = microtime();}
        list($usec, $sec) = explode(" ", $microtime);
        return ((float)$usec + (float)$sec);
    }
    
/***********************************************************************************************************************
 * GETTER ET SETTER 
 **********************************************************************************************************************/
    /**
     * Getter nomApplication
     * @return String
     */
    public function getNomApplication()
    {
        return $this->nomApplication;
    }
    
    /**
     * Setter nomApplication
     * @param String $nomApplication
     * @return $this
     */
    public function setNomApplication($nomApplication)
    {
        $this->nomApplication = $nomApplication;
        return $this;
    }
    
    /**
     * Getter serveurNom
     * @return String
     */   
    public function getServeurNom()
    {
        return $this->serveurNom;
    }
    
    /**
     * Setter serveurNom
     * @param String $serveurNom
     * @return $this
     */    
    public function setServeurNom($serveurNom)
    {
        $this->serveurNom = $serveurNom;
        return $this;
    }

    /**
     * Getter serveurPort
     * @return String
     */    
    public function getServeurPort()
    {
        return $this->serveurPort;
    }
    
    /**
     * Setter serveurPort
     * @param String $serveurPort
     * @return $this
     */      
    public function setServeurPort($serveurPort)
    {
        $this->serveurPort = $serveurPort;
        return $this;
    }
}