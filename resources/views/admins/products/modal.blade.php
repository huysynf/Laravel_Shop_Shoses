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

                </div>
               <hr>
                <form action="" class="new-image-form">
                    @csrf
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


{{--add sỉze modal--}}
<div class="modal fade" id="addProductSize" tabindex="-1" role="dialog" aria-labelledby="addProductSizeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductSizeTitle">Thêm kích cỡ cho sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="error-box text-danger">

                </div>
                <form class="new-product-size-form">
                    @csrf
                    <input type="hidden" name="product_id" class="product_id">
                    <div class="form-group ">
                        <lable>Kích cỡ</lable>
                        <input type="text" name="size">
                        <lable>Giá cả</lable>
                        <input type="text" name="price">
                        <button type="button" class="btn btn-outline-primary btn-circle new-product-size"><i class="fa fa-plus"></i></button>
                    </div>
                </form>
                <div>
                    <div class="show-size-box">
                        <table class="table table-bordered ">
                            <tr>
                                <th>Kich cỡ</th>
                                <th>Giá</th>
                            </tr>
                            <tbody class="tbody-product-sze">
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
