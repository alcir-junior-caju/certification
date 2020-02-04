@extends('layouts.app')

@section('title', 'Certificações')

@section('content')

    @include('flash::message')

    <div class="col-lg-12">
        <h1>Todas Certificações</h1>
    </div>
    <div class="col-lg-12 text-right">
        <a href="{{ route('certification.certifications.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Nova Certificação
        </a>
    </div>
    <div class="col-lg-12">&nbsp;</div>
    <div class="col-lg-12 text-center">
        <div class="row">
            @if(count($certification))
                @foreach($certification as $c)
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <strong>{{ $c->certification_name_en }}</strong>
                            </div>
                            <div class="panel-body">
                                <i class="fa {{ $c->certification_icon }}" style="font-size:190px;height:195px;"></i>
                            </div>
                            <div class="panel-footer" style="overflow:hidden;">
                                <div class="pull-left"><strong>Ações</strong></div>
                                <div class="pull-right">
                                    <a href="{{ route('certification.certifications.edit', $c->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ route('certification.certifications.delete', $c->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ route('certification.certifications.show', $c->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">
                    <div class="well well-sm">Nenhuma Certificação.</div>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-12">
        <div class="pull-left">
            {!! $certification->links() !!}
        </div>
        <div class="pull-right" style="padding:30px 0;">
            <p>
                Você está na página <strong>{{ $certification->currentPage() }}</strong>
                 de <strong>{{ $certification->lastPage() }}</strong>
                 exibindo <strong>{{ $certification->count() }} Certificações</strong>
                 de <strong>{{ $certification->total() }}</strong>.
            </p>
        </div>
    </div>

@endsection
