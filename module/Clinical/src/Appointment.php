<?php
namespace Clinical;

use User\UserInterface;
use Permission\Constants;
use Library\AbstractOwnedResource;

class Appointment extends AbstractOwnedResource
{
    
    protected $id;
    
    protected static $resourceId = Constants::RESOURCE_APPOINTMENT;
    
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

