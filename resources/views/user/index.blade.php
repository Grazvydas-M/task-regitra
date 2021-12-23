cia yra data
@if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
        <strong>Welcome{{ Auth::user()->email }}</strong>
        <br />
        <a href="{{url('/login/logout')}}">Logout</a>
    </div>
    else
        <script>window.location = "/login";</script>
@endif
