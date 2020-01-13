{{--add image modal--}}
<div class="modal fade" id="addProductImage" tabindex="-1" role="dialog" aria-labelledby="addProductImageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductImageTitle">Quản lí hình ảnh cho sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="image-box d-flex">
                    <div class="position-relative p-2 " style="cursor: pointer;width:100px ;height:100px ;border: 1px solid">
                        <img src="/images/brands/default.jpg" alt="" width="100px" height="100px"
                             style="max-height: 100%;max-width: 100%" >
                        <span class="delete-image-product position-absolute" style="top: 0;right: 0"><i class="fa fa-times text-danger "></i></span>
                    </div>
                </div>
               <hr>
                <form action="" class="new-image-form">
                    <input type="hidden" name="product_id" class="product_id">
                    <div>
                        <label for="image"
                               class="col-xs-4 control-label">Thêm Ảnh </label>
                        <div class="col-xs-8">
                            <input id="file-image" type="file"
                                   class="file" name="images[]" multiple
                                   data-preview-file-type="any"
                                   data-upload-url="#">
                        </div>
                    </div>
                    <hr>
                <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-outline-primary btn-circle new-image-product"><i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


{{--product info--}}
<div class="modal fade" id="showProductInfo" tabindex="-1" role="dialog" aria-labelledby="showProductInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductInfoTitle">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>

{{--add color modal--}}
<div class="modal fade" id="addProductColor" tabindex="-1" role="dialog" aria-labelledby="addProductColorTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductColorTitle">Thêm màu cho từng kích cỡ sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-outline-primary btn-circle"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>

{{--add sỉze modal--}}
<div class="modal fade" id="addProductSize" tabindex="-1" role="dialog" aria-labelledby="addProductSizeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductSizeTitle">Thêm kích cỡ cho sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-outline-primary btn-circle"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
