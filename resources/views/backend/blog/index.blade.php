@extends('layouts.backend.main')

@section('title', 'MyBlog | Dashboard')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog
          <small>Display All blog posts</small></h1>
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
                <h3 class="card-title">All Blogs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                        @foreach($posts as $post)

                            <tr>
                                <td>
                                    <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>
                                    <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                                    {!! $post->publicationLabel() !!}
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $posts->links() }}
                    </div>
                    <div class="float-left">
                        <?php $postCount = $posts->count() ?>
                        <small>Total: {{ $postCount }} {{ Str::plural('Item', $postCount) }}</small>
                    </div>
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
