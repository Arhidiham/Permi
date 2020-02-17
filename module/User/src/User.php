<?php
namespace User;

use Laminas\Permissions\Acl\ProprietaryInterface;
use Permission\Constants;

class User implements UserInterface, ProprietaryInterface
{

    /**
     * The entity Id from the database.
     *
     * @var int
     */
    protected $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * We will generate a unique per user role Id here by joining the base role
     * with their entity Id.
     *
     * {@inheritdoc}
     * @see \Laminas\Permissions\Acl\Role\RoleInterface::getRoleId()
     */
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
     * If the two match then ownership assertion is applied.
     * If the owner is not defined on both the role and resource then all
     * ownership checks will automaticaly pass for the pair.
     * The user owns itself.
     *
     * @return int
     */
    public function getOwnerId()
    {
        return $this->getId();
    }
}