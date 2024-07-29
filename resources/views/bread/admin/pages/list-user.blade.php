@extends('bread.admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Table with contextual classes</h4>
                        <p class="card-description"> Add class <code>.table-{color}</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Full name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> Address </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($users as $user)

                <tr class="table-info">
                  <td> {{ $user->id }} </td>
                  <td> {{ $user->full_name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->phone }} </td>
                  <td> {{ $user->address }} </td>
                  <td>
                    <button class="btn btn-primary"> EDIT </button>
                    <button class="btn btn-danger"> DELETE </button>
                  </td>
                </tr>
                @endforeach --}}
                                </tbody>
                            </table>
                            <div id="pagination">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            getUsers();
        });
        async function getUsers(page = 1) {
            let data = await callApi("/api/user-with-pagination", 'get', {
                page: page
            });
            console.log(data.data.data);
            await reWriteTable(data.data.data);
            await reWritePagination(data.data.last_page, data.data.current_page);
        }

        async function reWriteTable(data) {
            $('tbody').children().remove();

            let str = ``;
            data.forEach(element => {
                let e = `<tr>
                <th>${element.id}</th>
                <th>${element.full_name}</th>
                <th>${element.email}</th>
                <th>${element.phone}</th>
                <th>${element.address}</th>
                <th><button onclick="deleUser(${element.id})">delete</button>
                      <button onclick="editUser(${element.id})">edit</button>
                  </th>
                            </tr>`;
                str = `${str}${e}`
            });
            $('tbody').append(str);
        }

        async function reWritePagination(lastPage, currentPage) {
            $('#pagination').children().remove();
            let paginagte =
                `<nav aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" onclick="getUsers(${currentPage - 1})">Previous</a></li>`;
            for (let index = 1; index <= lastPage; index++) {
                paginagte = `${paginagte}
        <li class="page-item ${currentPage == index && 'active'}">
            <a class="page-link" onclick="getUsers(${index})">${index}</a>
            </li>`

            }

            paginagte = `${paginagte}<li class="page-item"><a class="page-link" onclick="getUsers(${currentPage + 1})">Next</a></li>
            </ul>
          </nav>`

            $('#pagination').append(paginagte);
        }

        async function callApi(url, method, objectData = null) {
            return await $.ajax({
                url: url,
                method: method,
                data: objectData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + getCookie('api_token')
                },
            }).done(function(data) {
                return data
            });
        }

        function getCookie(name) {
            function escape(s) {
                return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1');
            }
            var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
            return match ? match[1] : null;
        }
    </script>
@endsection
