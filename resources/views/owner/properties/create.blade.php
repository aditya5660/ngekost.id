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
                <form name="modalForm" id="modalForm" method="post" action="{{ route('owner.properties.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="properties_id" id="properties_id">
                        <h4 class="bg-grea-3">Create Property</h4>
                        <div class="search-contents-sidebar">
                            <div class="row pad-20">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Kost</label>
                                        <input type="text" class="input-text" name="title" id="title"required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Tipe Kost</label>
                                        <select class="selectpicker search-fields" name="category_id" value="" required>
                                            @foreach($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Kamar Tersedia</label>
                                        <input type="number" value="1" class="input-text" name="available_room"
                                            id="available_room" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Ukuran Kamar</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="input-text" name="p_room_size"
                                                    id="p_room_size" required>
                                            </div>

                                            <div class="col-6">
                                                <input type="text" class="input-text" name="l_room_size"
                                                    id="l_room_size" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Harian</label>
                                        <input type="text" class="input-text" name="daily_price" id="daily_price">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Bulanan</label>
                                        <input type="text" class="input-text" name="monthly_price" id="monthly_price">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Harga Tahunan</label>
                                        <input type="text" class="input-text" name="yearly_price" id="yearly_price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Lokasi Kost</h4>
                        <div class="row pad-20">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="input-text" name="address" id="address" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" class="input-text" name="zipcode" id="zipcode"   required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinces" class="input-text search-fields" data-live-search="true"  required>
                                        <option value="">--- Select province ---</option>
                                        @foreach ($province_name as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kabupaten Kota</label>
                                    <select name="regencies" class="input-text search-fields" data-live-search="true" required>
                                        <option value="">--- Select regencies ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select name="districts" class="input-text search-fields" data-live-search="true" required>
                                        <option value="">--- Select districts ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="input-text" name="location_longitude" id="location_longitude">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="input-text" name="location_latitude" id="location_latitude">
                                </div>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Fasilitas  <span style="font-size:10px;"><i>please check one </i></span></h4>
                        <div class="row pad-20">

                                @foreach ($amenities as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="{{ $item->id }}" name="amenities[]" type="checkbox"
                                            value="{{ $item->id }}" >
                                        <label for="{{ $item->id }}">{{$item->name }} </label>
                                    </div>
                                </div>
                                @endforeach

                        </div>
                        <h4 class="bg-grea-3">Description*</h4>
                        <div class="row pad-20">
                            <div class="col-lg-12">
                                <input class="input-text" name="description" id="description" required></input>
                            </div>
                        </div>
                        <h4 class="bg-grea-3">Featured Image*</h4>
                        <div class="row pad-20">
                            <input class="file" type="file" name="image" required>
                        </div>
                        <h4 class="bg-grea-3">Gallery Image <span style="font-size:10px;"><i>you can select multiple image</i></span></h4>
                        <div class="row pad-20">
                            <input id="input-id" type="file" name="gallaryimage[]" class="file" data-preview-file-type="text" multiple required>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-md button-theme" type="submit" name="btn" id="saveBtn">
                                Save</button>
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
<script src="{{ asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script>
        $(document).ready(function() {
            $('input#title, textarea#nearby').characterCounter();
            $('select').formSelect();
        });
        $(function () {
            $("#input-id").fileinput();
        });
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

    // var daily_price = document.getElementById('daily_price');
    // var monthly_price = document.getElementById('monthly_price');
    // var yearly_price = document.getElementById('yearly_price');
    // daily_price.addEventListener('keyup', function (e) {
    //     daily_price.value = formatRupiah(this.value, 'Rp. ');
    // });
    // monthly_price.addEventListener('keyup', function (e) {
    //     monthly_price.value = formatRupiah(this.value, 'Rp. ');
    // });
    // yearly_price.addEventListener('keyup', function (e) {
    //     yearly_price.value = formatRupiah(this.value, 'Rp. ');
    // });
    // Ajax AutoSelect Regencies
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
 </script>

@endpush
