@if(Auth::check() && 1 == 0)
    <?php
        $u = \App\user::where('tipo', 1)->get();
    ?>
    @foreach($u as $user)
        @foreach($user->message as $message)
        <div class="alert alert-blue-dirty alert-fill alert-avatar alert-no-border alert-close alert-dismissible fade in text-shadow" role="alert" style="background: {{$message->color}};">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="avatar-preview avatar-preview-32">
                <img src="/Template/img/avatar-2-64.png" alt="">
            </div>
            <strong>{{$message->titulo}}</strong><br>
            {{$message->contenido}}
            <div class="text-right hidden-xs-down">
                {{$message->dateUpdate()}}
            </div>
            <div class="text-right hidden-xs-down">
                ATTE: {{$message->user}}
            </div>
        </div>
        @endforeach
    @endforeach
@endif
