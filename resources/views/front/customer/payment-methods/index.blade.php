@extends('front.layouts.default')
@section('title','My Payment Methods | ')
@section('content')
    <nav class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Breadcrumb -->
                    <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
                        <li class="breadcrumb-item">
                            <a class="text-gray-400" href="{{route('welcome')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{__('Payment Methods')}}
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </nav>

    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

                    <!-- Heading -->
                    <h3 class="mb-10">{{__('Payment Methods')}}</h3>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">

                    <!-- Nav -->
                    @include('front.customer.partials.menu')

                </div>
                <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

                    <div class="row">
                        <div class="col-12 col-lg-6">

                            <!-- Card -->
                            <div class="card card-lg bg-light mb-8">
                                <div class="card-body">

                                    <!-- Heading -->
                                    <h6 class="mb-6">
                                        Debit / Credit Card
                                    </h6>

                                    <!-- Text -->
                                    <p class="mb-5">
                                        <strong>Card Number:</strong> <br>
                                        <span class="text-muted">4242 ∙∙∙∙ ∙∙∙∙ 7856 (Mastercard)</span>
                                    </p>

                                    <!-- Text -->
                                    <p class="mb-5">
                                        <strong>Expiry Date:</strong> <br>
                                        <span class="text-muted">Feb 2022</span>
                                    </p>

                                    <!-- Text -->
                                    <p class="mb-0">
                                        <strong>Name on Card:</strong> <br>
                                        <span class="text-muted">Daniel Robinson</span>
                                    </p>

                                    <!-- Action -->
                                    <div class="card-action card-action-right">

                                        <!-- Button -->
                                        <a class="btn btn-xs btn-circle btn-white-primary" href="account-payment-edit.html">
                                            <i class="fe fe-edit-2"></i>
                                        </a>

                                        <!-- Button -->
                                        <button class="btn btn-xs btn-circle btn-white-primary">
                                            <i class="fe fe-x"></i>
                                        </button>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-12">

                            <!-- Button -->
                            <a class="btn btn-block btn-lg btn-outline-border" href="account-payment-edit.html">
                                Add Payment Method <i class="fe fe-plus"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
