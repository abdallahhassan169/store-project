@extends('admin.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form enctype="multipart/form-data" action="{{route('posts.update',$record->id)}}" method="post" class="form">
                                      {{ csrf_field() }}
                                     {{ method_field('PATCH') }}
                                        <div class="form__article">
                                            <h3>here you can add the posts</h3>
                                            <div>
                                            <select name="category_id" for"category_id" id="capital" class="form-control my-3">
                                                <option >Category</option>
                                                @foreach($categories as $category)
                                                  <option value="$category->id">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="title"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="title" required>title</label>
                                                </div>

                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <textarea class="mdl-textfield__input"   name="content"  id="gov_name"/>
                                                    </textarea>
                                                    <label class="mdl-textfield__label" for="content" required>content</label>
                                                </div>


                                                  <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="file"  name="image"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="image" required></label>
                                                  </div>

                                                                            <div>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                Update post
                                              </button>
                                            </div>

                                    </form>



@endsection
