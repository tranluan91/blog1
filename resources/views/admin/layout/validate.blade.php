@if ($errors->any())
 <div class="alert alert-danger">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
</div>
@endif

