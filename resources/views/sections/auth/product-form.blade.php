<section class="resume-section" id="nuevo-producto">
    <div class="resume-section-content">
        @if(Session::has('errors'))
            <div class="alert alert-danger" role="alert">
                {!! Session::get('errors') !!}
            </div>
        @endif
        @php
            $product = Session::get('product');
        @endphp
        @if($product && $product->id)
            <h1 class="mb-4">
                <span class="text-primary">
                    Editar Producto
                </span>
            </h1>
            <form method="POST" action="{{ route('productos.update', ["id" => $product->id]) }}">
                @method('patch')
        @else
            <h1 class="mb-4">
                <span class="text-primary">
                    Nuevo Producto
                </span>
            </h1>
            <form method="POST" action="{{ route('productos.store') }}">
        @endif
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                    placeholder="Introduzca el Nombre" value="{{ $product->nombre ?? '' }}">
                <small id="nameHelp" class="form-text text-muted">Nombre del producto</small>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp"
                    placeholder="Introduzca el Precio" value="{{ $product->precio ?? '' }}">
                <small id="priceHelp" class="form-text text-muted">Precio del producto CON IMPUESTO INCLUIDO</small>
            </div>
            <div class="form-group">
                <label for="tax">% de Impuesto</label>
                <input type="number" class="form-control" id="tax" name="tax" aria-describedby="taxHelp"
                    placeholder="Introduzca el % de Impuesto" value="{{ $product->impuesto ?? '' }}">
                <small id="taxHelp" class="form-text text-muted">% de impuesto aplicado al Precio</small>
            </div>
            <a href="{{ route('productos.cancel') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</section>