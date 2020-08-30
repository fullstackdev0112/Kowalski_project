@extends('front.layouts.default')
@section('title','Career')
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
                            Career
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </nav>

    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h3 class="mb-10 text-center">Career</h3>

                </div>
            </div>
            <div class="row justify-content-between">
                <p class="text-center">No vacancy available right now</p>
            </div>
        </div>
    </section>
@endsection
