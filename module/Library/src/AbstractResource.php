<?php
namespace Library;

abstract class AbstractResource implements ResourceInterface
{
    
    /**
     * The resource name. Used to uniquely identify this resource from others.
     * This should be defined in the child class.
     * 
     * @var string
     */
    protected static $resourceId;
    
    public function getResourceId()
    {
        $id = null;
        if (!empty(static::$resourceId)) {
            $id = static::$resourceId;
        }
        return $id;
    }
    
}

