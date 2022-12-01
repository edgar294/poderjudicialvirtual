<div class="resume-section-content">
    <h1 class="mb-0">
        <span class="text-primary">Facturas</span>
    </h1>
    <div class="subheading mb-5">
        Facturas registradas en el sistema
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Impuesto</th>
                <th scope="col">Total</th>
                <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <th scope="row">{{ $factura->id }}</th>
                    <td>{{ $factura->user->name }}</td>
                    <td>{{ number_format($factura->total_costo, 2) }}</td>
                    <td>{{ number_format($factura->total_impuesto, 2) }}</td>
                    <td>{{ number_format($factura->total_costo + $factura->total_impuesto, 2) }}</td>
                    <td>
                        <a href="{{ route('compras.show', ['id' => $factura->id]) }}">
                            <button type="button" class="btn btn-info">
                                Ver Detalles
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>