@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Basket</h3>
    <div class="row">
        <div class="col-12">
            @if($user->basket_items->count() === 0)
            <h4 class="text-secondary">Your basket is empty</h4>
            @endif
            <table class="table table-image">
                <tbody>
                    @foreach($user->basket_items as $basket_item)
                    <tr>
                        <td>
                            <img height="200" width="132" src="{{$basket_item->cover_image}}" alt="cover_image">
                        </td>
                        <td>{{$basket_item->book_name}}</td>
                        <td>
                            <form method="post" action="{{route('alter_quantity', array('basket_item_id'=>$basket_item->basket_items->id))}}">
                                @csrf
                                <select name="quantity" onchange="this.form.submit();">
                                    @for($i=1;$i<=10;$i++) <option value="{{$i}}" <?php if ($i == $basket_item->basket_items->quantity) : ?> selected="selected" <?php endif; ?>>
                                        {{$i}}</option>
                                        @endfor
                                </select>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('remove_book', array('basket_item_id'=>$basket_item->basket_items->id))}}">
                                @csrf
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                        <td>£{{$basket_item->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection