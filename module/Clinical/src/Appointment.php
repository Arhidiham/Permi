<?php
namespace Clinical;

use User\UserInterface;
use Permission\Constants;
use Library\AbstractOwnedResource;

class Appointment extends AbstractOwnedResource
{
    
    /**
     * The entity Id from the database.
     * 
     * @var int
     */
    protected $id;
    
    /**
     * The resource type unique name.
     * 
     * @var string
     */
    protected static $resourceId = Constants::RESOURCE_APPOINTMENT;
    
    /**
     * Generates a random Id for this entity.
     * 
     * @param UserInterface $owner
     */
    public function __construct(UserInterface $owner)
    {
        $this->id = mt_rand(1, 10000);
        parent::__construct($owner);
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
}

