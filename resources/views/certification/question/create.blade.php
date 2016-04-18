@extends('layouts.app')

@section('title', 'Nova Questão')

@section('content')

    @include('common.messages')

    <h1>Nova Questão</h1>
    <div class="col-lg-12">&nbsp;</div>

    <div class="col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => 'certification.question.store']) !!}
            <div class="row">
                @include('certification.question.form')
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
