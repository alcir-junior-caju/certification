@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

    @include('flash::message')

    <h1>Opções de {{ $question->question_name_en }}</h1>
    <div class="col-lg-12 text-right">
        <a href="#" class="btn btn-primary">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Nova Resposta
        </a>
    </div>
    <div class="col-lg-12">&nbsp;</div>
    <div class="col-lg-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pergunta em Inglês</th>
                    <th>Pergunta em Português</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(count($answer))
                    @foreach($answer as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->answer_name_en }}</td>
                            <td>{{ $a->answer_name_pt }}</td>
                            <td>
                                <a href="{{ route('certification.answer.edit', $a->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                &nbsp;
                                <a href="{{ route('certification.answer.delete', $a->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                &nbsp;
                                <a href="{{ route('certification.answer.show', $a->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="4" class="text-center">Sem Opções para {{ $question->question_name_en }}.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
