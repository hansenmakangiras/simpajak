<?php

namespace App\Models;

/**
 * @mixin IdeHelperPermission
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions(): array
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',
        ];
    }
}
