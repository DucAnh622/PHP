@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif -->
<!-- <script>
    $(document).ready(function() {
        toastr.options.timeOut = 3000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script> -->
<script>
    $(document).ready(function(){
        toastr.options.timeOut = 3000;
        @if(session::has('error'))
            toastr.error('{{session::get('error')}}');
        @elseif (session::has('success'))    
            toastr.success('{{session::get('success')}}');
        @endif    
    })
</script>