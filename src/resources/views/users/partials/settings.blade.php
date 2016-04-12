<form class="form-horizontal" action="{{ url('/profile') }}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name', $user->name) }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-8">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email', $user->email) }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-5">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            <p class="help-block">
                Leave the field blank if you want to remain your old password.
            </p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword2" class="col-sm-2 control-label">Repeat Password</label>

        <div class="col-sm-5">
            <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" placeholder="Repeat password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
</form>