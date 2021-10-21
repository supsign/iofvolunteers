@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65" alt="search icon"> Edit Guest</h1>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('guest.update', $guest->id) }}">
                @csrf
                @method("PATCH")

            </form>
        </div>
    </section>
@endsection
