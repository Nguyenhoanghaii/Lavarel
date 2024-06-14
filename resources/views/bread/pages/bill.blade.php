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
    <table style="width:50%">
        @foreach ($bill as $item)
            <tr>
                <th rowspan="{{ count($item->billDetail) + 1 }}" style="text-align: left">
                    id : {{ $item->id }} <br>
                    Name : {{ $item->name }} <br>
                    Gender: {{ $item->gender }} <br>
                    Email: {{ $item->email }} <br>
                    Phone: {{ $item->phone }} <br>
                    Address: {{ $item->address }} <br>
                    Status: {{ $item->status }} <br>
                    Total: {{ $item->total }} <br>
                </th>
                <th rowspan="{{ count($item->billDetail) + 1 }}" style="text-align: center">
                  <a href="/delete/{{$item->id}}"> 
                    <button  type="button" class="btn btn-danger">Delete</button>
                  </a>
                  <a href="/edit/{{$item->id}}">
                    <button type="button" class="btn btn-success">Edit</button>
                  </a> 
                </th>
               
                
            </tr>
            @foreach ($item->billDetail as $detail)
                <tr>
                  
                    <td>id prodcut : {{ $detail->id_product }} </br>
                        So luong : {{ $detail->quantity }} </br>
                        Name: {{ $detail->product->name }} </br>
                        Loai san pham: {{ $detail->product->typeProduct->name }} </br>
                        Giá: {{ $detail->unit_price }} </br>
                    </td>
                    
                </tr>
                
            @endforeach
            
            
        @endforeach
        

        {{-- @endforeach --}}


    </table>
</body>

</html>
