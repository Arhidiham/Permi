<?php
namespace Library;

class Singleton
{
    
    protected static $instance = null;
    
    private function __construct()
    {
    }
    
    public static function getInstance(): self
    {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    
}

