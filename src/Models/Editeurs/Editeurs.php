<?php

namespace App\Models;

Use Core\Model;
use DateTime;

Class Editeurs extends Model
{
    private $id;
    private $name;
    private $date_create;
    private $date_update;
    private $date_delete;
    protected $table = 'editeurs';

    public function __construct()
    {
        $this->setDate_create(new DateTime());
        $this->setDate_update(new DateTime());
        $this->setDate_delete(new DateTime());
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of date_create
     */ 
    public function getDate_create()
    {
        return $this->date_create;
    }

    /**
     * Set the value of date_create
     *
     * @return  self
     */ 
    public function setDate_create($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * Get the value of date_update
     */ 
    public function getDate_update()
    {
        return $this->date_update;
    }

    /**
     * Set the value of date_update
     *
     * @return  self
     */ 
    public function setDate_update($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    /**
     * Get the value of date_delete
     */ 
    public function getDate_delete()
    {
        return $this->date_delete;
    }

    /**
     * Set the value of date_delete
     *
     * @return  self
     */ 
    public function setDate_delete($date_delete)
    {
        $this->date_delete = $date_delete;

        return $this;
    }
}