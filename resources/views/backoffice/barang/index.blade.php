@extends('backoffice.layouts.app')

@section('title')
    Products
@endsection

@section('css')
@endsection

@section('page-heading')
    <h4>Products</h4>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary icon" data-bs-placement="top"
            title="Add Data" data-bs-toggle="modal" data-bs-target="#form-modal" onclick="addData()"><i class='bi bi-plus-square'></i></button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="me-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="form-modal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel18" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div id="modal-content" class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel18">Add Product</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-data" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Image</label>
                                        <br>
                                        <img id="output" />
                                        <input id="image" type="file" name="image" class="imgbb-filepond-image" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button id="btn-modal" type="button" class="btn btn-primary ml-1" onclick="storeData()">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Add</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script>
    let table = "";

    $(document).ready(function () {
        initializeTable()
    });

    function reinitializeTable() {
        $('#data-table').DataTable().clear().destroy()
        initializeTable()
    }

    function initializeTable() {
        table = $('#data-table').DataTable({
                processing: true,
                searching: true,
                serverSide: false,
                scrollX: true,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
                ajax: {
                    url: `{{ route('products.index') }}`,
                    method: 'GET',
                    statusCode: {
                        500: function(response) {
                            console.log(response)
                        },
                    },
                },
                columns: [
                    {
                        data: 'product_image',
                        name: 'product_image',
                        "mRender": function(data, type, row) {
                            return `<img src="${data}" width="50px" />`;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: 'link',
                        name: 'link',
                        "mRender": function(data, type, row) {
                            return `<a href="${data}" target="_blank">Open Link</a>`;
                        }

                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
            });
    }

    function storeData() {
        if (checkValidForm()) {
            let formData = new FormData($('#form-data')[0]);

            $.ajax({
                url: `{{ route('products.store') }}`,
                method: 'POST',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`
                },
                data: formData,
                statusCode: {
                    500: function(response) {
                        console.log(response)
                    },
                },
                success: function(response) {

                    $('#form-modal').modal('toggle');

                    Toastify({
                    text: `${response.message}`,
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#4fbe87",
                    }).showToast();

                    reinitializeTable()
                }
            })
        } else {
            Toastify({
                    text: "Empty form not allowed!",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#ff0000",
                    }).showToast();
        }
    }

    function updateData(id) {
        if (checkValidForm()) {
            let formData = new FormData($('#form-data')[0]);
            formData.append('_method', 'PUT')

            $.ajax({
                url:  `{{ url('admin/products') }}/${id}`,
                method: 'POST',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`
                },
                data: formData,
                statusCode: {
                    500: function(response) {
                        console.log(response)
                    },
                },
                success: function(response) {

                    $('#form-modal').modal('toggle');

                    Toastify({
                    text: `${response.message}`,
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#4fbe87",
                    }).showToast();

                    reinitializeTable()
                }
            })
        } else {
            Toastify({
                    text: "Empty form not allowed!",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#ff0000",
                    }).showToast();
        }
    }

    function doDeleteData(id) {
        $.ajax({
            url:  `{{ url('admin/products') }}/${id}`,
            method: 'DELETE',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`
            },
            statusCode: {
                500: function(response) {
                    console.log(response)
                },
            },
            success: function(response) {

                $('#form-modal').modal('toggle');

                Toastify({
                text: `${response.message}`,
                duration: 3000,
                close: true,
                gravity: "bottom",
                position: "right",
                backgroundColor: "#4fbe87",
                }).showToast();

                reinitializeTable()
            }
        })
    }

    function checkValidForm() {
        let name = $('#name').val();
        let description = $('#description').val();
        let link = $('#link').val();
        let output = $('#output').attr('src');

        if (name == "" || description == "" || link == "" || image == "") {
            return false;
        }

        return true;
    }

    function addData() {
        $('#modal-content').html(`
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel18">Add Product</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-data" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Image</label>
                                        <br>
                                        <img id="output" />
                                        <input id="image" type="file" name="image" class="imgbb-filepond-image" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button id="btn-modal" type="button" class="btn btn-primary ml-1" onclick="storeData()">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Add</span>
                        </button>
                    </div>
        `)
        createImageUpload()
    }

    function editData(id) {
        $.ajax({
                url: `{{ url('admin/products') }}/${id}`,
                method: 'GET',
                statusCode: {
                    500: function(response) {
                        console.log(response)
                    },
                },
                success: function(response) {
                    $('#modal-content').html(`
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel18">Edit Product</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-data" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="${response.data.name}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" class="form-control" id="description" name="description" value="${response.data.description}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-control" id="link" name="link" value="${response.data.link}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="link">Image</label>
                                                    <br>
                                                    <img id="output" src="${response.data.product_image}" />
                                                    <input id="image" type="file" name="image" class="imgbb-filepond-image" accept="image/*" onchange="loadFile(event)">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button id="btn-modal" type="button" class="btn btn-success ml-1" onclick="updateData(${id})">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Update</span>
                                    </button>
                                </div>
                    `)
                    createImageUpload()
                }
            })
    }

    function deleteData(id) {
        $('#modal-content').html(`
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel18">Delete Product</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button id="btn-modal" type="button" class="btn btn-danger ml-1" onclick="doDeleteData(${id})">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Delete</span>
                        </button>
                    </div>
        `)
    }
</script>
<script>

    function createImageUpload() {
        FilePond.create(document.querySelector(".imgbb-filepond-image"), {
        credits: null,
        allowImagePreview: false,
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort) => {

            const formData = new FormData();
            formData.append(fieldName, file, file.name);

            const request = new XMLHttpRequest();

            request.open(
                "POST",
                "https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2"
            );

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                load(request.responseText);
                } else {
                error("Error");
                }
            };

            request.onreadystatechange = function () {
                if (this.readyState == 4) {
                if (this.status == 200) {
                    let response = JSON.parse(this.responseText);

                    Toastify({
                    text: "Success uploading to imgbb!",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#4fbe87",
                    }).showToast();

                    $('#output').attr('src', response.data.image.url)
                } else {
                    Toastify({
                    text: "Failed uploading to imgbb!",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#ff0000",
                    }).showToast();
                }
                }
            };

            request.send(formData);
            },
        },
    });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
  </script>
@endsection
