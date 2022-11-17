<div class="resume-section-content">
    <h1 class="mb-0">
        <span class="text-primary">Productos</span>
    </h1>
    <div class="subheading mb-5">
        Lista de productos disponibles
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">% Impuesto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ number_format($producto->impuesto, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>