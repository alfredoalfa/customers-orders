@extends('layouts.app')

@section('content')
    <p>Generar Orden</p>
    <form action="{{ route("order.store") }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="customer_firstname">Nombre</label>
            <input type="text" id="customer_firstname" name="customer_firstname" class="form-control" value="{{ old('customer_firstname', isset($order) ? $order->customer_firstname : '') }}" required>
        </div>

        <div class="form-group">
            <label for="customer_lastname">Apellido</label>
            <input type="text" id="customer_lastname" name="customer_lastname" class="form-control" value="{{ old('customer_lastname', isset($order) ? $order->customer_lastname : '') }}" required>
        </div>

        <div class="form-group">
            <label for="status">Estatus</label>
            <input type="text" id="status" name="status" class="form-control" value="{{ old('status', isset($order) ? $order->status : '') }}" required>
        </div>

        <div class="form-group">
            <label for="comment">Comentarios</label>
            <input type="text" id="comment" name="comment" class="form-control" value="{{ old('comment', isset($order) ? $order->comment : '') }}" required>
        </div>

        <div class="form-group">
            <label for="tax">Impuesto</label>
            <input type="number" id="tax" name="tax" class="form-control" value="{{ old('tax', isset($order) ? $order->tax : '') }}" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" id="total" name="total" class="form-control" value="{{ old('total', isset($order) ? $order->total : '') }}" required>
        </div>


        <div class="card">
            <div class="card-header">
                Productos
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="product0">
                        <td>
                            <select name="products[]" class="form-control">
                                <option value="">-- Seleccione Producto --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" value="1" />
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-default pull-left">Agregar Producto</button>
                        <button id='delete_row' class="pull-right btn btn-danger">Borrar Producto</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="Guardar">
        </div>
    </form>
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#product" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });
</script>
