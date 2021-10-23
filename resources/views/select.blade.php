@include('nav')

@if($task)
    ID: {{ $task->id }} <br>
    Uloha: {{ $task->name }}<br>
    Pridelena: {{ $task->owner->owner_name }}<br>
@else
    Uloha neexistuje
@endif
