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
    let editCategoryId=0;

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
        editCategoryId=$(this).attr('edit-id');
       let url=categoryPath+'/'+editCategoryId;
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
        let url=categoryPath+'/update/'+editCategoryId;
        callAjax(url,data,postMethodForm)
            .then(data=>{
                $('#editCategoryModal').modal('hide');
                alertSuccess(data.message);
                let row=convertCategoryToRowTable(data.data);
                $(".edit-category[edit-id=" + editCategoryId + "]").parents('tr').replaceWith(row);
                countIndexTableOfPage();
            })
            .catch(data=>{
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
                $('.category-name').focus();
            });
    });

});

