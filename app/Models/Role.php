<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table='roles';

    protected $fillable=[
        'name',
    ];

    private array $roleNamesDefault=[
        'MANAGE USER',
        'MANAGE PRODUCT',
        'MANAGE CATEGORY',
        'MANAGE BRAND',
        'MANAGE ORDER',
        'MANAGE ROLE',
        'MANAGE SLIDE',
        'MANAGE COUPON',
    ];
    public function isRoleDefault():bool
    {
        return in_array($this->name,$this->roleNamesDefault);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        );
    }

    public static function getPermissisonIdsBy($id):array
    {
        return Role::findOrFail($id)->permissions()->pluck('permission_id')->toArray();
    }

    public static function search($name,$permission)
    {
        return Role::when($name,fn($q)=>$q->where('name','LIKE','%'.$name.'%'))
            ->when($permission,
                fn($query, $q) => $query->whereHas('permissions', fn($q) => $q->where('name', $permission)))
            ->latest('id')
            ->paginate(10);
    }

}
