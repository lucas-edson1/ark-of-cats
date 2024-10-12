@extends('app.layout')
@section('title', 'Página Inicial - AOC ')
@section('content')
    <div class="welcome-message">
        <i class="fa-solid fa-cat"></i>
        <p>Bem-vindo à Arca dos Gatos. Para pesquisar seus gatos favoritos, insira uma raça:</p>
        <i class="fa-solid fa-paw"></i>
    </div>
    <form class="d-flex search-cat" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@endsection
