<div class="modal fade" id="newBrandModal" tabindex="-1" role="dialog" aria-labelledby="newBrandModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newBrandModalTitle">Thêm mới thương hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="new-brand-form" method="post">
                    @csrf
                    <div class="error-box text-danger">

                    </div>
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input type="text" name="name" class="form-control brand-name">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                            <label for="">Ảnh </label>
                            <input type="file" class="form-control image-input" name="image">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm 12 ">

                            <img src="" alt="" width="100px" height="100px"
                                 style="max-height: 100%;max-width: 100%" class="image-show brand-image">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-outline-danger btn-circle"
                                data-dismiss="modal" title="Hủy bỏ"><i
                                class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-circle new-brand"
                                title="Thêm mới"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
