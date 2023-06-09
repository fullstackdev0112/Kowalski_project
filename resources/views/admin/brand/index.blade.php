@extends('admin.layouts.app')
@section('title','Brand | ')
@section('content')

    <x-admin-header title="Brands">
        <a href="{{route('admin.brand.create')}}" class="btn btn-dark">
            <i class="fas fa-plus"></i> New Brand
        </a>
    </x-admin-header>

    <x-admin-content>
        <div class="card">
            <div class="card-body table-responsive p-0 radius-top">
                <table class="table table-striped table-valign-middle">
                    <thead class="bg-gray-dark">
                    <tr>
                        <th>
                            <input type="checkbox">
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Identifier</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $key => $c)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>
                            <td>
                                @if($c->logo)
                                    <img src="{{ $c->logo->getUrl('thumb') }}"
                                         class="img-circle img-size-32 mr-2" alt="">
                                @endif
                            </td>
                            <td>{{$c->identifier}}</td>
                            <td>
                                <a href="{{route('admin.brand.edit',$c->id)}}" class="text-dark">
                                    <i class="fas fa-pen"></i>
                                </a> &nbsp;
                                <a href="{{route('admin.brand.destroy',$c->id)}}" class="text-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex clearfix">
            <x-admin.pagination :collection="$brands"/>
        </div>
    </x-admin-content>
@endsection
