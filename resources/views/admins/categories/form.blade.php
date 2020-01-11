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
                <form class="new-category-form" method="post" action="{{route('categories.store')}}">
                   @csrf
                    <div class="error-box text-danger">
                        <p> có lỗi xảy ra</p>
                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text"  name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục cha</label>
                        <select name="parent_id" class="category-select-parent form-control">
                            <option value="0">--- Chọn danh mục ----</option>
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
