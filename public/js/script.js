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

    $('.add-category').click(function () {
            $('.new-category-form').trigger('reset');
            resetErrorBox();
    });

    $('.new-category').click(function () {
        let data=new FormData($('.new-category-form')[0]);
        callAjax(categoryPath,data,postMethodForm)
            .then(data=>{
                alertSuccess(data.message);
                let row=convertCategoryToRowTable(data.data);
                tableBody.prepend(row);
                countIndexTableOfPage();
            })
            .catch(data=>{
                console.log(data);
            });
    })
});

