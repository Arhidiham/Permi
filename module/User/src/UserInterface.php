<?php
namespace User;

use Laminas\Permissions\Acl\Role\RoleInterface;

interface UserInterface extends RoleInterface
{
    
    public function getId(): int;

}

