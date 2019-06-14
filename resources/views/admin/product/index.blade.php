@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Продукция</div>

                <a href="{{route('product.create')}}" class="btn btn-success">Создать новый товар</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <nav class="nav flex-column nav-pills">
                        @foreach($products as $k=>$product)
                        <a class="nav-link active" href="{{route('product.edit', $product->slug)}}">{{$product->title}}</a>
                        <form method="post" action="{{route('product.destroy', $product->slug)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Вы действительно желаете навсегда удалить этот товар ?');" class="btn btn-danger">
                                Удалить
                            </button>
                        </form>
                        @endforeach
                    </nav>                         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
