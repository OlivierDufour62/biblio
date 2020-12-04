<?php

namespace App\Models;

Use Core\Model;

class Livre extends Model
{
    
    private $id;
    private $titre;
    private $nbPages;
    private $image;
    private $id_Editeurs;
    private $id_Authors;
    private $id_Format;
    protected $table = 'livres';

    public function __construct()
    {   

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbPages()
    {
        return $this->nbPages;
    }

    public function setNbPages($nbPages)
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of id_Editeurs
     */ 
    public function getId_Editeurs()
    {
        return $this->id_Editeurs;
    }

    /**
     * Set the value of id_Editeurs
     *
     * @return  self
     */ 
    public function setId_Editeurs($id_Editeurs)
    {
        $this->id_Editeurs = $id_Editeurs;

        return $this;
    }

    /**
     * Get the value of id_Authors
     */ 
    public function getId_Authors()
    {
        return $this->id_Authors;
    }

    /**
     * Set the value of id_Authors
     *
     * @return  self
     */ 
    public function setId_Authors($id_Authors)
    {
        $this->id_Authors = $id_Authors;

        return $this;
    }

    /**
     * Get the value of id_Format
     */ 
    public function getId_Format()
    {
        return $this->id_Format;
    }

    /**
     * Set the value of id_Format
     *
     * @return  self
     */ 
    public function setId_Format($id_Format)
    {
        $this->id_Format = $id_Format;

        return $this;
    }
}