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
                            onclick="onCreate()">Create</button>
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
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infoUser as $item)
                                            <tr id="{{ $item->id }}">
                                                <th>{{ $item->full_name }}</th>
                                                <th>{{ $item->phone }}</th>
                                                <th>{{ $item->address }}</th>
                                                <th>{{ $item->email }}</th>
                                                <th>
                                                    <button onclick="deleUser({{ $item->id }})"
                                                        class="btn btn-danger">delete</button>
                                                    <button onclick="edit({{ $item->id }})" type="button"
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
                                                        <label for="recipient-name" class="col-form-label">Phone:</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address"
                                                            value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                                        <input type="text" class="form-control" id="email"
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
        let isCreate = false;

        function onCreate() {
            isCreate = true;
            $('#name').val('')
            $('#phone').val('')
            $('#email').val('')
            $('#address').val('')
        }

        function onEdit() {
            isCreate = false;
        }

        function deleUser(id) {

            $.ajax({
                    method: "GET",
                    url: "/api/user/" + id
                })
                .done(function(data) {
                    alert("Data Saved: " + data.message);
                    $('tbody').children().remove();

                    let str = ``;
                    data.data.forEach(element => {
                        let e = `<tr>
                                <th>${element.full_name}</th>
                                <th>${element.phone}</th>
                                <th>${element.address}</th>
                                <th>${element.email}</th>
                                <th>
                                    <button onclick="deleUser(${element.id})" class="btn btn-danger">delete</button>
                                    <button onclick="edit(${element.id})" type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal"
                                                        onclick="onEdit()">edit</button>
                                    </th>
                                          </tr>`;
                        str = `${str}${e}`
                    });
                    $('tbody').append(str);
                });

        }

        function handleSubmit() {
            let id = $('#id').val()
            if (isCreate) {
                createUser();
            } else {
                editUser(id);
            }
        }

        function edit(id) {
            $.ajax({
                    method: "GET",
                    url: "/api/edit/" + id
                })
                .done(function(data) {
                    $('#name').val(data.data.full_name)
                    $('#phone').val(data.data.phone)
                    $('#email').val(data.data.email)
                    $('#address').val(data.data.address)
                    $('#id').val(data.data.id)
                });
        }

        function editUser(id) {
            let full_name = $('#name').val()
            let phone = $('#phone').val()
            let address = $('#address').val()
            let email = $('#email').val()
            $.ajax({
                    method: "POST",
                    url: "/api/submit/" + id,
                    data: {
                        full_name,
                        phone,
                        address,
                        email
                    }
                })
                .done(function(data) {
                    console.log("data", data.data);
                    let [name, phone, address, email] = $(`#${data.data.id}`)[0].children;
                    name.innerHTML = data.data.full_name
                    phone.innerHTML = data.data.phone
                    address.innerHTML = data.data.address
                    email.innerHTML = data.data.email

                    $('#exampleModal').modal('hide')
                });
        }

        function createUser(id) {
            let full_name = $('#name').val()
            let phone = $('#phone').val()
            let address = $('#address').val()
            let email = $('#email').val()
            $.ajax({
                    method: "POST",
                    url: "/api/user/create",
                    data: {
                        full_name,
                        phone,
                        address,
                        email
                    }
                })
                .done(function(data) {
                    $('tbody').children().remove();

                    let str = ``;
                    data.data.forEach(element => {
                        let e = `<tr>
                                <th>${element.full_name}</th>
                                <th>${element.email}</th>
                                <th>${element.phone}</th>
                                <th>${element.address}</th>
                                <th>
                                    <button onclick="deleUser(${element.id})" class="btn btn-danger">delete</button>
                                    <button onclick="edit(${element.id})" type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal"
                                                        onclick="onEdit()">edit</button>
                                    </th>
                                          </tr>`;
                        str = `${str}${e}`
                    });
                    $('tbody').append(str);

                    $('#exampleModal').modal('hide')
                });
        }
    </script>
@endsection
