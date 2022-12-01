<div class="resume-section-content">
    <h1 class="mb-0">
        <span class="text-primary">
            Productos
        </span>
        @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('productos.create') }}" class="text-white">
                <button type="button" class="btn btn-success">
                    Nuevo
                </button>
            </a>
        @endif
    </h1>
    <div class="subheading mb-5">
        Lista de productos disponibles
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">% Impuesto</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ number_format($producto->impuesto, 2) }}%</td>
                    <td>
                        @if(Auth::user()->hasRole('admin'))
                            <a href="{{ route('productos.edit', ["id" => $producto->id]) }}">
                                <button type="button" class="btn btn-info">
                                    Editar
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger"
                                onclick="event.preventDefault();
                                document.getElementById('detele-{{ $producto->id }}').submit();">
                                Eliminar
                            </button>
                            <form
                                id="detele-{{ $producto->id }}"
                                action="{{ route('productos.delete', ["id" => $producto->id]) }}"
                                method="post"
                                class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        @elseif(Auth::user()->hasRole('client'))
                            <a href="{{ route('productos.buy', ["producto" => $producto]) }}">
                                <button type="button" class="btn btn-success">
                                    Comprar
                                </button>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>