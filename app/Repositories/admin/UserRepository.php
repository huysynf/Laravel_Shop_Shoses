<?php


namespace App\Repositories\admin;


use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRepository extends BaseRepository
{

    protected Role $role;
    protected string  $imagePath;

    public function __construct(User $user, Role $role)
    {
        $this->model = $user;
        $this->role = $role;
        $this->imagePath = 'images/users/';
    }

    public function search(array $condition)
    {
        $data = $this->model->search($condition);

        return $data;
    }

    public function formatRequest(Request $request): array
    {
        $data = $request->all();

        return $data;
    }

    public function getAllRoleName(): array
    {
        return $this->role->get()->pluck('name')->toArray();
    }

    public function store(array $data): User
    {
        $image = $data['image'];
        $data['image'] = $this->model->saveImage($image, $this->imagePath);
        $user = $this->model->create($data);
        $user->syncRoles($data['role']);

        return $user;
    }

    public function update(array $data, $id)
    {
        $user = $this->getById($id);
        $image = $data['image'] ?? null;
        $data['image'] = $this->model->updateImage($image, $this->imagePath, $user->image);
        $user->update($data);
        $user->syncRoles($data['role']);

        return $user;
    }

    public function destroy($id)
    {
        $user=$this->getById($id);
        $image=$user->image;
        $this->model->deleteImage($image,$this->imagePath);
        $user->delete();

        return $user;
    }

    public function getDataToEditBy($id):array
    {
        $data['user']=$this->getById($id);
        $data['listRoles']=$data['user']->roles->pluck('name')->toArray();

        return $data;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function changePassword($password, $id)
    {
        $this->model->changePassword($id, $password);

        return 'Cập nhật mật khẩu thành công';

    }
}
