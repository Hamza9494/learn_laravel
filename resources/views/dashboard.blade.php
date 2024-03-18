@extends('layout.layout')
@section('content')
<div class="row">
    @include('shared.left-bar')

    <div class="col-6">
        @include('shared.success-message')


        @include('shared.submit-idea')
        <hr>
        @forelse ($ideas as $idea)
        <div class="mt-3">
            @include('shared.idea-card')
        </div>
        @empty
        <h3 class="text-center mt-3"> No results found for " {{request('search')}} " </h3>
        @endforelse




        {{$ideas->withQueryString()->links()}}
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')

    </div>
</div>


@endsection