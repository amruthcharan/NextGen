@extends('frontend.layouts.v2')

@section('title', setting('site.title'))
@section('description', setting('site.description'))

@section('body')
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="d-none d-sm-block col-md-3">
                    @include('frontend.v2.home.categories')
                </div>
                @include('frontend.v2.home.slider')
                @include('frontend.v2.home.right-posts')
            </div>
            <div class="u-bg-white">
                @include('frontend.v2.home.top-reviews')
            </div>
            <div class="u-bg-white">
                @include('frontend.v2.home.popular-stores')
            </div>
        </div>
    </div>
@endsection
