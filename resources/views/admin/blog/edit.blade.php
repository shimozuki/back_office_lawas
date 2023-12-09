@extends('master.admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Lawas Form</h4>
                <p class="text-center text-success">{{ Session::get('message') }}</p>
                <form action="{{ route('blog.update',['id'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option value="">{{ $blog->category->name }}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Judul Lawas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $blog->main_title }}" name="main_title" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Link Video</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $blog->link_yt }}" name="link_yt" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Lirik Sumbawa<</label>
                        <div class="col-sm-9">
                            <textarea class="form-control summernote" name="lirik_swq" id="horizontal-email-input">{{ $blog->lirik_swq }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Lirik Indonesia</label>
                        <div class="col-sm-9">
                        <textarea class="form-control summernote" name="lirik_indo" id="horizontal-email-input">{{ $blog->lirik_indo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">lawas Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" name="image" id="horizontal-password-input">
                            <img src="{{ asset($blog->image) }}" alt="" width="120" height="120">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Audio</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" name="audio" id="horizontal-password-input">
                            <h5>{{ asset($blog->audio) }}</h5>
                            <!-- <img src="{{ asset($blog->audio) }}" alt="" width="120" height="120"> -->
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status">
                                <option value="{{$blog->status}}">{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</option>
                                <option value="0">Unpublished</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update Blog</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Saat elemen select dengan nama "status" berubah
        $('select[name="status"]').change(function() {
            // Dapatkan nilai yang dipilih
            var selectedStatus = $(this).val();

            // Perbarui elemen td sesuai dengan nilai yang dipilih
            if (selectedStatus == 1) {
                $('.status-badge').removeClass('bg-danger').addClass('bg-success').text('Published');
            } else if (selectedStatus == 0) {
                $('.status-badge').removeClass('bg-success').addClass('bg-danger').text('Unpublished');
            } else {
                // Handle nilai lain jika diperlukan
            }
        });
    });
</script>
@endsection