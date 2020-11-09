@extends('layouts.appNoNavNoFoot')

@section('styles')
    <style>
        .float-panel{
            position: fixed;
            width: 20%;
            top: 2vh;
            left: 5%;
        }

        .border-red{
            border: 3px solid red!important;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid" style='margin-top:2vh; margin-bottom:5vh'>
        <div class="row">
            <div class="col-lg-3">
                <div class='float-panel'>
                    <div class="row">
                        <div class='col-lg-12'>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Thoi gian còn lại</h4>

                                    <!-- Display the countdown timer in an element -->
                                    <h2 id="demo" class='text-center'>Expired</h2>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title text-center">Câu hỏi</h4>

                                    @for($j = 0 ; $j < $questions->count() / 5 ; $j++)
                                    <div class='mt-2' style='display:flex; justify-content: space-evenly;'>
                                        @for($k = 0; $k < 5; $k++)
                                            <a name="" id="btn{{$j * 5 + $k + 1}}" class="btn

                                            @if(isset($answer['choice' . ($j * 5 + $k + 1)]))
                                                btn-success
                                            @else
                                                btn-outline-dark
                                            @endif

                                            @if(isset($answer['check' . ($j * 5 + $k + 1)]))
                                                border-red
                                            @endif
                                            " style='width: 48px' href="#{{$j * 5 + $k + 1}}" role="button">
                                                {{$j * 5 + $k + 1}}
                                            </a>
                                        @endfor
                                    </div>
                                    @endfor

                                    <a class="btn btn-dark mt-4 btn-block" href='{{route('student.result')}}'>Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card text-center" >
                            <div class="card-body">
                                <h1 class="card-title">Đề thi : {{$course->name}}</h1>
                                <h5 class="card-text">Tên thí sinh: {{Auth::user()->name}}</h5>
                            </div>
                        </div>
                    </div>
                </div>


                @php
                    $cau = 1;
                @endphp

                <form action='{{ route('exam.submit', [$course, $exam, $doing])}}' method='POST' id='question-form'>
                @csrf
                    <input type='hidden' name='isPause' id='isPause' value='false'>
                    <input type='hidden' name='time_remain' id='time_remain'>
                @foreach($questions as $question)
                <div class="row mt-2"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body" id='{{$cau}}'>
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi {{$cau}}</h4>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="check{{$cau}}" id="check{{$cau}}"
                                        @if(isset($answer['check' . $cau]))
                                            checked
                                        @endif
                                        disabled='disabled'
                                        >
                                        Đánh dấu
                                    </label>
                                    </div>
                                </div>
                                <p class="card-text">{{$question->description}}?</p>


                                @php
                                    $i = 1;
                                @endphp

                                @foreach($question->choices as $choice)

                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input value='{{$i}}' type="radio" class="custom-control-input" id="{{$cau}}-choice-{{$i}}" name="choice{{$cau}}"
                                    @if(isset($answer['choice' . $cau]) && $answer['choice' . $cau] == $i)
                                        checked
                                    @endif
                                    disabled='disabled'
                                    >

                                    @if($choice->description == $question->choices->where('id', $question->answer_choice_id)->first()->description)
                                        <label class="custom-control-label" style='color:green;' for="{{$cau}}-choice-{{$i}}">{{$choice->description}}</label>
                                    @else
                                        <label class="custom-control-label" style='color:red;' for="{{$cau}}-choice-{{$i}}">{{$choice->description}}</label>
                                    @endif
                                </div>

                                @php
                                    $i++;
                                @endphp

                                @endforeach

                                @php
                                    $cau++;
                                @endphp

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                @endforeach
                </form>
                </form>

            </div>
        </div>
    </div>

@endsection
