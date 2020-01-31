<?php


namespace App\Repositories\admin;


use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }


    public function search()
    {

    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();

        return $data;
    }

    public function store(array  $data)
    {
        $role=$this->model->create([
            'name'=>$data['name'],
        ]);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

}
