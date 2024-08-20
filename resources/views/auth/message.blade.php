@if(!empty(session("success")))
    <div class="alert alert-primary" role="alert">
        {{ sesion("success") }}
    </div>
@endif

@if(!empty(session("error")))
    <div class="alert alert-danger" role="alert">
        {{ session("error") }}
    </div>
@endif