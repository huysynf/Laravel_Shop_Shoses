<?php


namespace App\Http\Composers\Admin;


use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleComposer
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function compose(View $view){
        $view->with('roleNames',$this->role->get()->pluck('name')->toArray());
    }
}
