@extends('master.admin.master')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage User</h4>
                    <a href="{{route('category.add')}}" class="btn btn-success btn-sm">Tambah Category</a>
                    <p class="text-center text-success">{{Session::get('message')}}</p>


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Full Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorys as $category)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->deskription}}</td>
                                    <td>
                                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger btn-sm{{$category->id== 1? 'disabled' : ''}}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>





@endsection
