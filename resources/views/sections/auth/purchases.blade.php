<div class="resume-section-content">
    <h1 class="mb-0">
        <span class="text-primary">Compras</span>
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
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <th scope="row">{{ $compra->id }}</th>
                    <td>{{ $compra->user->name }}</td>
                    <td>{{ $compra->producto->nombre }}</td>
                    <td>{{ number_format($compra->producto->precio, 2) }}</td>
                    <td>{{ number_format($compra->producto->impuesto, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>