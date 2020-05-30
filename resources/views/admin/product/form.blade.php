@yield('form')
<div class="row">
    <div class="col-md-6 form-group required">
        <label>Title</label>
        {{ Form::text('title', null, ['class' => 'form-control title', 'required' => true, 'autocomplete' => 'off']) }}
    </div>
    <div class="col-md-3 form-group required">
        <label>Slug</label> <small class="text-muted">eg: domain.com/product/{slug}</small>
        {{ Form::text('slug', null, ['class' => 'form-control slug', 'required' => true, 'autocomplete' => 'off']) }}
    </div>
    <div class="col-md-3 form-group required">
        <label>Price</label>
        {{ Form::number('price', null, ['class' => 'form-control', 'required' => true, 'autocomplete' => 'off', 'min' => 0]) }}
    </div>
    <div class="col-md-12 form-group">
        <label>Content</label>
        {{ Form::textarea('content', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
    </div>
</div>
{!! Form::btnSave() !!}
{{ Form::close() }}

@push ('script')
$(".title").keyup(function(e){
    $(".slug").val($(this).val().toLowerCase().replace(/[^a-zA-Z0-9\s]+/gi,'').replace(/[_\W]+/g,'-'));
});
@endpush