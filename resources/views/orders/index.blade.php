@extends('layouts.app')

@section('content')


        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("order.create") }}">
                   Agregar Orden
                </a>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
            Lista de ordenes
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Número
                        </th>
                        <th>
                            Estatus
                        </th>
                        <th>
                            Nombre Cliente
                        </th>
                        <th>
                            Apellido Cliente
                        </th>
                        <th>
                           Comentario
                        </th>
                        <th>
                            Productos
                        </th>
                        <th>
                            impuesto
                        </th>
                        <th>
                            Total
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->status ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_firstname ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_lastname ?? '' }}
                            </td>
                            <td>
                                {{ $order->comment ?? '' }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($order->products as $key => $item)
                                        <li>{{ $item->name }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $order->tax ?? '' }}
                            </td>
                            <td>
                                {{ $order->total ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('order.show', $order->id) }}">
                                        Detalle
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('order.edit', $order->id) }}">
                                        Editar
                                    </a>

                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Esta Seguro');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Borrar">
                                    </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
