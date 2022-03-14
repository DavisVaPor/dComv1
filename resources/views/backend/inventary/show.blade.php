@extends('backend.admin')

@section('main')
    <section>
        <livewire:article.show-articles :article="$article">
    </section>
@endsection