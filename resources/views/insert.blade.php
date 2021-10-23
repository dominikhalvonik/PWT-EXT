@include('nav')

<form method="post" action="{{ route('insert') }}">
    Uloha: <br>
    <input type="text" name="name" placeholder="Uloha"><br>
    Pridelena:<br>
    <input type="text" name="owner" placeholder="Meno"><br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Ulozit">
</form>
