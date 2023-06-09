@extends('admin.layouts.app')
@section('title','Category | ')
@section('content')

    <x-admin-header title="Categories">
        <a href="{{route('admin.category.create')}}" class="btn btn-dark">
            <i class="fas fa-plus"></i> New Category
        </a>
    </x-admin-header>

    <x-admin-content>
        <div class="card">

            <div class="card-body">
                <form method="get" autocomplete="off">
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" name="entity_id"
                                       class="form-control form-control-sm"
                                       value="{{request('entity_id')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"
                                       class="form-control form-control-sm"
                                       value="{{request('name')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Urlkey</label>
                                <input type="text" name="url_key"
                                       class="form-control form-control-sm"
                                       value="{{request('url_key')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                                <button type="submit" class="btn btn-info btn-sm"><i
                                            class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive p-0 radius-top">
                <table class="table table-striped table-valign-middle">
                    <thead class="bg-gray-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Url key</th>
                        <th>Url path</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->parentCategory->name ?? ""}}</td>
                            <td>{{$category->url_key}}</td>
                            <td>{{$category->url_path}}</td>
                            <td>
                                <a href="{{route('admin.category.edit',$category->id)}}" class="text-muted">
                                    <i class="fas fa-pen"></i>
                                </a> &nbsp;
                                <a href="{{route('admin.category.destroy',$category->id)}}" class="text-muted">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <x-admin.pagination :collection="$categories"/>
    </x-admin-content>
@endsection
