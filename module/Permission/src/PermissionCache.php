<?php
namespace Permission;

use Library\Singleton;
use Laminas\Permissions\Acl\Acl;

class PermissionCache extends Singleton
{
    
    /**
     * The Accecss control list stack.
     * 
     * @var Acl
     */
    protected $cache;
    
    public function setCache(Acl $cache)
    {
        $this->cache = $cache;
    }
    
    public function getCache(): ?Acl
    {
        return $this->cache;
    }
    
}

