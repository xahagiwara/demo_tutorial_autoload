<?php

namespace MyApp;

class Room
{
    private $id;
    private $people = array();

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function setPeople($people)
    {
        $this->people = $people;
    }

    public function getPeople()
    {
        return $this->people;
    }


}