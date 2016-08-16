@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
    <div class="alert {{ Session::get("message_alert") }} alert-dismissible " role="alert">
        @if( Session::has('message_ico')  )
            <span class="glyphicon glyphicon-{{ Session::get("message_ico") }}" aria-hidden="true"></span>
        @endif
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get("message") }}
    </div>
@endif

@if(Session::has('message_floating'))
    <section class="alert-floating alert {{ Session::get("message_alert") }} alert-dismissable">
        <p>
            {{ Session::get("message_floating") }}
        </p>
    </section>

    @section('scripts')
        @parent
        <script type="text/javascript">
            $(document).ready(function() {
                showAlertFloating();
                console.log('entre');
            });
        </script>
    @endsection

@endif

