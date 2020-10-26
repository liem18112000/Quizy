@extends('layouts.admin')

@section('content')
    <h1 style='padding-left: 40px;'>Course Management</h1>

    <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
            Add course
        </button>
    </div>

    <!-- Modal -->
    <form method="POST" action="{{ route('admin.course.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Course Create</h5>
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
                            <label for="media">Upload course image</label>
                            <input type="file" class="form-control-file" name="image" id="media" placeholder="Choose a file to upload">
                        </div>

                        <div class="form-group mt-4">
                            <div class="row">
                                <img style='object-fit:contain; width: 100%; height: 100%;' id="reviewImage"class="avatar-profile" alt="">
                            </div>
                        </div>

                        <script type="text/javascript">
                            function PreviewImage() {
                                var fileReader = new FileReader();
                                fileReader.readAsDataURL(document.getElementById("media").files[0]);

                                fileReader.onload = function (fileEvent) {
                                    document.getElementById("reviewImage").src = fileEvent.target.result;
                                };
                            };
                        </script>
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
        <thead class='text-center'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Exams</th>
                <th>Complete</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr class='text-center'>
                <td style='padding-top: 15px;'>{{$course->id}}</td>
                <td style='padding: 0; width: 60px;'>
                    @if($course->image == 'untitled')
                        <img
                            src="https://wallpaperplay.com/walls/full/1/3/2/296805.jpg" alt=""
                            class='img-responsive img-rounded'
                            style='height: 100px; width: 100px; object-fit: cover'>
                    @else
                        <img
                            src="{{$course->image}}" alt=""
                            class='img-responsive img-rounded'
                            style='height: 100px; width: 100px; object-fit: cover'>
                    @endif
                </td>
                <td style='padding-top: 15px;'>{{$course->name}}</td>
                <td style='padding-top: 15px;'><a href="#">liem</a></td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.course.exam', $course)}}" role="button">
                        Exam Count : {{$course->exams->count()}}
                    </a>
                </td>
                <td><b></b></td>
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Disable</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Exams</th>
                <th>Complete</th>
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
