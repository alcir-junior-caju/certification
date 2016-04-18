@if(!empty($id))
    {{--*/ $value = $id /*--}}
@else
    {{--*/ $value = null /*--}}
@endif

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('certification_id', 'Certificação', null, ['class' => 'control-label']) !!}
        {!! Form::select('certification_id', $certification->lists('certification_name_en', 'id'),
            $value, ['class' => 'form-control']
        ) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('category_name_en', 'Nome Inglês', null, ['class' => 'control-label']) !!}
        {!! Form::text('category_name_en', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('category_name_pt', 'Nome Português', null, ['class' => 'control-label']) !!}
        {!! Form::text('category_name_pt', null, ['class' => 'form-control']) !!}
    </div>
</div>
