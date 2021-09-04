@extends ('layouts.app')

@section ('seccion')
<!-- Styles -->
<link href="{{ asset('css/detalleCompra.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Pedido
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #{{ $encabezado->id }}
            </small>

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="{{ route('listaPedidos') }}" data-title="Regresar">
                        <i class="mr-1 bi bi-reply text-primary-m1 text-120 w-2"></i>
                        Regresar
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="{{route ('ordenDetails', $encabezado->id )}}" data-title="PDF">
                        <i class="mr-1 bi bi-file-earmark-pdf text-danger-m1 text-120 w-2"></i>
                        Exportar
                    </a>
                </div>
            </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">SERUM LIFE</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Para:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{ $encabezado->name }} {{ $encabezado->secondName }}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Direccion: {{ $encabezado->address }}
                            </div>
                            <div class="my-1">
                                E-mail: {{ $encabezado->email }}
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{ $encabezado->telephone }}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Detalles de Pedido
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{ $encabezado->id }}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Fecha de Compra:</span> {{ $encabezado->created_at }}</div>
                            @if($encabezado->status == "Pendiente")
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{ $encabezado->status }}</span></div>
                            @endif
                            @if($encabezado->status == "Entregado")
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25">{{ $encabezado->status }}</span></div>
                            @endif
                            @if($encabezado->status == "Anulada")
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-danger badge-pill px-25">{{ $encabezado->status }}</span></div>
                            @endif
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="col-9 col-sm-5">Descripcion</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Cantidad</div>
                        <div class="d-none d-sm-block col-sm-2">Precio Unitario</div>
                        <div class="col-2">Subtotal</div>
                    </div>




                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            @foreach($detalle as $obj)
                            <div class="col-9 col-sm-5">{{ $obj->producto_nombre }}</div>
                            <div class="d-none d-sm-block col-2">{{ $obj->cantidad }}</div>
                            <div class="d-none d-sm-block col-2 text-95">{{ $obj->producto_price }}</div>
                            <div class="col-2 text-secondary-d2">{{ $obj->subTotal }}</div>
                            @endforeach
                        </div>

                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Si desea descargar este comprobante presione el boton exportar...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Monto Total
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">${{ $obj->total }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Gracias por su Compra</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection