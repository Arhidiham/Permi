<?php

use Laminas\Permissions\Acl\Acl;
use Permission\Constants;
use User\User;
use Laminas\Permissions\Acl\Assertion\OwnershipAssertion;
use Permission\PermissionCache;

$acl = new Acl();
// add all roles to the acl engine
foreach (Constants::ROLES as $role) {
    $acl->addRole($role);
}
// all the resources to the acl engine
foreach (Constants::RESOURCES as $resource) {
    $acl->addResource($resource);
}

// setup the actual roles with their permissions
// = Reception =
// allowed to create and modify appointments except for the status
$acl->allow(
    Constants::ROLE_RECEPTION,
    [Constants::RESOURCE_APPOINTMENT],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_DISABLE,
    ]
);
// allowed to manage payments
$acl->allow(
    Constants::ROLE_RECEPTION,
    [Constants::RESOURCE_PAYMENT],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_DISABLE,
    ]
);
// allowed to view invoices to take payments but not to make any changes
$acl->allow(
    Constants::ROLE_RECEPTION,
    [Constants::RESOURCE_INVOICE],
    [Constants::PERMISSION_READ]
);
// = Nurse =
// allowed to create new appointments and change the status but not cancel (disable)
$acl->allow(
    Constants::ROLE_NURSE,
    [Constants::RESOURCE_APPOINTMENT],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_UPDATE_STATUS,
    ]
);
// allowed to manage invoices they created
$acl->allow(
    Constants::ROLE_NURSE,
    [Constants::RESOURCE_INVOICE],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
    ],
    new OwnershipAssertion()
);
// = Doctor =
// allowed to create new appointments and change the status but not cancel (disable)
$acl->allow(
    Constants::ROLE_DOCTOR,
    [Constants::RESOURCE_APPOINTMENT],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_UPDATE_STATUS,
    ]
);
// allowed to create and manage all invoices and change the sales resources on them
$acl->allow(
    Constants::ROLE_DOCTOR,
    [Constants::RESOURCE_INVOICE],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_UPDATE_SALES_RESOURCE
    ]
);
// = Admin =
// created to allow the editing of permissions
$acl->allow(
    Constants::ROLE_ADMIN,
    [Constants::RESOURCE_PERMISSION],
    [
        Constants::PERMISSION_CREATE,
        Constants::PERMISSION_READ,
        Constants::PERMISSION_UPDATE,
        Constants::PERMISSION_DISABLE,
    ]
);
// = Support =
// this user has access to everything
$acl->allow(Constants::ROLE_SUPPORT);
// create some users for use cases
$reception = new User(88887);
// this means we add the specific reception user and they inherit all permissions from their parent roles
$acl->addRole($reception, Constants::ROLE_RECEPTION);
$nurse = new User(7357);
$acl->addRole($nurse, Constants::ROLE_NURSE);
$doctor = new User(55555);
$acl->addRole($doctor, Constants::ROLE_DOCTOR);
$admin = new User(7722);
$acl->addRole($admin, Constants::ROLE_ADMIN);
$support = new User(2222);
$acl->addRole($support, Constants::ROLE_SUPPORT);
// = King = (the owner of the practice)
// this user inherits different permissions and gets access to individual permissions as well
$king = new User(12345);
// both an administrator and a doctor
$acl->addRole(
    $king,
    [
        Constants::ROLE_DOCTOR,
        Constants::ROLE_ADMIN,
    ]
);
// allowed ALL permissions on payments
$acl->allow(
    $king,
    [Constants::RESOURCE_PAYMENT]
);
// allowed to disable invoices
$acl->allow(
    $king,
    [Constants::RESOURCE_INVOICE],
    [Constants::PERMISSION_DISABLE]
);
// save the permission structure in a cache
PermissionCache::getInstance()->setCache($acl);