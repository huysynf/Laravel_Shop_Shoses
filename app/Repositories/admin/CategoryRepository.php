<?php

namespace App\Repositories\admin;


use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function formatRequest(Request $request): array
    {
        $data = $request->all();
        $data['slug'] = $data['name'];

        return $data;
    }

    public function store(array $data)
    {
        $category = $this->model->create($data);
        $data=$this->getById($category->id);

        return $data;
    }
    public function update(array $data,$id)
    {
        $this->model->findOrFail($id)->update($data);
        $category=$this->getById($id);

        return $category;
    }

    public function search($searchName)
    {
        $categories = $this->model->searchBy($searchName);

        return $categories;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function destroy($id)
    {
        $category= $this->getById($id);
        $category->delete();

        return $category;
    }

    public function trash($searchName)
    {
        $categories=$this->model->getAllCategoryWhenSoftDelete($searchName);

        return $categories;
    }

    public function trashDeleteAll():void
    {
        $this->model->trashDeleteAll();
    }

    public function trashRestoreAll():void
    {
        $this->model->trashRestoreAll();
    }

    public function trashDelete($id)
    {
        $this->model->trashDeleteBy($id);
    }

    public function trashRestore($id)
    {
        $this->model->trashRestoreBy($id);

    }

}
