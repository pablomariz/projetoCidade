@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

         @if ($errors->any())   
        <div class="red-text">     
            <ul>               
                @foreach ($errors->all()  as $error)
                    <li>
                        {{$error}}
                    </li> 
                @endforeach 
            </ul>   
        </div>

        @endif

        <form action="{{route('admin.cidades.adicionar')}}" method="POST">
            @csrf
            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome')}}"required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field">
                <input type="number" name="valor" id="valor" value="{{old('valor')}}" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                required>
                <label for="valor">Valor</label>
            </div>

            <div class="input-field">
                <input type="date" name="data" id="data" value="{{old('data')}}">
                <label for="data">Data de Lançamento</label>
            </div>


            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </section>

@endsection
