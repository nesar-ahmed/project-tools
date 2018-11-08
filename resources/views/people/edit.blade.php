<form id="editpeople" action="{{ route('people.update',$people->id) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <label for="name"> Person Name: </label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $people->name }}" required>
    </div>
    <div class="for-group">
        <label for="profession"> Person Profession: </label>
        <input type="text" name="profession" id="profession" class="form-control" value="{{ $people->profession }}" required>
    </div>
    <div class="for-group">
        <label for="email"> Person E-mail: </label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $people->email }}" required>
    </div>
</form>
