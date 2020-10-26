@extends('layouts.admin')

@section('content')
    <h1 style='padding-left: 40px;'>Course : {{ $course->name}}</h1>

    <h2 style='padding-left: 40px;'>Exam Management</h2>

    <hr/>
    <!-- Button trigger modal -->
    <div style='padding-left: 40px;'>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
            Add exam
        </button>
        <a name="" id="" class="btn btn-secondary" href="{{ route('admin.course')}}" role="button">Back</a>
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
                <th>Name</th>
                <th>Creator</th>
                <th>Allow time</th>
                <th>Duration</th>
                <th>Question</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr class='text-center'>
                <td>{{$exam->id}}</td>
                <td>
                    {{$exam->title}}
                </td>
                <td></td>
                <td>{{$exam->allow_time}}</td>
                <td>{{$exam->duration_min}}</td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.course.exam.question', [$course, $exam])}}" role="button">
                        Question Count : {{$exam->questions->count()}}
                    </a>
                </td>
                <td class='text-center' style='padding-top: 10px;'>
                    <a name="" id="" class="mx-1 btn btn-danger" href="#" role="button">Disable</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class='text-center'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Allow time</th>
                <th>Duration</th>
                <th>Question</th>
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
