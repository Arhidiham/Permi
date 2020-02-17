<?php
namespace Library;

use User\UserInterface;
use Laminas\Permissions\Acl\ProprietaryInterface;

abstract class AbstractOwnedResource extends AbstractResource implements ProprietaryInterface
{
    /**
     * The same as the ezyVet Created user Id
     * 
     * @var int
     */
    protected $ownerId;
    
    public function __construct(UserInterface $owner)
    {
        $this->ownerId = $owner->getId();
    }
    
    /**
     * Implemented for ownership checking.
     * The owner of this resource gets compared with the owner of the role.
     * If the two match then ownership assertion is pleased.
     *
     * @return int
     */
    public function getOwnerId()
    {
        $id = null;
        if (!empty($this->ownerId)) {
            $id = $this->ownerId;
        }
        return $id;
    }
}

