@extends('layouts.app')

@section('title', 'Criar Categoria')

@section('content')

    @include('common.messages')

    <h1>Criar de Categoria</h1>
    <div class="col-lg-12">&nbsp;</div>

    <div class="col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => 'certification.category.store']) !!}
            <div class="row">
                @include('certification.category.form')
                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Salvar', [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100%; margin-top: 25px;'
                        ]) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@endsection
