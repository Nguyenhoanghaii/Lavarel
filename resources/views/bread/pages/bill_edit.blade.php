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
                                <label for="email">id :</label>
                                <input type="text" class="form-control" id="email" name="id" value="{{ $item->id }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Name :</label>
                                <input type="text" class="form-control" id="email" name="name" value="{{ $item->name }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Gender :</label>
                                <input type="text" class="form-control" id="email" name="gender" value="{{ $item->gender }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Phone :</label>
                                <input type="text" class="form-control" id="email" name="phone" value="{{ $item->phone }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Address :</label>
                                <input type="text" class="form-control" id="email" name="address" value="{{ $item->address }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Status :</label>
                                <input type="text" class="form-control" id="email" name="status" value="{{ $item->status }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Total :</label>
                                <input type="text" class="form-control" id="email" name="total" value="{{ $item->total }}" >
                            </div>
                            
                        </th>
                        <th rowspan="{{ count($item->billDetail) + 1 }}" style="text-align: center">
                        
                       
                            <button type="submit" class="btn btn-success">submit</button>
                       
                        </th>
                    
                        
                    </tr>
                    {{-- @foreach ($item->billDetail as $detail)
                        <tr>
                        
                            <td>id prodcut : {{ $detail->id_product }} </br>
                                So luong : {{ $detail->quantity }} </br>
                                Name: {{ $detail->product->name }} </br>
                                Loai san pham: {{ $detail->product->typeProduct->name }} </br>
                            </td>
                            
                        </tr>
                        
                    @endforeach --}}
                    
                    
                @endforeach
                



            </table>
    </form>
    
</body>

</html>
