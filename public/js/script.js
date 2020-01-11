$(function () {
    //setup ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let getMethodForm = 'get';
    let postMethodForm = 'post';
    let categoryPath='/manage/categories';
    $('.new-category').click(function () {
        let data=new FormData($('.new-category-form')[0]);

        callAjax(categoryPath,data,postMethodForm)
            .then(data=>{
                console.log(data);
            })
            .catch(data=>{
                console.log(data);
            });
    })
});

