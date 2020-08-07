<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th>
            Número de la orden
        </th>
        <td>
            {{ $order->id }}
        </td>
    </tr>
    <tr>
        <th>
            Fecha
        </th>
        <td>
            {{ $order->created_at }}
        </td>
    </tr>
    <tr>
        <th>
            Cliente
        </th>
        <td>
            {{ $order->customer_firstname }} {{ $order->customer_lastname }}
        </td>
    </tr>
    <tr>
        <th>
            Descripción de la orden
        </th>
        <td>
            {{ $order->comment }}
        </td>
    </tr>
    <tr>
        <th>
            Products
        </th>
        <td>
            @foreach($order->products as $id => $products)
                <span class="label label-info label-many">{{ $products->name }}</span> <br>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>
            Impuesto
        </th>
        <td>
            {{ $order->tax }}
        </td>
    </tr>
    <tr>
        <th>
            total
        </th>
        <td>
            {{ $order->total }}
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
