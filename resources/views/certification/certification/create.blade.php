@extends('layouts.app')

@section('title', 'Criar Certificação')

@section('content')

    @include('common.messages')

    <h1>Criar Certificação</h1>
    <div class="col-lg-12">&nbsp;</div>

    <div class="col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => 'certification.certifications.store']) !!}
            <div class="row">
                @include('certification.certification.form')
                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Salvar', [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100%; margin-top: 25px;'
                        ]) !!}
                    </div>
                </div>
                <div class="col-lg-12">
                    <p>No Campo Icone use os icones do <a href="http://fizzed.com/oss/font-mfizz" target="_blank">Fizzed</a>, coloque apenas a classe <i>icon-apache</i>.</p>
                    <p>Ou use o <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a>, colocando apenas a classe <i>fa-hashtag</i></p>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
