
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

alertConfirm = (message) => {
    return new Promise(((resolve, reject) => {
        Swal.fire({
            title: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok ',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.value) {
                resolve('ok');

            }
            else{
                reject('not ok');
            }
        });
    }))
};

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


//category
    function isNull(variable) {
        return variable==null;
    }
 function  convertCategoryToRowTable(category) {
        let categoryParent="Không có";
         if(!isNull(category.category)){
             categoryParent=category.category.name;
         }
        return ` <tr>
                    <td><strong></strong></td>
                    <td>${category.name}</td>
                    <td>${categoryParent}</td>
                    <td>
                        <a href="#"
                           class="btn btn-circle btn-outline-warning"
                           title="Cập nhật thông tin"
                           edit-id="${category.id}"
                           data-toggle="modal"
                           data-target="#editCategoryModal"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <button title="Xóa "
                                class="btn btn-circle btn-outline-danger delete-category"
                                delete-id="${category.id}"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>`;
}

function convertErrorsToParagraph(errors){
     let errorText="";
    Object.values(errors).forEach(error=>{
        errorText+=`<p>${error[0]}</p>`;
    });

    return errorText;
}

function resetErrorBox() {
        $('.error-box').html('');
}


