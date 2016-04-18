@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

    @include('flash::message')

    <h1>Categorias de {{ $certification->certification_name_en }}</h1>
    <div class="col-lg-12 text-right">
        <a href="{{ route('certification.category.category', $certification->id) }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Nova Categoria
        </a>
    </div>
    <div class="col-lg-12">&nbsp;</div>
    <div class="col-lg-12">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categoria em Inglês</th>
                    <th>Categoria em Português</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(count($category))
                    @foreach($category as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->category_name_en }}</td>
                            <td>{{ $c->category_name_pt }}</td>
                            <td>
                                <a href="{{ route('certification.category.edit', $c->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                &nbsp;
                                <a href="{{ route('certification.category.delete', $c->id) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                &nbsp;
                                <a href="{{ route('certification.category.show', $c->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="4" class="text-center">Sem Categorias para {{ $certification->certification_name_en }}.</td></tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="col-lg-12">
        <div class="pull-left">
            {!! $category->links() !!}
        </div>
        <div class="pull-right" style="padding:30px 0;">
            <p>
                Você está na página <strong>{{ $category->currentPage() }}</strong>
                 de <strong>{{ $category->lastPage() }}</strong>
                 exibindo <strong>{{ $category->count() }} Certificações</strong>
                 de <strong>{{ $category->total() }}</strong>.
            </p>
        </div>
    </div>
@endsection
