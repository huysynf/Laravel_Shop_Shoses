<?php


namespace App\Repositories\admin;


use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    protected Role $role;

    public function __construct(Role $role)
    {
        $this->model = $role;

    }


    public function search($name,$permission)
    {
        return \App\Models\Role::search($name,$permission);
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();

        return $data;
    }

    public function store(array  $data)
    {
        $role=$this->model->create(['name'=>$data['name']]);
        $role->syncPermissions($data['permissions']);

        return $role;
    }

    public function getById($id)
    {
        return \App\Models\Role::findOrFail($id);
    }

    public  function  getPermissionIdBy($id):array
    {
        return \App\Models\Role::getPermissisonIdsBy($id);
    }

    public function update(array $data,$id)
    {
        $role=$this->model->findOrFail($id);
        $role->update(['name'=>$data['name']]);
        $role->syncPermissions($data['permissions']);

        return $role;
    }


}
