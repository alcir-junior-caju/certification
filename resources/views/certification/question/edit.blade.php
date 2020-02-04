@extends('layouts.app')

@section('title', 'Editar Questão')

@section('content')

    @include('common.messages')

    <h1>Editar Questão</h1>
    <div class="col-lg-12">&nbsp;</div>

    <div class="col-lg-12">
        {!! Form::model($question, [
                'method' => 'put',
                'route' => ['certification.question.update', $question->id]
            ]) !!}
            <div class="row">
                @include('certification.question.form')
                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Editar', [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100%; margin-top: 25px;'
                        ]) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@endsection
