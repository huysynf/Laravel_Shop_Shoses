$(function () {
    //setup ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    countIndexTableOfPage();
    let tableBody = $('tbody');
    let errorBox = $('.error-box');


    let getMethodForm = 'get';
    let postMethodForm = 'post';

    //category
    let categoryPath = '/manage/categories';
    let category = $('#category');
    let categoryId = 0;

    $('.category-select-parent').select2();

    $('.add-category').click(function () {
        $('.new-category-form').trigger('reset');
        resetErrorBox();
    });

    $('.new-category').click(function () {
        resetErrorBox();
        let data = new FormData($('.new-category-form')[0]);
        callAjax(categoryPath, data, postMethodForm)
            .then(data => {
                $('#newCategoryModal').modal('hide');
                alertSuccess(data.message);
                let row = convertCategoryToRowTable(data.data);
                tableBody.prepend(row);
                countIndexTableOfPage();
            })
            .catch(data => {
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.category-name').focus();
            });
    });

    category.on('click', '.edit-category', function () {
        resetErrorBox();
        categoryId = $(this).attr('edit-id');
        let url = categoryPath + '/' + categoryId;
        callAjax(url)
            .then(data => {
                $('.categoryName').val(data.data.name);
                let categoryParent = "Không có";
                if (data.data.category != null) {
                    categoryParent = data.data.category.name;
                }
                $('.category-parent-name').html(categoryParent);
                $('.category-parent').val(data.data.category_id);
            })
    });


    $('.update-category').click(function () {
        let data = new FormData($('.update-category-form')[0]);
        let url = categoryPath + '/update/' + categoryId;
        callAjax(url, data, postMethodForm)
            .then(data => {
                $('#editCategoryModal').modal('hide');
                alertSuccess(data.message);
                let row = convertCategoryToRowTable(data.data);
                $(".edit-category[edit-id=" + categoryId + "]").parents('tr').replaceWith(row);
                countIndexTableOfPage();
            })
            .catch(data => {
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.category-name').focus();
            });
    });

    category.on('click', '.delete-category', function () {
        categoryId = $(this).attr('delete-id');
        let url = categoryPath + "/" + categoryId;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccess(data.message);
                // $(this).parents('tr').remove();
                // countIndexTableOfPage();
                location.reload();
            })
            .catch(data => {
                alertError(data.message);
            });
    });

    category.on('click', '.restore-category', function () {
        let slug = $(this).attr('restore-id');
        let url = categoryPath + "/trash-restore/" + slug;
        let message = 'Xác nhận Restore lại';
        alertConfirm(message)
            .then(data => {
                callAjax(url, '', postMethodForm)
                    .then(data => {
                        alertSuccess(data.message);
                        location.reload();
                    })
                    .catch(data => {
                        alertError(data.message);
                    });

            })
            .catch(data => {

            })

    });

    category.on('click', '.remove-category', function () {
        let id = $(this).attr('delete-id');
        let url = categoryPath + "/trash-delete/" + id;
        let message = 'Xác nhận Xóa luôn lại';
        alertConfirm(message)
            .then(data => {
                callAjax(url, '', postMethodForm)
                    .then(data => {
                        alertSuccess(data.message);
                        location.reload();
                    })
                    .catch(data => {
                        alertError(data.message);
                    });

            })
            .catch(data => {

            })

    });

    //product
    $('.product-select-category').select2();
    $('.product-select-brand').select2();

    //brands
    let brand = $('#brand');
    let brandPath = '/manage/brands';
    let brandId = 0;
    let brandModalTitle = $('#BrandModalTitle');

    $('.add-brand').click(function () {
        $('.new-brand-form').trigger('reset');
        resetErrorBox();
    });

    $('.new-brand').click(function () {
        resetErrorBox();
        let data = new FormData($('.new-brand-form')[0]);
        callAjax(brandPath, data, postMethodForm)
            .then(data => {
                $('#BrandModal').modal('hide');
                alertSuccess(data.message);
                // let row=convertBrandToRowTable(data.data);
                // tableBody.prepend(row);
                location.reload();
                countIndexTableOfPage();
            })
            .catch(data => {
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.brand-name').focus();
            });
    });


    brand.on('click', '.edit-brand', function () {
        resetErrorBox();
        brandId = $(this).attr('edit');
        let url = brandPath + '/' + brandId;
        callAjax(url)
            .then(data => {
                let brand = data.data;
                $('.brand-name').val(brand.name);
                $('.brand-image').attr('src', '/images/brands/' + brand.image);
            })
    });

    $('.update-brand').click(function () {
        resetErrorBox();
        let data = new FormData($('.edit-brand-form')[0]);
        let url = brandPath + '/update/' + brandId;
        callAjax(url, data, postMethodForm)
            .then(data => {
                $('#editBrandModal').modal('hide');
                alertSuccess(data.message);
                let row = convertBrandToRowTable(data.data);
                $(".edit-brand[edit=" + brandId + "]").parents('tr').replaceWith(row);
                countIndexTableOfPage();
            })
            .catch(data => {
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.brand-name').focus();
            });
    });

    brand.on('click', '.delete-brand', function () {
        let id = $(this).attr('delete');
        let url = brandPath + "/" + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccess(data.message);
                // $(this).parents('tr').remove();
                // countIndexTableOfPage();
                location.reload();
            })
            .catch(data => {
                alertError(data.message);
            });
    });

    //product image

    let product = $('#product');

    product.on('click', '.show-product', function () {
        let id=$(this).attr('show');
        let url = '/manage/products/'+id;
        callAjax(url)
            .then(data => {
              let product=data.data;
                $('.product-name').html(product.name);
                 $('.product-sale').html(product.sale);
                 $('.product-brand').html(product.brand.name);
                let status=product.status==0 && 'Hiện thị' || 'không hiện thị';
                $('.product-status').html(status);
                $('.product-des').html(product.description);
                $('.product-image').attr('src','/images/products/'+product.image);
                let categories=convertCategoryToParagraph(product.categories);
                let sizes=convertSizesToParagraph(product.sizes);
                $('.product-category').html(categories);
                $('.product-size').html(sizes);
            });
    });

    $('.new-image-product').click(function () {
        let url = '/manage/product-image';
        let data = new FormData($('.new-image-form')[0]);

        callAjax(url, data, postMethodForm)
            .then(data => {
                alertSuccess(data.message);
                $('#addProductImage').modal('hide');
            })
            .catch(data => {
                alertError(data.message);
            });
    });

    product.on('click', '.add-image-product', function () {
        $('.new-image-form').trigger('reset');
        let id = $(this).attr('add-image');
        $('.product_id').val(id);
        let url = '/manage/product-image/' + id;
        callAjax(url)
            .then(data => {
                let images = data.data;
                let text = converImageToImageItem(images);
                $('.image-box').html(text);
            })
    });

    $('#addProductImage').on('click', '.delete-image-product', function () {
        let id = $(this).attr('delete');
        let url = '/manage/product-image/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                $(this).parent('div').remove();
                alertSuccess(data.message);
            })
    });

    product.on('click', '.add-product-size', function () {
        $('.new-product-size-form').trigger('reset');
        let id = $(this).attr('add-size');
        $('.product_id').val(id);
        let url = '/manage/product-size/' + id;
        callAjax(url)
            .then(data => {
                let sizes = data.data;
                let text = convertSizesToRowTable(sizes);
                $('.tbody-product-sze').html(text);
                $('.moneyFormat').simpleMoneyFormat();
            })
    });

    $('.new-product-size').click(function () {
        resetErrorBox();
        let url = '/manage/product-size';
        let data = new FormData($('.new-product-size-form')[0]);
        callAjax(url, data, postMethodForm)
            .then(data => {
                let size = data.data;
                alertSuccess(data.message);
                let text = convertSizeToRowTable(size);
                $('.tbody-product-sze').prepend(text);
            })
            .catch(data => {
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
            });
    });

    $('#addProductSize').on('click', '.delete-size', function () {
        let id = $(this).attr('delete');
        $('.product_id').val(id);
        let url = '/manage/product-size/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccess(data.message);
                $(this).parents('tr').remove();
                countIndexTableOfPage();
            })
            .catch(data => {
                alertError(data.message);
            });
    });

    let sizeActive=0;
    let colorId=0;
    let color= $('#product-color-wrap');
    $('.add-product-color').click(function () {
            resetErrorBox();
            let id=$(this).attr('size');
            sizeActive=$(this).attr('name');
            $('#addProductColorTitle').html('Thêm màu cho cỡ: '+sizeActive);
            $('.product-size-id').val(id);

    });
    $('.new-product-color').click(function () {
        let url='/manage/product-color';
        let data=new FormData($('.new-product-color-form')[0]);
        resetErrorBox();
                callAjax(url,data,postMethodForm)
                    .then(data=>{
                        let color =data.data;
                        alertSuccess(data.message);
                        let row=convertColorToRowTable(color);
                      $("tbody[size="+sizeActive+"]").prepend(row);
                        $('.new-product-color-form').trigger('reset');
                    })
                    .catch(data=>{
                        let errors = convertErrorsToParagraph(data.responseJSON.errors);
                        errorBox.html(errors);
                    });
    });

   color.on('click','.edit-product-color',function () {
        resetErrorBox();
         colorId=$(this).attr('color');
        $('#editProductColorTitle').html('Cập nhật thông tin');
        let url='/manage/product-color/'+colorId+'/show';
        callAjax(url)
            .then(data=>{
                let color=data.data;
                $('.product-color').val(color.color);
                $('.color-quantity').val(color.quantity);
            });

    });
    $('.update-product-color').click(function () {
        let url='/manage/product-color/update/'+colorId;
        let data=new FormData($('.update-product-color-form')[0]);
        resetErrorBox();
        callAjax(url,data,postMethodForm)
            .then(data=>{
                let color =data.data;
                alertSuccess(data.message);
                let row=convertColorToRowTable(color);
                $(".edit-product-color[color="+colorId+"]").parents('tr').replaceWith(row);
                $('.new-product-color-form').trigger('reset');
            })
            .catch(data=>{
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
            });
    });

    color.on('click', '.destroy-product-color', function () {
        let id = $(this).attr('delete');
        let url = '/manage/product-color/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccess(data.message);
                $(this).parents('tr').remove();
                countIndexTableOfPage();
            })
            .catch(data => {
                alertError(data.message);
            });
    });

    product.on('click', '.delete-product', function () {
        let id = $(this).attr('delete');
        let url = '/manage/products/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccess(data.message);
                $(this).parents('tr').remove();
                countIndexTableOfPage();
            })
            .catch(data => {
                alertError(data.message);
            });
    });


    let coupon=$('#coupon');

    coupon.on('click', '.delete-coupon', function () {
        let id = $(this).attr('delete');
        let url = '/manage/coupons/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccessRe(data.message)
                    .then(data=>{
                        location.reload();
                    });

            })
            .catch(data => {
                alertError(data.message);
            });
    });

   $('.delete-slide').click(function () {
        let id = $(this).attr('delete');
        let url = '/manage/slides/' + id;
        destroyResourceByAjax(url)
            .then(data => {
                alertSuccessRe(data.message)
                    .then(data=>{
                        location.reload();
                    });

            })
            .catch(data => {
                alertError(data.message);
            });
    });

    //change password
        let userId=0;
        $('.change-user-password').click(function () {
            resetErrorBox();
            userId=$(this).attr('user');
            $('#change-password-form').trigger('reset');
        });
    $('.change-password').click (function () {
        resetErrorBox();
        let data = new FormData($('#change-password-form')[0]);
        let url = '/manage/change-password/' + userId;
        callAjax(url, data, postMethodForm)
            .done(data => {
                $('#changeUserPasswordModal').modal('hide');
                alertSuccess(data.message);
            })
            .fail(data => {
               resetErrorBox();
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
            });
    });

});


