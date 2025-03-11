@extends('app')

@section('content')
    @include('components.topnav', ['title' => 'Dashboard'])
    <div class="flex justify-content-between align-items-center max-w-screen-lg mx-auto p-4">
        <div class="w-1/4 text-white border-2 border-blue-500 text-center">
            <h1 class="mb-4 text-3xl">USERS</h1>
        </div>
        <div class="w-3/4 text-white border-2 border-red-500 text-center">
            <div class="flex justify-between">
            <h1 class="w-1/3 mb-4 text-3xl border-2 border-red-500">ITEMS</h1>
            <h1 class="w-1/3 mb-4 text-3xl border-2 border-red-500">AMOUNT</h1>
            <h1 class="w-1/3 mb-4 text-3xl border-2 border-red-500">PAID BY</h1>
            </div>
            @foreach($items as $item)
                <div class="flex justify-between">
                    <div class="w-1/3 border-2 border-red-500">
                        <p class="text-center">{{$item->name}}</p>
                    </div>
                    <div class="w-1/3 border-2 border-red-500">
                        <p class="text-center">{{$item->amount}}</p>
                    </div>
                    <div class="w-1/3 border-2 border-red-500">
                        <p class="text-center">1</p>
                    </div>
                </div>
                @endforeach
            {{--                                   ADD ITEM FORM                                                                    --}}
            <form action="{{route('page.store')}}" method="post">
                @method('POST')
                @csrf
                <div class="flex justify-between">
                    <div class="w-1/3 border-2 border-red-500">
                        <input type="text" name="name" id="name" placeholder="Item name" class="text-center mr-2 ms-1">
                    </div>
                    <div class="w-1/3 border-2 border-red-500 ">
                        <input type="number" name="amount" id="amount" placeholder="Amount" class="text-center mr-2 ms-1">
                    </div>
                    <div class="w-1/3 border-2 border-red-500">
                        <select name="" id="">
                            <option value="1" class="text-black">User 1</option>
                            <option value="2" class="text-black">User 2</option>
                            <option value="3" class="text-black">User 3</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add item</button>
            </form>
        </div>

    </div>
@endsection
