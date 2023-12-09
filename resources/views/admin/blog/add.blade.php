@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Lawas Form</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('blog.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option> -- Select Category Name -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-3 col-form-label">Judul Lawas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="main_title" id="horizontal-firstname-input1"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Link Video</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="link_yt" id="horizontal-firstname-input2"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input4" class="col-sm-3 col-form-label">Lirik Sumbawa</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="lirik_swq" id="horizontal-email-input4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input2" class="col-sm-3 col-form-label">Lirik Indonesia</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="lirik_indo" id="horizontal-email-input4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" name="image" id="horizontal-password-input"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Audio</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" name="audio" id="horizontal-password-input"/>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
