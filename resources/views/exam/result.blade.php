@extends('layouts.appNoNavNoFoot')


@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

@endsection


@section('content')

<!-- phan ket qua -->
    <div class="container mt-4">
       <div class="row">
           <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3 class='text-center'> Final result : {{$exam->title}}</h3>
                            </div>
                            <div class="card-body">
                                <h2 class="card-title text-center">{{100 * $doing->grade / count($exam->questions)}}/100</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div style="float:right;">
                                            Exam start at :
                                            <hr/>
                                            Exam duration time :
                                            <hr/>
                                            Total exam time :
                                            <hr/>
                                            Number of right answers :
                                            <hr/>
                                            <a name="" id="" class="btn btn-primary" href="#" role="button">Preview choice</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class='float:left'>
                                            {{$doing->created_at}}
                                            <hr>
                                            {{$exam->duration_min}} minutes
                                            <hr/>
                                            {{floor($doing->remain_time / 60)}} minutes {{$doing->remain_time % 60}} seconds
                                            <hr>
                                            {{$doing->grade}}/{{count($exam->questions)}}
                                            <hr>
                                            <a name="" id="" class="btn btn-primary" href="#" role="button">View answer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <a name="" id="" class="btn btn-outline-secondary btn-block" href="{{ route('student.result')}}" role="button">Result Board</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <!-- phan ket qua -->
           <div class="col-lg-4">
                <div class='row'>
                    <div class='col-12'>
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><i class="fa fa-line-chart" aria-hidden="true"></i> Leaderboard</h3>
                            </div>
                            <div class="card-body">
                                <a name="" id="" class="btn_2 btn-block text-center" role="button">1. Liem Doan - 39/40</a>
                                <a name="" id="" class="btn_2 btn-block text-center" role="button">1. Liem Doan - 39/40</a>
                                <a name="" id="" class="btn_2 btn-block text-center" role="button">1. Liem Doan - 39/40</a>
                                <a name="" id="" class="btn_2 btn-block text-center" role="button">1. Liem Doan - 39/40<</a>
                                <a name="" id="" class="btn_2 btn-block text-center" role="button">1. Liem Doan - 39/40</a>
                            </div>
                            <div class="card-footer text-muted">
                                <a name="" id="" class="btn btn-outline-dark btn-block" role="button">View all</a>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
    </div>



@endsection


@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- DataTable script --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$('#example').DataTable();
</script>

@endsection
