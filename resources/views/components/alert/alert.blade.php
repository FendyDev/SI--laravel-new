@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif