@extends('admin.master');
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6" style="display: flex; gap: 20px">
                        <h1>Simple Tables</h1>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"
                            data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create</button>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Fixed Header Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap" id="table-data">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>id_type</th>
                                            {{-- <th>Status</th> --}}
                                            <th>unit_price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infoProduct as $item)
                                            <tr>
                                                <th>{{ $item->id }}</th>
                                                <th>{{ $item->name }}</th>
                                                <th>{{ $item->id_type }}</th>
                                                {{-- <th>{{$item->status}}</th> --}}
                                                <th>{{ $item->unit_price }}</th>
                                                <th>
                                                    <button onclick="deleteProduct({{ $item->id }})">delete</button>
                                                    <button onclick="editProduct({{ $item->id }})" type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal" data-whatever="@mdo"
                                                        onclick="onEdit()">edit</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New
                                                    message</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                                        <input type="text" class="form-control" id="name"
                                                            value="">
                                                        <input type="hidden" class="form-control" id="id"
                                                            value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Unit_price:</label>
                                                        <input type="text" class="form-control" id="unit_price"
                                                            value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">id_type:</label>
                                                        <input type="text" class="form-control" id="id_type"
                                                            value="">
                                                    </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button onclick="handleSubmit({{ $item->id }})" type="button"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        function deleteProduct(id) {

            $.ajax({
                    method: "GET",
                    url: "/api/product/" + id
                })
                .done(function(data) {
                    console.log(data);
                    alert("Data Saved: " + data.message);
                    $('tbody').children().remove();

                    let str = ``;
                    data.data.forEach(element => {
                        let e = `<tr>
                            <th> ${element.id}</th>
                            <th>${element.name}</th>
                            <th>${element.id_type}</th>
                            <th>${element.unit_price}</th>
                            <th>
                                <button onclick="deleteProduct(${element.id})">delete</button>
                            </th>
                        </tr>`;
                        str = `${str}${e}`
                    });
                    $('tbody').append(str);
                });

        }

        function createProduct() {
            let name = $('#name').val()
            let unit_price = $('#unit_price').val()
            let id_type = $('#id_type').val()
            $.ajax({
                    method: "POST",
                    url: "/api/product/create",
                    data: {
                        name,
                        unit_price,
                        id_type,
                    }
                })
                .done(function(data) {
                    $('tbody').children().remove();

                    let str = ``;
                    data.data.forEach(element => {
                        let e = `<tr>
                            <th>${element.id}</th>
                            <th>${element.name}</th>
                            <th>${element.id_type}</th>
                            <th>${element.unit_prce}</th>
                            <th><button onclick="deleUser(${element.id})">delete</button></th>
                                      </tr>`;
                        str = `${str}${e}`
                    });
                    $('tbody').append(str);

                    $('#exampleModal').modal('hide')
                });
        }

        function handleSubmit(id) {
            // if (isCreate) {
            createProduct();
            // } else {
            //     editUser(id);
            // }
        }
        function delete(id) {

            $.ajax({
                method: "GET",
                url: "/api/product/" + id
            })
            .done(function(data) {
                alert("Data Saved: " + data.message);
                $('tbody').children().remove();

                let str = ``;
                data.data.forEach(element => {
                    let e = `<tr>
                            <th>${element.name}</th>
                            <th>${element.id_type}</th>
                            <th>${element.unit_price}</th>
                            <th><button onclick="deleUser(${element.id})">delete</button></th>
                            <th><button onclick="edit(${element.id})">edit</button></th>
                                    </tr>`;
                    str = `${str}${e}`
                });
                $('tbody').append(str);
        });

    function editProduct(id) {
            $.ajax({
                    method: "GET",
                    url: "/api/product/edit/" + id
                })
                .done(function(data) {
                    $('#name').val(data.data.name)
                    $('#phone').val(data.data.unit_price)
                    $('#email').val(data.data.id_type)
                });
        }

}
    </script>
@endsection
