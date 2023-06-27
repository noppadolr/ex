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
                        <h4 class="mb-sm-0">Add Multi Image</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <liclass="breadcrumb-item"><ahref="">Upcube</a></li> --}}
                                <li class="breadcrumb-item "> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                                <li class="breadcrumb-item "> <a href="{{route('about.page.view')}}">About Page Setup</a> </li>
                                <li class="breadcrumb-item active"><a href="#">About Multi Image</a> </li>
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
                                    <h4 class="card-title"></h4>
                                    <br>

                                    <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                        @csrf
{{--                                        <input type="hidden" name="id" value="{{ $about->id }}" />--}}

                                        <div class="row mb-3">
                                            <label for="example-url-input" class="col-sm-2 col-form-label">About Multi Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control " type="file" name="multi_image" id="image">
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                            <div class="col-sm-10">
                                                <img id="showImage"  class="rounded img-fluid"  src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                            </div>
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image">
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
