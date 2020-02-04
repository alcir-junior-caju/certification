@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')

    @include('common.messages')

    <h1>Editar Categoria</h1>
    <div class="col-lg-12">&nbsp;</div>

    <div class="col-lg-12">
        {!! Form::model($category, [
                'method' => 'put',
                'route' => ['certification.category.update', $category->id]
            ]) !!}
            <div class="row">
                @include('certification.category.form')
                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Alterar', [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100%; margin-top: 25px;'
                        ]) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@endsection
