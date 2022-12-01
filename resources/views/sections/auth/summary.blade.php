
<div class="resume-section-content">
    <h2 class="mb-5">{{ Auth::user()->name }}</h2>
    <div class="subheading mb-3">Resumen</div>
    <ul class="fa-ul mb-0">
        @if(Auth::user()->hasRole('admin'))
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Total Compras: {{ \App\Models\Compra::count() }}
            </li>
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Total Facturas: {{ \App\Models\Factura::count() }}
            </li>
        @else
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Total Compras: {{ Auth::user()->compras()->count() }}
            </li>
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Total Facturas: {{ Auth::user()->facturas()->count() }}
            </li>
        @endif
    </ul>
</div>
