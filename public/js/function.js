
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


//brand
function convertBrandToRowTable(brand) {
    return `
    <tr>
        <td><strong></strong></td>
        <td><img src="/images/brands/${brand.image}"
                 style="max-width: 50px;max-height: 50px;" width="100%" height="100%"
                 alt="${brand.name}">
        </td>
        <td>${brand.name}</td>
        <td>
            <button class="btn btn-circle btn-outline-primary  edit-brand"
                    data-toggle="modal" data-target="#editBrandModal"
                    edit="${brand.id}" title="Cập nhật thông tin"><i
                    class="fa fa-pen"></i></button>
            <button class="btn btn-circle btn-outline-danger delete-brand" delete="${brand.id}"
                    title="Xóa sản phầm"><i class="fa fa-times"></i></button>
        </td>
     </tr>
    `;
}

//upload file
$('#file-image').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
});
function converImageToImageItem(images) {
    let text="";
    images.forEach(image=>{
        text+=` <div class="position-relative p-2 " style="cursor: pointer;width:100px ;height:100px ;border: 1px solid">
                    <img src="/images/products/${image.image}" alt="" width="100px" height="100px"
                         style="max-height: 100%;max-width: 100%" >
                    <span class="delete-image-product position-absolute" delete="${image.id}" style="top: 0;right: 0" title="Xóa ảnh"><i class="fa fa-times text-danger "></i></span>
                </div>
        `;
    });
    return text;
    }
