<?php
namespace Permission;

use User\UserInterface;

class Permission
{

    public static function allow(UserInterface $user, string $permission, $resource): bool
    {
        $cache = PermissionCache::getInstance()->getCache();
        return $cache->isAllowed($user, $resource, $permission);
    }

    /*
    protected static function allowOnResourceType(UserInterface $user, string $permission, string $resource): bool
    {
        $permission = PermissionCache::getInstance()->getCache();
        
        return false;
    }

    protected static function allowOnResourceInstance(UserInterface $user, string $permission, ResourceInterface $resource): bool
    {
        $permission = PermissionCache::getInstance()->getCache();

        return false;
    }
    */
}

