@extends('admin.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post" class="form">
                                      @csrf
                                        <div class="form__article">
                                            <h3>here you can add the products</h3>
                                            <div>
                                            <select name="category_id" for"category_id" id="capital" class="form-control my-3">
                                                <option >Category</option>
                                                @foreach($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="name"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="name" required>name</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="color"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="color" required>color</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="brand"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="brand" required>brand</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="price"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="price" required>price</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="old_price"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="old_price" required>old price</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="brand"  name="name"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="brand" required>title</label>
                                                </div>

                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <textarea class="mdl-textfield__input"   name="description"  id="gov_name"/>
                                                    </textarea>
                                                    <label class="mdl-textfield__label" for="content" required></label>
                                                </div>


                                                  <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="file"  name="image"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="image" required></label>
                                                  </div>
                                                <div class="">
                                                  @foreach($errors as $e)
                                                    <h1>{{$e}}</h1>
                                                  @endforeach
                                                </div>
                                              <div>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                Add product
                                              </button>
                                            </div>

                                    </form>



@endsection
