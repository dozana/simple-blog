@if($errors->any())
    <ul class="list-unstyled text-danger mb-3">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

