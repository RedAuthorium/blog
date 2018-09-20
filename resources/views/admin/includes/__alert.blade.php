@if(count($errors) > 0)

    @foreach($errors->all() as $error)
        <li class="text-danger">
            {{ $error }}
        </li>
    @endforeach

@endif