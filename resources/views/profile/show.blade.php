@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.tiny.cloud/1/rmdclr9q9pr72tgrpg0w7x3r0kqnglgojdaxfqsij86e4bp0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection


@section('content')

<div class="container bootstrap snippet">
    <div style='margin-top: 10%;'></div>
    {{-- <div class="row">
  		<div class="col-sm-10"><h1>User name</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div> --}}
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <div class='card'>
                <div class="card-body text-center">
                    <img src="{{ $profile->profile_image}}" class="avatar img-circle img-thumbnail"
                        alt="avatar">
                    <h6>Upload a different photo...</h6>


                </div>

                <div class='card-footer'>
                    <input type="file" class="text-center center-block file-upload">
                </div>
            </div>

            <br>

            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>


            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                        class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                        class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="{{ route('profile.update', $profile)}}" method='POST' id="registrationForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="name">
                                            <h4>Full name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Name" disabled='disabled' value='{{$profile->user->name}}'>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" disabled='disabled' value='{{$profile->user->email}}'>
                                    </div>
                                </div>

                                 <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="name">
                                            <h4>Location</h4>
                                        </label>
                                        <input type="text" class="form-control" name="location" id="name"
                                            placeholder="Name" value='{{$profile->location}}'>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>DOB</h4>
                                        </label>
                                        <input type="date" class="form-control" name="DOB" id="email"
                                            value='{{$profile->DOB}}'>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-12">
                                        <label for="bio">
                                            <h4>Short story about yourself</h4>
                                        </label>
                                        <textarea id='bio' rows='16' name='bio'>
                                            {!! $profile->bio !!}
                                        </textarea>
                                        <script>
                                            tinymce.init({
                                                selector: 'textarea',
                                                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                toolbar_mode: 'floating',
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <br>
                                        <button class="btn btn-lg btn-success btn-block" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <br>
                                        <button class="btn btn-lg btn-danger btn-block" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                            Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="messages">

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">

                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>


@endsection


@section('scripts')
<script>
    $(document).ready(function () {


        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function () {
            readURL(this);
        });
    });

</script>
@endsection
