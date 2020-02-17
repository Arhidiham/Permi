<?php
namespace Library;

/**
 * The abstract resource class is used to automate the boileplat required
 * to setup a generic resource for permission checking.
 * 
 * @package Library
 * 
 * @author Quintin Venter
 * @since  17 February 2020
 */
abstract class AbstractResource implements ResourceInterface
{
    
    /**
     * The resource name. Used to uniquely identify this resource from others.
     * This should be defined in the child class.
     * 
     * @var string
     */
    protected static $resourceId;
    
    /**
     * Simply gets the resurce Id from the static resource configured
     * for this class.
     * 
     * {@inheritDoc}
     * @see \Laminas\Permissions\Acl\Resource\ResourceInterface::getResourceId()
     */
    public function getResourceId()
    {
        $id = null;
        if (!empty(static::$resourceId)) {
            $id = static::$resourceId;
        }
        return $id;
    }
    
}

