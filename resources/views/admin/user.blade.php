@extends('layouts.admin')

@section('content')
    <h1 style='padding-left: 40px;'>User Management</h1>
    <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
            Add user
        </button>
    </div>

    <!-- Modal -->
    <form method="POST" action="{{ route('admin.user.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Profile image</label>
                            <input type="file" class="form-control-file" name="profile_image" id="image" placeholder="" aria-describedby="fileHelpId">
                        </div>

                        <div class="form-group">
                            <label for="role_type">Role type</label>
                            <select class="custom-select" name="role_type" id="role_type">
                                @foreach ($role_types as $role_type)
                                    <option value='{{$role_type->id}}'>{{$role_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class='row'>
                                <div class='col-6'>
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                </div>
                                <div class='col-6'>
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <hr/>

    <table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr class='text-center'>
                <th>UID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Email</th>
                <th>Provider</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class='text-center'>
                <td>{{$user->id}}</td>
                <td style='padding: 0;'><img src='@if($user->profile){{$user->profile->profile_image}}@endif' class='img-responsive img-rounded' style='height: 100px; width: 100px; object-fit: cover'></td>
                <td>{{$user->name}}</td>
                <td>
                    @if($user->roles)
                        @foreach($user->roles as $role)
                            <a class="btn btn-dark" href="#" role="button" disabled>
                                {{$role->roleType->name}}
                            </a>
                        @endforeach
                    @endif
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->provider}}</td>
                <td class='text-center' style='padding-top: 10px; width: 170px'><a class="btn btn-info" href="@if($user->profile){{route('profile.show', $user->profile)}}@endif" role="button">Profile</a>  <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Diables</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>UID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Email</th>
                <th>Provider</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
