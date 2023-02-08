@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <h5 class="card-header">Detail</h5>
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text">{!! $post->desc !!}</p>
                </div>
              </div>
        </div>
    </div>
@endsection
