@extends('layouts.admin')

@section('title', 'Create Post')

@push('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


@endpush


@section('content')
<div class="content-area5 dashboard-content">
    <div class="dashboard-header clearfix">
        <div class="row">
            <div class="col-sm-12 col-md-6"><h4>Create Post</h4></div>
            <div class="col-sm-12 col-md-6">
                <div class="breadcrumb-nav">
                    <ul>
                        <li>
                            <a href="index.html">Index</a>
                        </li>
                        <li>
                            <a href="dashboard.html">Dashboard</a>
                        </li>
                        <li class="active">Submit Property</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-address dashboard-list">
            <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <h4 class="bg-grea-3">Create Post</h4>
                <div class="row pad-20">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" class="input-text" name="title" placeholder="Post Title">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Post Category</label>
                            <select name="categories" class="selectpicker search-fields"  data-live-search="true">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                <div class="col-lg-12">
                    <label>Body</label>
                    <textarea class="input-text" name="body" id="body" ></textarea>
                </div>
                <div class="col-lg-12 pad-20">
                    <label for="form-label">Featured Image</label> <br>
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="row pad-20">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-md button-theme">Submit Property</button>
                </div>
            </div>
        </form>
    </div>
    <p class="sub-banner-2 text-center">© 2019 Ngekost.id. Trademarks and brands are the property of their respective owners.</p>
</div>


@endsection


@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="{{asset('vendor/tinymce/tinymce.js')}}"></script>

    <script>
        $(function () {
            $("#image").fileinput();
        });
        $(function () {
            tinymce.init({
                selector: "#body",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('vendor/tinymce')}}';
        });
    </script>

@endpush
