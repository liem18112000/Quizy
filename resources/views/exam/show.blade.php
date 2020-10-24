@extends('layouts.appNoNavNoFoot')

@section('styles')
    <style>
        .float-panel{
            position: fixed;
            width: 20%;
            top: 2vh;
            left: 5%;
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
                                    <h2 id="demo" class='text-center'></h2>

                                    <script>
                                        // Set the date we're counting down to
                                        var countDownDate = new Date("Oct 23, 2020 16:10:00").getTime();

                                        // Update the count down every 1 second
                                        var x = setInterval(function() {

                                        // Get today's date and time
                                        var now = new Date().getTime();

                                        // Find the distance between now and the count down date
                                        var distance = countDownDate - now;

                                        // Time calculations for days, hours, minutes and seconds
                                        var minutes = Math.floor(distance / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        // Display the result in the element with id="demo"
                                        document.getElementById("demo").innerHTML = minutes + " : " + seconds;

                                        // If the count down is finished, write some text
                                        if (distance < 0) {
                                            clearInterval(x);
                                            document.getElementById("demo").innerHTML = "EXPIRED";
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Hết thời gian',
                                                text: 'Hoàn thành bài làm!'
                                            });
                                            window.location.href = "{{route('exam.index', $course)}}";
                                        }
                                        }, 1000);
                                    </script>
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
                                            <a name="" id="" class="btn btn-dark" style='width: 48px' href="#" role="button">
                                                {{$j * 5 + $k + 1}}
                                            </a>
                                        @endfor
                                    </div>
                                    @endfor

                                    <button type="submit" class="btn btn-primary mt-4 btn-block">Nộp Bài</button>

                                    <a class="btn btn-secondary btn-block" href="{{route('exam.index', [$course])}}" role="button">Back</a>
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

                @foreach($questions as $question)
                <div class="row mt-2"> <!-- Cau hoi -->
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div style='display:flex; justify-content: space-between;'>
                                    <h4 class="card-title">Câu hỏi {{$cau}}</h4>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
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
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample{{$i}}" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample{{$i}}">{{$choice->description}}</label>
                                </div>

                                @php
                                    $i++;
                                @endphp

                                @endforeach

                                @php
                                    $cau++;
                                @endphp

                                {{-- <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                    <label class="custom-control-label" for="defaultGroupExample2">Khủng long</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample3">Cá voi</label>
                                </div>

                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="defaultGroupExample4">Liêm</label>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div><!-- Cau hoi -->
                @endforeach


            </div>
        </div>
    </div>

@endsection
