<?php

namespace User;

use Laminas\Permissions\Acl\ProprietaryInterface;
use Permission\Constants;

class User implements UserInterface, ProprietaryInterface
{
    
    protected $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }
    
    public function getRoleId()
    {
        return Constants::ROLE_USER . '.' . $this->getId();
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * Implemented for ownership checking.
     * The owner of this role gets compared with the owner of the resource.
     * If the two match then ownership assertion is pleased.
     * 
     * @return int
     */
    public function getOwnerId()
    {
        return $this->getId();
    }

}