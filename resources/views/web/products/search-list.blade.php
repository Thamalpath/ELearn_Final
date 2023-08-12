@extends('layouts.web2')

@section('title', 'Search Results')

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Search Results</h2>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
@endsection

@section('content')
    <!-- Shop Page Start  -->
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-last col-md-12 order-md-first">

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <!-- Tab Content Area Start -->
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px">
                                            @foreach ($products as $product)
                                                <x-product.list-item :product="$product" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End  -->

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.min.css">
    @endpush

    @if (isset($noResults) && $noResults)
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.all.min.js"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No products match your search.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('home') }}";
                    }
                });
            </script>
        @endpush
    @endif
@endsection
