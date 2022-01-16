@extends('layouts.backend.main')

@section('title', 'MyBlog | Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="lead text-muted">Welcome {{ Auth::user()->name }},
                    {{ __('You are logged in!') }}
                    </p>

                    <h4>Get started</h4>
                      <p><a href="{{ route('backend.blog.create') }}" class="btn btn-primary">Write your first blog post</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
