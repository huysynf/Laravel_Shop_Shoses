<?php


namespace App\Http\Composers\Admin;


use App\Models\Permission;
use Illuminate\View\View;

class PermissionComposer
{
    private Permission $permission;

    public function __construct(Permission $permission)
    {
         $this->setPermission($permission);
    }

    public function setPermission($permission)
    {
        return $this->permission=$permission;
    }

    public function compose(View $view)
    {
        $view->with('permissions', $this->permission->get(['id','name']));
    }
}
