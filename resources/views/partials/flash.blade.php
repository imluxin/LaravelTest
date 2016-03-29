@if(\Illuminate\Support\Facades\Session::has('flash_message'))
    <div class="alert alert-success
    {{ \Illuminate\Support\Facades\Session::has('flash_message_important') ? 'alert-important' : '' }}">
        @if(\Illuminate\Support\Facades\Session::has('flash_message_important'))
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif
        {{ session('flash_message_important') }}
        {{ session('flash_message') }}
    </div>
@endif

<script type="text/javascript">
//    $('div.alert').not('.alert-important').delay(13000).remove();//.slideUp(300);
</script>
