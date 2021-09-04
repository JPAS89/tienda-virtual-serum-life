<style>
    .modal-content {
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 6px;
        background-clip: padding-box;
        -webkit-box-shadow: 0 0 40px rgba(0, 0, 0, .5);
        -moz-box-shadow: 0 0 40px rgba(0, 0, 0, .5);
        box-shadow: 0 0 40px rgba(0, 0, 0, .5);
        color: #000;
        background-color: #fff;
        border: rgba(0, 0, 0, 0);
    }

    .modal-message .modal-dialog {
        width: 300px;
    }

    .modal-message .modal-body,
    .modal-message .modal-footer,
    .modal-message .modal-header,
    .modal-message .modal-title {
        background: 0 0;
        border: none;
        margin: 0;
        padding: 0 20px;
        text-align: center !important;
    }

    .modal-message .modal-title {
        font-size: 17px;
        color: #737373;
        margin-bottom: 3px;
    }

    .modal-message .modal-body {
        color: #737373;
    }

    .modal-message .modal-header {
        color: #fff;
        margin-bottom: 10px;
        padding: 15px 0 8px;
    }

    .modal-message .modal-header .fa,
    .modal-message .modal-header .glyphicon,
    .modal-message .modal-header .typcn,
    .modal-message .modal-header .wi {
        font-size: 30px;
    }

    .modal-message .modal-footer {
        margin: 25px 0 20px;
        padding-bottom: 10px;
    }

    .modal-backdrop.in {
        zoom: 1;
        filter: alpha(opacity=75);
        -webkit-opacity: .75;
        -moz-opacity: .75;
        opacity: .75;
    }

    .modal-backdrop {
        background-color: #fff;
    }

    .modal-message.modal-danger .modal-header {
        color: #d73d32;
        border-bottom: 3px solid #e46f61;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="modal-anular" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">

            </div>
            <div class="modal-title">Anular Pedido</div>

            <div class="modal-body">Seleccione una opcion</div>
            <div class="modal-footer">
                <form id="formAnular" action="{{route ('anularOrden', 1 )}}" data-action="{{route ('anularOrden', 1 )}}" method="POST">
                    @csrf @method('POST')

                    <button type="submit" class="btn btn-danger" id="delete-btn">Anular</button>

                </form>

                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>