@extends('admin.master');
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simple Tables</h1>
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
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    </script>
@endsection
