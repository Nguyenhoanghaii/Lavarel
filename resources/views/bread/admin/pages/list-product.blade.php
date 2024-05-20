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
                  <th> Type </th>
                  <th> Description </th>
                  <th> Price </th>
                  <th> Discount Price </th>
                  <th> Image </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)

                <tr class="table-info">
                  <td> {{ $product->id }} </td>
                  <td> {{ $product->name }} </td>
                  <td> {{ $product->id_type }} </td>
                  <td> {{ $product->description }} </td>
                  <td> {{ $product->unit_price }} </td>
                  <td> {{ $product->promotion_price }} </td>
                  <td> {{ asset('image/product/' . $product->image) }} </td>
                  <td>
                    <button class="btn btn-primary"> EDIT </button>
                    <button class="btn btn-danger"> DELETE </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
