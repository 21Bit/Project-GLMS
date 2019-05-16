@if (count($errors) > 0)
    <div class="alert alert-danger fade show m-b-10">
        <span class="close" data-dismiss="alert">&times;</span>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif