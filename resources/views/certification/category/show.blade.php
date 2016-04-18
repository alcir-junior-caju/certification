@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

    @include('flash::message')

    <h1>Questões da Categoria {{ $category->category_name_en }}</h1>

    <div class="row">
        <div class="col-lg-12 text-right">
            <a href="{{ route('certification.question.question', $category->id) }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Nova Questão
            </a>
        </div>
        <div class="col-lg-12">&nbsp;</div>
    </div>

    <div class="col-lg-12">
        <div class="row">
            @if(count($question))
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($question as $key => $q)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-{{ $key }}" style="overflow:hidden;">
                                <h4 class="panel-title col-lg-11 pull-left">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                                        {{ $q->question_name_en }}
                                    </a>
                                </h4>
                                <div class="col-lg-1 pull-right text-right">
                                    <a href="{{ route('certification.question.edit', $q->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ route('certification.question.delete', $q->id) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="collapse-{{ $key }}" class="panel-collapse collapse @if($key == 0)in @endif" role="tabpanel" aria-labelledby="heading-{{ $key }}">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        @if($q->question_type == 'text')
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    {!! Form::label('option-'.$key, 'Resposta', null, ['class' => 'control-label']) !!}
                                                    {!! Form::text('option-'.$key, null, ['class' => 'form-control']) !!}
                                                </div>
                                                <span class="text-success" id="answer-{{ $key }}" style="display:none;">
                                                    {{ $q->answer[0]->answer_name_en }}
                                                    <br />
                                                    <em>({{ $q->answer[0]->answer_name_pt }})</em>
                                                </span>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="#" class="btn btn-primary answer-{{ $key }}" data-element="#answer-{{ $key }}" style="width: 100%; margin-top: 25px;">
                                                    Ver a Resposta
                                                </a>
                                            </div>
                                            <script type="text/javascript">
                                                $(function(){
                                                    $(".answer-{{ $key }}").click(function(e){
                                                        e.preventDefault();
                                                        el = $(this).data('element');
                                                        $(el).toggle();
                                                    });
                                                });
                                            </script>
                                        @elseif($q->question_type == 'radio')
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('Opções', 'Opções', null, ['class' => 'control-label']) !!}
                                                    <div>
                                                        @foreach($q->answer as $k => $a)
                                                            <strong>{{ ++$k }}</strong>&nbsp;.&nbsp;&nbsp;
                                                            <label class="radio-inline" style="margin-top:-1px;">
                                                                {!! Form::radio('answer-'.$key, $a->answer_name_en) !!}
                                                                <span class="{{ $a->answer }}-{{ $key }}">
                                                                    {{ $a->answer_name_en }}
                                                                    <em>({{ $a->answer_name_pt }})</em>
                                                                </span>
                                                            </label><br />
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <a href="#" class="btn btn-primary answer-{{ $key }}" data-element=".true-{{ $key }}" style="width: 100%; margin-top: 25px;">
                                                    Ver a Resposta
                                                </a>
                                            </div>
                                            <script type="text/javascript">
                                                $(function(){
                                                    $(".answer-{{ $key }}").click(function(e){
                                                        e.preventDefault();
                                                        el = $(this).data('element');
                                                        $(el).toggleClass('text-success');
                                                    });
                                                });
                                            </script>
                                        @elseif($q->question_type == 'checkbox')
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('Opções', 'Opções', null, ['class' => 'control-label']) !!}
                                                    <div>
                                                        @foreach($q->answer as $k => $a)
                                                            <strong>{{ ++$k }}</strong>&nbsp;.&nbsp;&nbsp;
                                                            <label class="checkbox-inline" style="margin-top:-1px;">
                                                                {!! Form::checkbox('answer-'.$key, $a->answer_name_en) !!}
                                                                <span class="{{ $a->answer }}-{{ $key }}">
                                                                    {{ $a->answer_name_en }}
                                                                    <em>({{ $a->answer_name_pt }})</em>
                                                                </span>
                                                            </label><br />
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <a href="#" class="btn btn-primary answer-{{ $key }}" data-element=".true-{{ $key }}" style="width: 100%; margin-top: 25px;">
                                                    Ver a Resposta
                                                </a>
                                            </div>
                                            <script type="text/javascript">
                                                $(function(){
                                                    $(".answer-{{ $key }}").click(function(e){
                                                        e.preventDefault();
                                                        el = $(this).data('element');
                                                        $(el).toggleClass('text-success');
                                                    });
                                                });
                                            </script>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-lg-12">
                    <div class="row">
                        <div class="well well-sm text-center">Sem Questões para {{ $category->category_name_en }}.</div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
