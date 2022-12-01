@extends('layouts.app')

@section('content')
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            @include('sections/guest/about')
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            @include('sections/guest/experience')
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            @include('sections/guest/education')
        </section>
        <hr class="m-0" />
        @if (Route::has('login'))
            <!-- Login -->
            @include('sections/guest/login')
        @endif
        @if (Route::has('register'))
            <!-- Register -->

            @include('sections/guest/register')
        @endif
    </div>
@endsection