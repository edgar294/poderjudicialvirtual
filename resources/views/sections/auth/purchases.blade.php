<div class="resume-section-content">
    <h1 class="mb-0">
        <span class="text-primary">Compras</span>
        @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('compras.buy') }}" class="text-white">
                <button type="button" class="btn btn-success">
                    Generar Facturas pendientes
                </button>
            </a>
        @endif
    </h1>
    <div class="subheading mb-5">
        Compras registradas en el sistema
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Impuesto</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <th scope="row">{{ $compra->id }}</th>
                    <td>{{ $compra->user->name }}</td>
                    <td>{{ $compra->producto->nombre }}</td>
                    @php
                        $costo = $compra->producto->precio / (($compra->producto->impuesto / 100) + 1);
                    @endphp
                    <td>{{ number_format($costo, 2) }}</td>
                    <td>
                        {{ number_format($compra->producto->precio - $costo, 2) }}
                        ({{ number_format($compra->producto->impuesto, 2) }}%)</td>
                    <td>{{ number_format($compra->producto->precio, 2) }}</td>
                    <td>
                        @if($compra->facturado)
                            <h4><span class="badge bg-success">Facturado</span></h4>
                        @else
                            <h4><span class="badge bg-warning">Pendiente</span></h4>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>