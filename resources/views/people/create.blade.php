<form id="people" action="{{ route('people.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name"> Person Name: </label>
        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="for-group">
        <label for="profession"> Person Profession: </label>
        <input type="text" name="profession" id="profession" class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}">
        @if ($errors->has('profession'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('profession') }}</strong>
            </span>
        @endif
    </div>
    <div class="for-group">
        <label for="email"> Person E-mail: </label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</form>
