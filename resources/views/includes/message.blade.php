@if (Session('message'))
    <div class="alert bg-primary fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{ Session('message') }}
    </div>
@endif
@if (Session('errorM'))
    <div class="alert bg-danger fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{ Session('errorM') }}
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert bg-warning fade in">
            <a href="#" class="close" data-dismiss="alert">×</a>
            {{ $error }}
        </div>
    @endforeach
@endif
