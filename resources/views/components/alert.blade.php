@if ($type == "danger")
    <div class="alert alert-danger">
        <span class="alert-message">
            <strong>{{ $message }}</strong>
        </span>
        <span onclick="closeAlert(this)" class="cursor-pointer">&times;</span>
    </div>
@endif

@if ($type == "success")
    <div class="alert alert-success">
        <span class="alert-message">
            <strong>{{ $message }}</strong>
        </span>
        <span onclick="closeAlert(this)" class="cursor-pointer text-2xl">&times;</span>
    </div>
@endif

@if ($type == "errors")
    <div class="alert alert-errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span onclick="closeAlert(this)" class="cursor-pointer text-2xl">&times;</span>
    </div>
@endif
