<?php

namespace Permission;

class Constants
{
    
    public const ROLE_USER = '';
    
    public const ROLE_RECEPTION = 'reception';
    
    public const ROLE_NURSE = 'nurse';
    
    public const ROLE_DOCTOR = 'doctor';
    
    public const ROLE_ADMIN = 'admin';
    
    public const ROLE_SUPPORT = 'support';
    
    public const RESOURCE_APPOINTMENT = 'appointment';
    
    public const RESOURCE_INVOICE = 'invoice';
    
    public const RESOURCE_PAYMENT = 'payment';
    
    public const RESOURCE_PERMISSION = 'permission';
    
    public const PERMISSION_CREATE = 'create';
    
    public const PERMISSION_READ = 'read';
    
    public const PERMISSION_UPDATE = 'update';
    
    public const PERMISSION_DISABLE = 'disable';
    
    public const PERMISSION_APPROVE = 'approve';
    
    public const PERMISSION_UNAPPROVE = 'unapprove';
    
    public const PERMISSION_UPDATE_SALES_RESOURCE = 'salesresource';
    
    public const PERMISSION_UPDATE_STATUS = 'status';
    
    /**
     * All roles for ease of setup.
     * 
     * @var array
     */
    public const ROLES = [
        self::ROLE_USER,
        self::ROLE_RECEPTION,
        self::ROLE_NURSE,
        self::ROLE_DOCTOR,
        self::ROLE_ADMIN,
        self::ROLE_SUPPORT,
    ];
    
    /**
     * All resources for ease of setup.
     * 
     * @var array
     */
    public const RESOURCES = [
        self::RESOURCE_APPOINTMENT,
        self::RESOURCE_INVOICE,
        self::RESOURCE_PAYMENT,
        self::RESOURCE_PERMISSION,
    ];
    
}