@extends('admin.master')

@section('title')
    Admin-Inventory
@endsection

@section('content')


<div class="row state-overview">
{{-- user --}}
    <div class="col-lg-4 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-users"></i>
            </div>
            <div class="value">
                <h1 class="colunt">
                    {{ $user }}
                </h1>
                <p>Employees</p>
            </div>
        </section>
    </div>
{{-- enduser --}}

{{-- category --}}
    <div class="col-lg-4 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class="fa fa-th"></i>
            </div>
            <div class="value">
                <h1 class=" counct2">
                    {{ $category }}
                </h1>
                <p>Totat Category</p>
            </div>
        </section>
    </div>
{{-- endCategory --}}

{{-- product --}}
    <div class="col-lg-4 col-sm-6">
        <section class="card">
            <div class="symbol yellow">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="value">
                <h1 class=" counct3">
                    {{ $product }}
                </h1>
                <p>Total Product</p>
            </div>
        </section>
    </div>
    {{-- endproduct --}}

    {{-- complateorder --}}
    <div class="col-lg-4 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-chain-broken"></i>
            </div>
            <div class="value">
                <h1 class=" counct3">
                    {{ $order }}
                </h1>
                <p>Complate Order</p>
            </div>
        </section>
    </div>
    {{-- endcomplteorder --}}
</div>


@endsection
