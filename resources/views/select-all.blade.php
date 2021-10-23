@include('nav')
@if(count($tasks) > 0)
    <table>
        <tr>
            <td>ID</td>
            <td>Uloha</td>
            <td>Majitel</td>
            <td>Kategoria</td>
            <td>Datum vytvorenia</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->owner->owner_name }}</td>
                <td>{{ $task->category->cat_name }}</td>
                <td>{{ date("d.m.Y", strtotime($task->created_at)) }}</td>
                <td><a href="{{ route('select', ['id' => $task->id]) }}">Detail</a></td>
                <td><a href="{{ route('delete', ['id' => $task->id]) }}">Vymazat</a></td>
                <td><a href="{{ route('update-form', ['id' => $task->id]) }}">Aktualizovat</a></td>
            </tr>
        @endforeach
    </table>
@else
    Neexistuju ziadne ulohy
@endif
