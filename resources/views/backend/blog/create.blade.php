@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new Post')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog
          <small>Add new post</small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('backend.blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">All Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Blog</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm">
                    <a href="{{ route('backend.blog.index') }}" class="btn btn-success">Back</a>
                  </div>
                </div>

                {!! Form::model($post, [
                        'method' => 'POST',
                        'route' => 'backend.blog.store',
                        'files' => TRUE
                    ]) !!}

                    <div class="form-group">
                        {!! Form::label('title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':'')]) !!}

                        @if($errors->has('title'))
                            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':'')]) !!}

                        @if($errors->has('slug'))
                            <span class="invalid-feedback">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('excerpt') !!}
                        {!! Form::textarea('excerpt', null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':'')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':'')]) !!}

                        @if($errors->has('body'))
                            <span class="invalid-feedback">{{ $errors->first('body') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('published_at', 'Publish Date') !!}
                        {!! Form::text('published_at', null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':''), 'placeholder' => 'Y-m-d H:i:s']) !!}

                        @if($errors->has('published_at'))
                            <span class="invalid-feedback">{{ $errors->first('published_at') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', App\Models\Category::pluck('title', 'id'), null, ['class' => 'form-control '.($errors->has('title') ? 'is-invalid':''), 'placeholder' => 'Choose category']) !!}

                        @if($errors->has('category_id'))
                            <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Featured Image') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}

                        @if($errors->has('image'))
                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <hr>

                    {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
