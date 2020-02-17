<?php
namespace Payment;

use User\UserInterface;
use Permission\Constants;
use Library\AbstractOwnedResource;

class Payment extends AbstractOwnedResource
{
    
    protected $id;
    
    protected static $resourceId = Constants::RESOURCE_PAYMENT;
    
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