@if($errors->get($field))
    <div class='alert alert-danger'>
        <div class='error'>{{ $errors->first($field) }}</div>
    </div>
@endif