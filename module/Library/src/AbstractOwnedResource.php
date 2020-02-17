<?php
namespace Library;

use User\UserInterface;
use Laminas\Permissions\Acl\ProprietaryInterface;

/**
 * The abstract owned resource class is used to automate the boileplat required
 * to setup an ownered resource for permission checking.
 * This builds off the already established abstract resource to give us more
 * options.
 * 
 * @package Library
 * 
 * @author Quintin Venter
 * @since  17 February 2020
 */
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
     * If the two match then ownership assertion is applied.
     * If the owner is not defined on both the role and resource then all
     * ownership checks will automaticaly pass for the pair.
     * 
     * {@inheritDoc}
     * @see \Laminas\Permissions\Acl\ProprietaryInterface::getOwnerId()
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

