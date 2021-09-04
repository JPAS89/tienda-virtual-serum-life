@extends ('layouts.app')
@section ('seccion')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
          
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="jumbotron text-center">
                <h1 class="display-3">Gracias por su compra!</h1>
                <p class="lead"><strong>Revisa el historial de pedidos para ver detalles o descargar el comprobante </strong> o anular el pedido si lo necesitas.</p>
                <hr>
                <p>
                <a class="btn btn-primary btn-sm" href="{{ route('listaPedidos')}}" role="button">Ver mis pedidos</a>

                </p>
                <p class="lead">
                <a href="{{ route('catalogo')}}" class="btn btn-dark btn-sm">Continuar Comprando</a>
                </p>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->

        </div>
    </div>
</div>
@endsection
