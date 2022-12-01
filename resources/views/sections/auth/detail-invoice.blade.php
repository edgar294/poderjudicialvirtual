<div class="resume-section-content">
    @php
        $bill = Session::get('bill');
    @endphp
    <h1 class="mb-0">
        <span class="text-primary">Detalle Factura {{ $bill->id }}</span>
    </h1>
    <div class="subheading">Usuario: {{ $bill->user->name }}</div>
    <div class="subheading">Subtotal: {{ number_format($bill->total_costo, 2) }}</div>
    <div class="subheading">Impuesto: {{ number_format($bill->total_impuesto, 2) }}</div>
    <div class="subheading">Total: {{ number_format($bill->total_costo + $bill->total_impuesto, 2) }}</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Impuesto</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ number_format($detalle->costo, 2) }}</td>
                    <td>{{ number_format($detalle->impuesto, 2) }}</td>
                    <td>{{ number_format($detalle->costo + $detalle->impuesto, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>