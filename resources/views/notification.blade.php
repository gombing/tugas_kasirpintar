@if (! empty(session('message')))
    @if (is_array(session('message')))
        <script>swal("{!! session('message.content') !!}", "{!! session('message.title') !!}",'success');</script>
    @else
        <script>swal("{!! session('message') !!}",'Messages','success');</script>
    @endif

    {{--<div id="notifmessage" class="myadmin-alert myadmin-alert-img alert-{{ session('message.type', 'info') }} myadmin-alert-top-right"> <a href="#" onclick="$('#notifmessage').hide();" class="closed">&times;</a>--}}
    {{--@if (is_array(session('message')))--}}
    {{--@if(session('message.title')) <h4>{!! session('message.title') !!}</h4> @endif--}}
    {{--{!! session('message.content') !!}--}}
    {{--@else--}}
    {{--{!! session('message') !!}--}}
    {{--@endif--}}
    {{--<script> $("#notifmessage").fadeToggle(350); </script>--}}
@endif

@if (session()->has('status'))
    <script>swal("{!! session()->get('status') !!}",'Success','success');</script>
    {{--<div id="notifstatus" class="myadmin-alert myadmin-alert-img alert-success myadmin-alert-top-right"> <a href="#" onclick="$('#notifstatus').hide();" class="closed">&times;</a>--}}
    {{--<strong>Success!</strong> {!! session()->get('status') !!}--}}
    {{--</div>--}}
    {{--<script> $("#notifstatus").fadeToggle(350); </script>--}}
@endif

@if (count($errors) > 0)
    @php
        $pesan = '';
        foreach ($errors->all() as $error){
            $pesan.=$error.', ';
        }
    @endphp
    <script>swal('{{ $pesan }}','Error','error')</script>

    {{--<div id="notiferror" class="myadmin-alert myadmin-alert-img alert-danger myadmin-alert-top-right"> <a href="#" onclick="$('#notiferror').hide();" class="closed">&times;</a>--}}
    {{--<strong>Whoops! There were some problem(s):</strong>--}}
    {{--<ul>--}}
    {{--@foreach ($errors->all() as $error)--}}
    {{--<li>{!! $error !!}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<script> $("#notiferror").fadeToggle(350); </script>--}}
@endif

