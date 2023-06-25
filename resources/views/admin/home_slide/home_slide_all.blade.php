@extends('admin.main')
@section('content')
<script src="{{asset('jquery.min.js')}}"></script>


<div class="page-content">
    <div class="container-fluid">

        {{--  TODO: Add อย่าลืมใส่หัว breadcrumb ตรงนี้ด้วย  --}}

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Home Slide</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <liclass="breadcrumb-item"><ahref="">Upcube</a></li> --}}
                            <li class="breadcrumb-item active"> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                            <li class="breadcrumb-item active">Edit Hoem Slide</li>
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

                                <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $homeslide->id }}" />

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeslide->title }}" name="title" id="title">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeslide->short_title }}" name="short_title" id="short_title">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="video_url" value="{{$homeslide->video_url}}" id="video_url">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">Home Slide Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="home_slide" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                        <div class="col-sm-10">
                                            <img id="showImage"  class="rounded img-fluid" style="width: auto;height: 265px;" src="{{ (!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>



                                <br>
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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