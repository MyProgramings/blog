@extends('layouts.main')

@section('content')
    <div class="container text-muted">
        <div class="row mb-4">
            <div>
                <img src="{{ $contents->profile_photo_url }}" width="150px" class="rounded-full mx-auto">
                <h2 class="text-center mt-1">{{ $contents->name }}</h2>
            </div>
        </div>
        <div class="row p-3">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item" style="list-style: none">
                    <a href="#" class="nav-link">منشوراتي</a>
                </li>
                <li class="nav-item" style="list-style: none">
                    <a href="#" class="nav-link">تعليقاتي</a>
                </li>
            </ul>
            @include('user.posts_section')
        </div>
    </div>
@endsection