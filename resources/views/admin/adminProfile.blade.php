@extends('admin.main')
@section('content')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{asset('jquery.min.js')}}"></script>

    <div class="page-content">
        <div class="container-fluid">

            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{--                                <li class="breadcrumb-item"><a href="">Upcube</a></li>--}}
                                <li class="breadcrumb-item active"> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
{{--            end row--}}

            <div class="row">

                <div class="col-lg-4">
                    <div class="card">
                        <br>

                        <div class="card-body">
                            <center>
                                <img class="card-img-top rounded img-fluid" style="width: auto;height: 250px;"  src="{{ (!empty($adminData->profile_image))? url('upload/adminImages/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                            </center>
                            <hr>
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Username : {{ $adminData->username }}</h4>
                            <hr>
                            <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                            <hr>
                            <h4 class="card-title">Phone : {{ $adminData->phone }}</h4>
                            <hr>

                            <h4 class="card-title">Created Date : {{ \Carbon\Carbon::parse($adminData->created_at)->Format('d-m-Y')}}</h4>
                            <hr>
                            <h4 class="card-title">Created Time : {{ \Carbon\Carbon::parse($adminData->created_at)->Format('H:i:s')}}</h4>
                            <hr>


                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Edit User Profile </h4>
                                    <p class="card-title-desc"></p>

                                    <form method="post" action="{{ route('StoreProfile') }}" enctype="multipart/form-data">
                                        @csrf


                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="{{$adminData->name}}" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row mb-3">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="{{ $adminData->username }}" name="username" id="example-search-input">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row mb-3">
                                        <label for="example-email-input" class="col-sm-2 col-form-label">User Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email" value="{{$adminData->email}}" id="example-email-input">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row mb-3">
                                        <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="tel" name="phone" value="{{$adminData->phone}}" id="example-tel-input">
                                        </div>
                                    </div>
                                    <!-- end row -->



                                    <div class="row mb-3">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Profile Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" name="profile_image" id="image">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                            <div class="col-sm-10">
                                                <img id="showImage"  class="rounded img-fluid" style="width: auto;height: 265px;" src="{{ (!empty($adminData->profile_image))? url('upload/adminImages/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                            </div>
                                        </div>



                                    <br>
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
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
