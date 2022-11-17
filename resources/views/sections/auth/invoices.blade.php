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
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Impuesto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <th scope="row">{{ $factura->id }}</th>
                    <td>{{ $factura->user->name }}</td>
                    <td>{{ $factura->compra->producto->nombre }}</td>
                    <td>{{ number_format($factura->costo, 2) }}</td>
                    <td>{{ number_format($factura->impuesto, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>