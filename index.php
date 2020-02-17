<?php
use Laminas\Permissions\Acl\Acl;
use Permission\Constants;
use Laminas\Permissions\Acl\Role\GenericRole;
use Permission\Permission;
use Invoice\Invoice;

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/config.php';

$kingInvoice = new Invoice($king);
print_r('King allowed update on invoice they created: ');
var_dump(Permission::allow($king, Constants::PERMISSION_UPDATE, $kingInvoice));
print_r(PHP_EOL);

$nurseInvoice = new Invoice($nurse);
print_r('Nurse allowed update on invoice they created: ');
var_dump(Permission::allow($nurse, Constants::PERMISSION_UPDATE, $nurseInvoice));
print_r(PHP_EOL);

print_r('King allowed update on invoice they did not create: ');
var_dump(Permission::allow($king, Constants::PERMISSION_UPDATE, $nurseInvoice));
print_r(PHP_EOL);

print_r('Nurse allowed update on invoice they did not create: ');
var_dump(Permission::allow($nurse, Constants::PERMISSION_UPDATE, $kingInvoice));
print_r(PHP_EOL);
