@if ($message = Session::get('success'))
    <x-alert type="success" :$message />
@endif

@if ($message = Session::get("error"))
    <x-alert type="alert" :$message />
@endif

@if ($errors->any())
    <x-alert type="errors" :errors="$errors" message="" />
@endif
