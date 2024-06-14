<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <form action="{{ route('info.edit') }}" method="get">
        <table style="width:50%">
            @foreach ($bill as $item)
                <tr>
                    <th rowspan="{{ count($item->billDetail) + 1 }}" style="text-align: left">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="email" name="id"
                                value="{{ $item->id }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Name :</label>
                            <input type="text" class="form-control" id="email" name="name"
                                value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Gender :</label>
                            <input type="text" class="form-control" id="email" name="gender"
                                value="{{ $item->gender }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $item->email }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Phone :</label>
                            <input type="text" class="form-control" id="email" name="phone"
                                value="{{ $item->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Address :</label>
                            <input type="text" class="form-control" id="email" name="address"
                                value="{{ $item->address }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Status :</label>
                            <input type="text" class="form-control" id="email" name="status"
                                value="{{ $item->status }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Total :</label>
                            <input type="text" class="form-control" id="email" name="total"
                                value="{{ $item->total }}">
                        </div>

                    </th>
                    <th rowspan="{{ count($item->billDetail) + 1 }}" style="text-align: center">


                        <button type="submit" class="btn btn-success">submit</button>

                    </th>


                </tr>
                @foreach ($item->billDetail as $detail)
                    <tr>

                        <td>
                            <div class="form-group">
                                <label for="email">id :</label>
                                <input type="text" class="form-control" id="email" value="{{ $detail->id }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">id product :</label>
                                <input type="text" class="form-control" id="email"
                                    name="{{ $detail->id }}-id_product" value="{{ $detail->id_product }}">
                            </div>
                            <div class="form-group">
                                <label for="email">So luong :</label>
                                <input type="text" class="form-control" id="email"
                                    name="{{ $detail->id }}-quantity" value="{{ $detail->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Name :</label>
                                <input type="text" class="form-control" id="email"
                                    value="{{ $detail->product->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Loai san pham :</label>
                                <input type="text" class="form-control" id="email" name="type"
                                    value="{{ $detail->product->typeProduct->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Giá :</label>
                                <input type="text" class="form-control" id="email"
                                    name="{{ $detail->id }}-unit_price" value="{{ $detail->unit_price }}">
                            </div>

                        </td>

                    </tr>
                @endforeach
            @endforeach




        </table>
    </form>

</body>

</html>
