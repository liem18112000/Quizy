@extends('layouts.appNoNavNoFoot')

@section('styles')

    <script src="https://cdn.tiny.cloud/1/rmdclr9q9pr72tgrpg0w7x3r0kqnglgojdaxfqsij86e4bp0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        .float-panel{
            position: fixed;
            width: 350px;
            top: 2vh;
            left: 2%;
            z-index:1000;
            transition: all 1s ease-out;
        }

        .border-red{
            border: 3px solid red!important;
        }

        .float-btn{
            position: fixed;
            left:2%;
            border-radius:50%;
            width: 50px;
            height: 50px;
            top:45%;
            background-color: black;
            z-index:1010;
            transition: all 1s ease-out;
        }

        .left{
            left: -100%!important;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid" style='margin-top:2vh; margin-bottom:5vh'>
        <div class="row">

            <div class="col-lg-3" id='left-col'>

                <a class='float-btn left' id='float-btn' onClick="Minimize()"></a>

                <div class='float-panel' id='float-panel'>

                    <div class="row">

                        <div class='col-lg-12'>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Thoi gian còn lại</h4>

                                    <!-- Display the countdown timer in an element -->
                                    <h2 id="demo" class='text-center'></h2>

                                    <script>
                                        if(!localStorage.getItem('countDownValue'))
                                            localStorage.setItem('countDownValue', {{$doing->remain_time}});
                                        else
                                            localStorage.setItem('countDownValue', localStorage.getItem('countDownValue') - 1);

                                        // Set the date we're counting down to
                                        var countDownDate = new Date(new Date().getTime() + localStorage.getItem('countDownValue') * 1000).getTime();

                                        // Update the count down every 1 second
                                        var x = setInterval(function() {

                                        // Get today's date and time
                                        var now = new Date().getTime();

                                        // Find the distance between now and the count down date
                                        var distance = countDownDate - now;
                                        window.value = distance / 1000;

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
                                            document.getElementById('question-form').submit();
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
                                            @if($j * 5 + $k + 1 <= count($questions))
                                                <a name="" id="btn{{$j * 5 + $k + 1}}" class="btn

                                                @if(isset($answer['check' . ($j * 5 + $k + 1)]))
                                                    border-red
                                                @endif

                                                @if(isset($answer['choice' . ($j * 5 + $k + 1)]))
                                                    btn-success
                                                @else
                                                    btn-outline-dark
                                                @endif

                                                " style='width: 48px' href="#{{$j * 5 + $k + 1}}" role="button">
                                                    {{$j * 5 + $k + 1}}
                                                </a>
                                            @endif
                                        @endfor
                                    </div>
                                    @endfor

                                    <a class="btn btn-primary mt-4 btn-block"
                                    onclick="event.preventDefault();
                                    document.getElementById('time_remain').value = window.value;
                                    document.getElementById('question-form').submit();" href='#'>Nộp Bài</a>

                                    <a class="btn btn-secondary btn-block"
                                    onclick="event.preventDefault();
                                    document.getElementById('time_remain').value = window.value;
                                    document.getElementById('isPause').value = 'true';
                                    document.getElementById('question-form').submit();" href='#'>Tạm ngưng</a>

                                    <a class="btn btn-outline-dark btn-block" href="#" onClick='Minimize()' role="button">Thu gon</a>

                                    <script>
                                        function Minimize(){

                                            var float_panel = document.getElementById('float-panel');

                                            var float_btn = document.getElementById('float-btn');

                                            var left_col = document.getElementById('left-col');

                                            var right_col = document.getElementById('right-col');

                                            if(float_panel.classList.contains('left')){
                                                left_col.classList.remove('col-1');
                                                left_col.classList.add('col-lg-3');
                                                right_col.classList.remove('col-11');
                                                right_col.classList.add('col-lg-9');
                                                float_btn.classList.add('left');
                                                float_panel.classList.remove('left');
                                            }else{
                                                left_col.classList.add('col-1');
                                                left_col.classList.remove('col-lg-3');
                                                right_col.classList.add('col-11');
                                                right_col.classList.remove('col-lg-9');
                                                float_panel.classList.add('left');
                                                float_btn.classList.remove('left');
                                            }

                                        }
                                    </script>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-9" id='right-col'>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card text-center" >
                            <div class="card-body">
                                <h1 class="card-title">Đề thi : {{$course->name}} - {{$exam->title}}</h1>
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
                    <input type='hidden' name='exam_type_id' value='{{$exam->exam_type_id}}'>

                    @foreach($questions as $question)
                        <!-- Cau hoi -->
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="card" >
                                    <div class="card-body" id='{{$cau}}'>

                                        <div style='display:flex; justify-content: space-between;'>
                                            <h4 class="card-title">Câu hỏi {{$cau}}</h4>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <script>
                                                    function onCheck(id)
                                                    {
                                                        document.getElementById(id).classList.add('border-red');
                                                    }

                                                    function onUnCheck(id)
                                                    {
                                                        document.getElementById(id).classList.remove('border-red');
                                                    }
                                                </script>
                                                <input type="checkbox" class="form-check-input" name="check{{$cau}}" id="check{{$cau}}" value="true"
                                                onclick="if (this.checked) { onCheck('btn{{$cau}}') } else { onUnCheck('btn{{$cau}}') }"
                                                @if(isset($answer['check' . $cau]))
                                                    checked
                                                @endif
                                                >
                                                Đánh dấu
                                            </label>
                                            </div>
                                        </div>

                                        <p class="card-text">{{$question->description}}?</p>

                                        @if($exam->examType->id == '1')

                                            {{-- Multiple-choice Answer --}}
                                            @php
                                                $i = 1;
                                            @endphp

                                            @foreach($question->choices as $choice)

                                                <!-- Group of default radios - option 1 -->
                                                <div class="custom-control custom-radio">
                                                    <input value='{{$i}}' type="radio" class="custom-control-input" id="{{$cau}}-choice-{{$i}}" name="choice{{$cau}}"
                                                    onclick="document.getElementById('btn{{$cau}}').classList.add('btn-success');
                                                    document.getElementById('btn{{$cau}}').classList.remove('btn-outline-dark')"
                                                    @if(isset($answer['choice' . $cau]) && $answer['choice' . $cau] == $i)
                                                        checked
                                                    @endif>

                                                    <label class="custom-control-label" for="{{$cau}}-choice-{{$i}}">{{$choice->description}}</label>
                                                </div>

                                                @php
                                                    $i++;
                                                @endphp

                                            @endforeach
                                            {{-- Multiple-choice Answer --}}

                                        @elseif($exam->examType->id == '2')

                                            {{-- Self-commentary --}}
                                            <hr/>
                                            <textarea id="{{$cau}}-choice" rows='20' name="choice{{$cau}}">
                                                @if(isset($answer['choice' . $cau]))
                                                    {!!$answer['choice' . $cau]!!}
                                                @endif
                                            </textarea>
                                            <script>
                                                tinymce.init({
                                                    selector: 'textarea#{{$cau}}-choice',
                                                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                    toolbar_mode: 'floating',
                                                    init_instance_callback: function(editor) {
                                                        editor.on('input', function(e) {
                                                            document.getElementById('btn{{$cau}}').classList.add('btn-success');
                                                            document.getElementById('btn{{$cau}}').classList.remove('btn-outline-dark')
                                                        });
                                                    }
                                                });
                                            </script>
                                            {{-- Self-commentary --}}

                                        @endif

                                        @php
                                            $cau++;
                                        @endphp


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Cau hoi -->
                    @endforeach

                    </form>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

@endsection
