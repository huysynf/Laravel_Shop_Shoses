<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalTitle">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="new-category-form" method="post">
                   @csrf
                    <div class="error-box text-danger">

                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text"  name="name" class="form-control category-name">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục cha</label>
                        <select name="parent_id" class="category-select-parent form-control">
                            <option value="">--- Chọn danh mục ----</option>
                            <option value="">Không có</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==old('parent_id')?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-outline-danger btn-circle"
                                data-dismiss="modal" title="Hủy bỏ"><i
                                class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-circle new-category"
                                title="Thêm mới"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalTitle">Cập nhật danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="update-category-form" method="post" >
                    @csrf
                    <div class="error-box text-danger">

                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text"  name="name" class="form-control categoryName">
                    </div>
                    <div>
                        <p class="text-dark">Danh mục cha: <span class="category-parent-name"></span></p>
                    </div>
                    <div class="form-group">
                        <label for="">Thay đổi danh mục cha</label>
                        <select name="parent_id" class="category-select-parent form-control category-parent" style="max-width: 200px">
                            <option value="">--- Chọn danh mục ----</option>
                            <option value="">Không có</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==old('parent_id')?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-outline-danger btn-circle"
                                data-dismiss="modal" title="Hủy bỏ"><i
                                class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-circle update-category"
                                title="Cập nhật"><i class="fa fa-pencil-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
