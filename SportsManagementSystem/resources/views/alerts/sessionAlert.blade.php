@if(Session::has('message'))
    <div class="alert alert-{{Session::get('type')}} alert-fill alert-close alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{Session::get('message')}}
    </div>
@endif

<div class="alert alert-fill alert-close alert-dismissible fade in" role="alert" style="display:none" id="AlarmsAlert">
    <button type="button" class="close" onclick="$('#AlarmsAlert').hide(500)" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div id="AlarmsAlertMessage">
        
    </div>
</div>
