@extends('layouts.admin')
@push('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="content-area5">
    <div class="dashboard-header clearfix">

    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="submit-address dashboard-list">
                <form name="modalForm" id="modalForm" method="POST" action="{{ route('owner.properties.update',$property->slug)}}"enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="properties_id" id="properties_id" value="{{$property->id}}">
                        <h4 class="bg-grea-3">Detail property</h4>
                        <div class="search-contents-sidebar">
                            <div class="row pad-20">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama property</label>
                                        <input type="text" class="input-text" name="title" id="title"
                                            value="{{ $property->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Tipe property</label>
                                        <select class="selectpicker search-fields" name="category_id" value="">
                                            @foreach($categories as $item)
                                                <option
                                                @if($property->category_id ==  $item->id)
                                                selected="selected"
                                                @endif
                                                value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Kamar Tersedia</label>
                                        <input type="number" value="1" class="input-text" name="available_room"
                                            id="available_room" value="{{ $property->available_room }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Ukuran Kamar</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="input-text" name="p_room_size"
                                                    id="p_room_size" value="{{ $property->p_room_size }}">
                                            </div>

                                            <div class="col-6">
                                                <input type="text" class="input-text" name="l_room_size"
                                                    id="l_room_size" value="{{ $property->l_room_size }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Harian</label>
                                        <input type="text" class="input-text" name="daily_price" id="daily_price"
                                            value="{{ $property->daily_price }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Bulanan</label>
                                        <input type="text" class="input-text" name="monthly_price" id="monthly_price"
                                            value="{{ $property->monthly_price }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Tahunan</label>
                                        <input type="text" class="input-text" name="yearly_price" id="yearly_price"
                                            value="{{ $property->yearly_price }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Lokasi property</h4>
                        <div class="row pad-20">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="input-text" name="address" id="address"
                                        value="{{ $property->address }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" class="input-text" name="zipcode" id="zipcode"
                                        value="{{ $property->zipcode }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinces" class="input-text search-fields" >
                                        <option value="">--- Select province ---</option> value="{{$property->provinces}}"
                                        @foreach ($province_name as $value)
                                        <option @if($property->provinces ==  $value->id) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kabupaten Kota</label>
                                    <select name="regencies" class="input-text search-fields" >
                                        <option value="">--- Select province ---</option> value="{{$property->regencies}}"
                                        @foreach ($regency_name as $value)
                                        <option @if($property->regencies ==  $value->id) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select name="districts" class="input-text search-fields" >
                                        <option value="">--- Select province ---</option> value="{{$property->districts}}"
                                        @foreach ($district_name as $value)
                                        <option @if($property->districts ==  $value->id) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="input-text" name="location_longitude" id="location_longitude"
                                        value="{{ $property->location_longitude }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="input-text" name="location_latitude" id="location_latitude"
                                        value="{{ $property->location_latitude }}">
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-desc-tab" data-toggle="pill" href="#pills-desc" role="tab"
                                    aria-controls="pills-desc" aria-selected="false">Next</a>
                            </li>
                        </ul>
                        <h4 class="bg-grea-3">Fasilitas </h4>
                        <div class="row pad-20">
                            <div class="search-contents-sidebar">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        @foreach ($amenities as $item)
                                        <input id="{{ $item->id }}" name="amenities[]" type="checkbox" value="{{ $item->id }}" <?php in_array($item->id, $chxamenities) ? print "checked" : ""; ?> />
                                        <label for="{{ $item->id }}">{{$item->name }} </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Deskripsi</h4>
                        <div class="row pad-20">
                            <div class="col-lg-12">
                                <textarea class="input-text" name="description" id="description"
                                    ">{{ $property->description }}</textarea>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Featured Image*</h4>
                        <div class="row pad-20">
                            @if(Storage::disk('public')->exists('property/'.$property->image))
                                <img src="{{ asset('storage/property/'.$property->image)}}" alt="{{$property->title}}" width="400px"class="img-responsive img-rounded">
                            @endif
                        <br>
                            <input class="file" type="file" name="image" >
                        </div>
                        <h4 class="bg-grea-3">Gallery Image <span style="font-size:10px;"><i>you can select multiple image</i></span></h4>
                        <div class="row pad-20">
                                <div class="gallery-box" id="gallerybox">
                                    @foreach($gallery as $item)
                                    <div class="gallery-image-edit" id="gallery-{{$item->id}}">
                                        <button type="button" data-id="{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <img style="width:200px"class="img-responsive" src="{{asset('storage/property/gallery/'.$item->name)}}" alt="{{$item->name}}">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="gallery-box">
                                    <hr>
                                    <input type="file" name="gallaryimage[]" value="UPLOAD" id="gallaryimageupload" multiple>
                                    <button type="button" class="btn btn-info btn-lg right" id="galleryuploadbutton">UPLOAD GALLERY IMAGE</button>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <button class="btn btn-md button-theme" type="submit" name="btn" id="saveBtn">
                                    Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>





@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script>
    $(document).ready(function () {
        $('select[name="provinces"]').on('change', function () {
            var regencies_id = $(this).val();
            if (regencies_id) {
                $.ajax({
                    url: "{{ url('owner/properties/get_regencies') }}" + '/' + encodeURI(regencies_id),
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="regencies"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="regencies"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="regencies"]').empty();
            }
        });
    });
    // Ajax AutoSelect District
    $(document).ready(function () {
        $('select[name="regencies"]').on('change', function () {
            var province_id = $(this).val();
            if (province_id) {
                $.ajax({
                    url: "{{ url('owner/properties/get_district') }}" + '/' + encodeURI(province_id),
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="districts"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="districts"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="regencies"]').empty();
            }
        });
    });
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DELETE PROPERTY GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('owner.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $('<div class="gallery-image-edit" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" height="106" width="173"/></div>').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallaryimageupload').on('change', function() {
                imagesPreview(this, 'div#gallerybox');
            });
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })
</script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script>
$(function () {
        tinymce.init({
            selector: "#description",
            theme: "modern",
            height: 200,
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
