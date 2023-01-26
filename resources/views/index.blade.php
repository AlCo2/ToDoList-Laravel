<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://kit.fontawesome.com/8fb7fe186b.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="title">
        <center>
            <p>ToDoList</p>
        </center>
    </div>
    <div>
        <div class="form">
            @if(session('task'))
            <form method="POST">
                @csrf
                <input value="{{ session('task.task') }}" autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" required placeholder="I wanna make..." name="task" type="text" id="">
                <input name="id" value="{{session('task.id')}}"" hidden>
                <button>submite</button>
            </form>
            @else
            <form method="POST">
                @csrf
                <input required placeholder="I wanna make..." name="task" type="text" id="">
                <button>submite</button>
            </form>
            @endif
        </div>
    </div>
    <div class="main">
        <div class="option">
            <div class="task">Task</div>
            <div class="done">Done</div>
        </div>
        @php
            $count=1
        @endphp
        @foreach( $tasks as $task )
        <div class="tasks">
            <div class="count">{{$count++}}</div>
            <div class="task0">{{$task->task}}</div>
            <div class="done0">
                @if($task->finished)
                    <i class="fa-regular fa-square-check"></i>
                    <a href="/update/{{$task->id}}"><i class="fa-solid fa-pen"></i></a>
                    <a href="/delete/{{$task->id}}"><i class="fa-solid fa-x"></i></a>
                @else
                    <a href="/done/{{$task->id}}"><i class="fa-regular fa-square"></i></a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    
</body>
</html>