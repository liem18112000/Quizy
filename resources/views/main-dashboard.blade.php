@extends('layouts.app')


@section('content')


<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach(Auth::user()->roles as $role)
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="
                        @if($role->roleType->name == 'admin')
                            {{asset('img/admin.png')}}
                        @elseif($role->roleType->name == 'lecturer')
                            {{asset('img/lecturer.png')}}
                        @else
                            {{asset('img/student.png')}}
                        @endif
                    " class="special_img" style='object-fit:cover;' alt="">
                    <div class="card-footer">
                        <a
                        @if($role->roleType->name == 'admin')
                            href="{{route('admin.dashboard')}}"
                        @elseif($role->roleType->name == 'lecturer')
                            href="{{route('lecturer.dashboard')}}"
                        @else
                            href="{{route('student.dashboard')}}"
                        @endif
                            class="btn btn-outline-dark btn-block"> {{$role->roleType->name}} Dashboard</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!--::blog_part end::-->

@endsection





