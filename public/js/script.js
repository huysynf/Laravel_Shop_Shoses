$(function () {
    //setup ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    countIndexTableOfPage();
    let tableBody=$('tbody');
    let errorBox=$('.error-box');

    let getMethodForm = 'get';
    let postMethodForm = 'post';

    //category
    let categoryPath='/manage/categories';
    let category=$('#category');
    let categoryId=0;

    $('.category-select-parent').select2();

    $('.add-category').click(function () {
            $('.new-category-form').trigger('reset');
            resetErrorBox();
    });

    $('.new-category').click(function () {
        resetErrorBox();
        let data=new FormData($('.new-category-form')[0]);
        callAjax(categoryPath,data,postMethodForm)
            .then(data=>{
                $('#newCategoryModal').modal('hide');
                alertSuccess(data.message);
                let row=convertCategoryToRowTable(data.data);
                tableBody.prepend(row);
                countIndexTableOfPage();
            })
            .catch(data=>{
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.category-name').focus();
            });
    });

  category.on( 'click','.edit-category',function () {
        resetErrorBox();
        categoryId=$(this).attr('edit-id');
       let url=categoryPath+'/'+categoryId;
        callAjax(url)
            .then(data=>{
                $('.categoryName').val(data.data.name);
                let categoryParent="Không có";
                if(data.data.category !=null){
                    categoryParent=data.data.category.name;
                }
                $('.category-parent-name').html(categoryParent);
                $('.category-parent').val(data.data.category_id);
            })
    });


    $('.update-category').click(function () {
        let data=new FormData($('.update-category-form')[0]);
        let url=categoryPath+'/update/'+categoryId;
        callAjax(url,data,postMethodForm)
            .then(data=>{
                $('#editCategoryModal').modal('hide');
                alertSuccess(data.message);
                let row=convertCategoryToRowTable(data.data);
                $(".edit-category[edit-id=" + categoryId + "]").parents('tr').replaceWith(row);
                countIndexTableOfPage();
            })
            .catch(data=>{
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
        let message='Xác nhận Restore lại';
        alertConfirm(message)
            .then(data=>{
                callAjax(url,'',postMethodForm)
                    .then(data => {
                         alertSuccess(data.message);
                        location.reload();
                    })
                    .catch(data => {
                         alertError(data.message);
                    });

            })
            .catch(data=>{

            })

    });

    category.on('click', '.remove-category', function () {
        let id = $(this).attr('delete-id');
        let url = categoryPath + "/trash-delete/" + id;
        let message='Xác nhận Xóa luôn lại';
        alertConfirm(message)
            .then(data=>{
                callAjax(url,'',postMethodForm)
                    .then(data => {
                        alertSuccess(data.message);
                        location.reload();
                    })
                    .catch(data => {
                        alertError(data.message);
                    });

            })
            .catch(data=>{

            })

    });

        //product
    $('.product-select-category').select2();
    $('.product-select-brand').select2();

        //brands
        let brand=$('#brand');
        let brandPath='/manage/brands';
        let brandId=0;
        let brandModalTitle=$('#BrandModalTitle');

    $('.add-brand').click(function () {
        $('.new-brand-form').trigger('reset');
        resetErrorBox();
    });

    $('.new-brand').click(function () {
        resetErrorBox();
        let data=new FormData($('.new-brand-form')[0]);
        callAjax(brandPath,data,postMethodForm)
            .then(data=>{
                $('#BrandModal').modal('hide');
                alertSuccess(data.message);
                // let row=convertBrandToRowTable(data.data);
                // tableBody.prepend(row);
                location.reload();
                countIndexTableOfPage();
            })
            .catch(data=>{
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.brand-name').focus();
            });
    });


    brand.on('click','.edit-brand',function () {
        resetErrorBox();
        brandId=$(this).attr('edit');
        let url=brandPath+'/'+brandId;
        callAjax(url)
            .then(data=>{
                let brand=data.data;
                $('.brand-name').val(brand.name);
                $('.brand-image').attr('src','/images/brands/'+brand.image);
            })
    });

    $('.update-brand').click(function () {
        resetErrorBox();
        let data=new FormData($('.edit-brand-form')[0]);
        let url=brandPath+'/update/'+brandId;
        callAjax(url,data,postMethodForm)
            .then(data=>{
               $('#editBrandModal').modal('hide');
                alertSuccess(data.message);
                 let row=convertBrandToRowTable(data.data);
                $(".edit-brand[edit=" + brandId + "]").parents('tr').replaceWith(row);
                countIndexTableOfPage();
            })
            .catch(data=>{
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

    let product=$('#product');

    $('.new-image-product').click(function () {
            let url='/manage/product-image';
            let data=new FormData($('.new-image-form')[0]);
        console.log('oko');


    });

    product.on('click','.add-product-image',function () {
        let id=$(this).attr('add-image');
        $('.product_id').val(id);
        let url='/manage/product-image/'+id;
        callAjax(url)
            .then(data=>{

            });
    })
});

