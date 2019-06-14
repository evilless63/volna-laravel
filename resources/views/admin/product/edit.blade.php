@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Редактирование товара {{$product->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('product.update', $product->slug)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="title">Название</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="{{$product->title}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Описание" value="{{$product->description}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Основное изображение</label>
                            <input type="file" class="form-control" id="main_image_path" name="main_image_path" placeholder="Основное изображение">
                        </div>

                        @if(isset($product->main_image_path))
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ asset('/storage/' .$product->main_image_path)}}" class="rounded img-thumbnail float-left" alt="{{ $product->name }}">
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="meta_description">Мета описание (SEO)</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Мета описание" value="{{$product->meta_description}}">
                        </div>

                        <div class="form-group">
                            <label for="meta_keys">Мета ключи (SEO)</label>
                            <input type="text" class="form-control" id="meta_keys" name="meta_keys" placeholder="Мета ключи" value="{{$product->meta_keys}}">
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="{{$product->is_active}}" @if( $product->is_active ) checked="1" @endif>
                            <label class="form-check-label" for="is_active">Включен</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="add_shema" id="add_shema" value="{{$product->add_shema}}" @if( $product->add_shema ) checked="1" @endif>
                            <label class="form-check-label" for="add_shema">Размещать в схемах оборудования</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
