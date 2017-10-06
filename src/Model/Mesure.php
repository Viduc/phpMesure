<?php
/***********************************************************************************************************************
 * Projet: Phpmesure
 * Auteur: Tristan Fleury - tristan.fleury.gre@gmail.com
 * Année de production: 2017
 * Licence: GNU General Public License (GPL), version 3
 * Copyright © 2017 Tristan Fleury
 **********************************************************************************************************************/
namespace viduc\phpmesure\src\Model;

/**
 * Mesure
 */
class Mesure implements \JsonSerializable
{
    public function __construct() 
    {

    }
    /**
     * @var Application
     */
    private $application;
    
    /**
     * @var Application
     */
    private $classname;

    /**
     * @var string
     */
    private $methode;

    /**
     * @var float
     */
    private $duree;

    /**
     * Set application
     *
     * @param Application $application
     *
     * @return Mesure
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set classname
     *
     * @param Classname $classname
     *
     * @return Mesure
     */
    public function setClassname($classname)
    {
        $this->classname = $classname;

        return $this;
    }

    /**
     * Get classname
     *
     * @return Classname
     */
    public function getClassname()
    {
        return $this->classname;
    }
    
    /**
     * Set methode
     *
     * @param string $methode
     *
     * @return Mesure
     */
    public function setMethode($methode)
    {
        $this->methode = $methode;

        return $this;
    }

    /**
     * Get methode
     *
     * @return string
     */
    public function getMethode()
    {
        return $this->methode;
    }


    /**
     * Set duree
     *
     * @param float $duree
     *
     * @return Mesure
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return float
     */
    public function getDuree()
    {
        return $this->duree;
    }
    
    // function called when encoded with json_encode
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}