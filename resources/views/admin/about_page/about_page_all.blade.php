@extends('admin.main')
@section('main')
<script src="{{asset('jquery.min.js')}}"></script>


<div class="page-content">
    <div class="container-fluid">

        {{--  TODO: Add อย่าลืมใส่หัว breadcrumb ตรงนี้ด้วย  --}}

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit About Page</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <liclass="breadcrumb-item"><ahref="">Upcube</a></li> --}}
                            <li class="breadcrumb-item "> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                            <li class="breadcrumb-item active">Edit About Page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        {{--end row--}}


        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <p class="card-title-desc"></p>

                                <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}" />

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $about->title }}" name="title" id="title">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $about->short_title }}" name="short_title" id="short_title">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea  name="short_description" id="short_description" class="form-control" rows="5">{{ $about->short_description }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="long_description">
                                            {{$about->long_description}}
                                        </textarea>
                                        {{--  <input class="form-control" type="text" name="long_description" value="{{$about->long_description}}" id="video_url">  --}}
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="about_image" id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                        <div class="col-sm-10">
                                            <img id="showImage"  class="rounded img-fluid" style="width: auto;height: 265px;" src="{{ (!empty($about->about_image))? url($about->about_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                <br>
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">
                                </form>


                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

            </div>
        </div>
        {{--end row--}}
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection
