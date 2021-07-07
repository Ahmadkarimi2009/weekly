@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show w-100">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        @endforeach
    </ul>
</div>
@endif