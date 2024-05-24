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
                  <th> Name </th>
                  <th> Gender </th>
                  <th> Email </th>
                  <th> Address </th>
                  <th> Phone </th>
                  <th> Note </th>
                  <th> Payment Method </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)

                <tr class="table-info">
                  <td> {{ $order->id }} </td>
                  <td> {{ $order->name }} </td>
                  <td> {{ $order->gender }} </td>
                  <td> {{ $order->email }} </td>
                  <td> {{ $order->address }} </td>
                  <td> {{ $order->phone }} </td>
                  <td> {{ $order->note }} </td>
                  <td> {{ $order->payment_method }} </td>
                  <td>
                    <button class="btn btn-primary"> EDIT </button>
                    <button class="btn btn-danger"> DELETE </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?page={{ $orders->currentPage() - 1 }}">Previous</a></li>
                @for ($i = 1; $i <= $orders->lastPage(); $i++)
                    <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="?page={{ $i }}"> {{ $i }}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="?page={{ $orders->currentPage() + 1 }}">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
