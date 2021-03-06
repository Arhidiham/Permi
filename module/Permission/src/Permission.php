<?php
namespace Permission;

use User\UserInterface;

class Permission
{

    public static function isAllowed(UserInterface $user, string $permission, $resource): bool
    {
        $cache = PermissionCache::getInstance()->getCache();
        return $cache->isAllowed($user, $resource, $permission);
    }

}

