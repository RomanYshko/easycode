<?php

class Human
{
    public $age;
    protected $_prot;
    private $_priv;

    public function walk() {
        $this->_prot;
        echo 'i can walk';
    }

    public function speak() {
        echo 'i can sing song';
    }

    protected function _someMethod() {

    }
}