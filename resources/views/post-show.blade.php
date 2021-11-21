@extends('layout')
@section('content')
<div class="container">

  <div class="card bg-dark text-white">
    <img class="card-img" src="/images/{{$record->image}}" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title">title:{{$record->title}}</h5>
      <p class="card-text">{{$record->created_at}}</p>
    </div>
  </div>

  <h4><p>{{$record->content}}</p></h4>
<hr>
@foreach($comments as $c)
<div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">

        <p class="taskDescription"></p>
    </div>
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <p class="">{{$c->content}}</p> <span class="date sub-text">on {{$c->created_at}}</span>

                </div>
            </li>
        </ul>

    </div>
</div>

@endforeach
<form method="post" action="{{route('comments.store')}}" >
  @csrf
<div class="col-sm-10">
<label for="">comment</label>
<input hidden for"post_id" name="post_id" value="{{$record->id}}">
<input type="text" for"content" name="content" class="form-control" placeholder="Here you can add your comments">

<br>
<center>
<button class="btn btn-primary" type="submit">Add comment</button>

<br>
</div>
</form>
</div>
@endsection
