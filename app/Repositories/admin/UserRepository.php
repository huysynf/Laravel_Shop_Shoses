<?php


namespace App\Repositories\admin;


use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRepository extends  BaseRepository
{

    protected  $role;
    protected  string  $imagePath;

    public function __construct(User $user,Role $role)
    {
        $this->model=$user;
        $this->role=$role;
        $this->imagePath='images/users/';
    }

    public function formatDate(Request $request):array
    {
        $data=$request->all();

        return $data;
    }
    public function getAllRoleName():array
    {
        return  $this->role->get()->pluck('name')->toArray();
    }

    public function store(array  $data)
    {
        $image=$data['image'];
        $data['image']=$this->model->saveImage($image,$this->imagePath);
        $user=$this->model->create($data);
        $user->assignRole($data['role']);

        return $user;
    }
}
