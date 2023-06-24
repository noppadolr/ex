@extends('admin.main')
@section('content')


    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Change Password</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{--                                <li class="breadcrumb-item"><a href="">Upcube</a></li>--}}
                                <li class="breadcrumb-item active"> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{--            end row--}}

            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Chnage Password </h4>
                                    <p class="card-title-desc"></p>

                                    <form method="post" action=" {{route('ChangePassword')}}" >
                                        @csrf
                                        @if ($errors->any())
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        @endif






                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('OldPassword') is-invalid @enderror" type="password"  required="" value="" name="OldPassword" id="example-text-input">
                                            </div>
                                        </div>
                                        <!-- end row -->


                                        @error('OldPassword')
                                        <div class="row ">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="alert alert-warning">{{ $message }}</div>
                                             </div>
                                         </div>

                                        @enderror
                                        <!-- end row -->

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('ConfirmPassword') is-invalid @enderror" type="password"  required="" value="" name="NewPassword" id="example-text-input">
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        @error('ConfirmPassword')
                                        <div class="row ">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="alert alert-warning">{{ $message }}</div>
                                             </div>
                                         </div>

                                        @enderror
                                                 
                                        <!-- end row -->

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('ConfirmPassword') is-invalid @enderror" type="password"  required="" value="" name="ConfirmPassword" id="example-text-input">
                                             </div>
 
                                        </div>



                                        <br>
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
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


@endsection
