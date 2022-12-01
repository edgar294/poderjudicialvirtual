@extends('layouts.app')

@section('content')
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- Summary -->
        <section class="resume-section" id="perfil">
            @include('sections/auth/summary')
        </section>
        <hr class="m-0" />
        <!-- Products -->
        <section class="resume-section" id="productos">
            @include('sections/auth/products')
        </section>
        <hr class="m-0" />
        <!-- Form Product -->
        @if(Session::get('showForm'))
            <section class="resume-section" id="productos">
                @include('sections/auth/product-form')
            </section>
            <hr class="m-0" />
        @endif
        <!-- Puchases -->
        <section class="resume-section" id="compras">
            @include('sections/auth/purchases')
        </section>
        <hr class="m-0" />
        <!-- Invoices -->
        <section class="resume-section" id="facturas">
            @include('sections/auth/invoices')
        </section>
        <hr class="m-0" />
        <!-- Detail Invoice -->
        @if(Session::get('bill'))
            <section class="resume-section" id="detallefactura">
                @include('sections/auth/detail-invoice')
            </section>
            <hr class="m-0" />
        @endif
    </div>
@endsection