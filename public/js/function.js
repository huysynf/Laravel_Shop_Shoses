
alertSuccess = (message) => {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: message,
        showConfirmButton: true,
        confirmButtonText: 'ok'
    });
};

 alertError=(message)=>{
    Swal.fire({
        icon: 'error',
        title: 'Oops...:',
        text: message,
    });
};

//curd resource
function callAjax(url, data = null, type = 'get') {
    return $.ajax({
        url: url,
        type: type,
        data: data,
        processData: false,
        contentType: false,
    });
}
destroyResourceByAjax = (url) => {
    return new Promise(((resolve, reject) => {
        Swal.fire({
            title: 'Xác nhận xóa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa ',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.value) {
                callAjax(url, null, 'delete')
                    .done(data => {
                        resolve(data);
                    })
                    .fail(data => {
                        reject(data);
                    });
            }
        });
    }))
};

//count row table
function countIndexTableOfPage() {
    let index = 1;
    $("tr td strong").each(function () {
        $(this).text(index);
        index++;
    });
}



//show image when chose
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.image-show').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(".image-input").change(function () {
    readURL(this);
});
