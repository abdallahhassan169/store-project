@extends('layout')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach($posts as $post)
        <img src"images/{{$post->image}}">
        <div class="col-md-4">

          <div class="card mb-4 shadow-sm">
            <div class="card-body">
              <img src="/images/1586784743.animal.jpg" height="170" width="320" alt="no image">
              <p class="card-text">{{$post->content}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('post_show',$post->id)}}">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </a>

                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{$post->created_at}}</small>
              </div>
              {{$post->image}}
              <div class="form-group row">
      <form >
    <div class="col-sm-10">
      <label for="">comment</label>
      <div>
      <input type="text" class="form-control" id="inputPassword">
    </div><br>
      <div>
      <button class="btn btn-primary" type="submit">Add comment</button>
    </div>
    </div>
  </form>
  </div>
            </div>
          </div>
        </div>
        @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
