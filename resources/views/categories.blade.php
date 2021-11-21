<!DOCTYPE html>
@extends('layout')
@section('content')
<script >
  var request=XMLHttpRequest();
  request.open("Get","categories",true)
</script>
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">

        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <!--Status section-->
    <section class="Status-details">
        <div class="container">
            <div class="Status-info p-3 my-4">

                <div class="row">
                  @foreach($categories as $c)
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">قسم</p>
                        <p class="status-item float-right p-3">{{$c->name}}</p>
                        <div>
                        <a href="{{route('category_posts',$c->id)}}">
                          <button class="btn btn-primary">مشاهدة</button>
                        </a>
                        </div>

                    </div>
                    @endforeach

                </div>

              </div><!--End Container-->
    </section><!--End Status section-->
@endsection
