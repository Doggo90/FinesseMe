@extends('app')

@section('content')
    @include('components.topnav', ['title' => 'Dashboard'])
    <div class="flex justify-content-between align-items-center max-w-screen-lg mx-auto p-4">
        <div class="w-1/4 text-white  text-center">
            <h1 class="mb-4 text-3xl">USERS</h1>
            @foreach ($users as $user)
                <div class="flex justify-between">
                    <div class="w-full ">
                        <p class="text-center">{{ $user->name }}</p>
                    </div>
                    <div class="w-full ">
                        <p class="text-center">{{ $user->balance }}</p>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <form action="{{ route('page.addUser') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="">
                        <div class="w-full ">
                            <input type="text" name="name" id="name" placeholder="Name"
                                class="text-center mr-2 ms-1">
                        </div>
                        <div class="w-full  ">
                            <input type="number" name="balance" id="balance" placeholder="Balance"
                                class="text-center mr-2 ms-1">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
                </form>
            </div>
        </div>
        <div class="w-3/4 text-white  text-center">
            <div class="flex justify-between">
                <h1 class="w-1/4 mb-4 text-3xl ">ITEMS</h1>
                <h1 class="w-1/4 mb-4 text-3xl ">AMOUNT</h1>
                <h1 class="w-1/4 mb-4 text-3xl ">PAID BY</h1>
                <h1 class="w-1/4 mb-4 text-3xl ">STATUS</h1>
            </div>
            @foreach ($items as $item)
                <div class="flex justify-between">
                    <div class="w-1/4 ">
                        <p class="text-center">{{ $item->name }}</p>
                    </div>
                    <div class="w-1/4 ">
                        <p class="text-center">{{ $item->amount }}</p>
                    </div>
                    <div class="w-1/4 ">
                        <p class="text-center">{{ $item->user->name }}</p>
                    </div>
                    <div class="flex justify-content-between w-1/4 ">
                        <p class="w-full text-center ">{{ $item->status }}</p>
                        @if ($item->status == 'pending')
                            <span>
                                <form action="{{ route('page.paid', $item->id) }}" method="post" class="w-full ">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded">MP</button>
                                </form>
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="flex w-1/2 ">
                <p class="w-full text-center">
                    Total:
                </p>
                <p class="w-full text-center">
                    {{ $total }}
                </p>

            </div>
            {{--                                   ADD ITEM FORM                                                                    --}}
            <form action="{{ route('page.store') }}" method="post">
                @method('POST')
                @csrf
                <div class="flex justify-between">
                    <div class="w-1/3 ">
                        <input type="text" name="name" id="name" placeholder="Item name"
                            class="text-center mr-2 ms-1">
                    </div>
                    <div class="w-1/3  ">
                        <input type="number" name="amount" id="amount" placeholder="Amount"
                            class="text-center mr-2 ms-1">
                    </div>
                    <div class="w-1/3 ">
                        <select name="user_id" id="user_id" class="text-center mr-2 ms-1">
                            <option value="" class="text-black">Select user</option>
                            @foreach ($users as $user)
                                <option value={{ $user->id }} class="text-black">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add item</button>
            </form>
        </div>
    </div>
    <div class="flex justify-content-between align-items-center max-w-screen-lg mx-auto p-4">
        @foreach ($users as $user)
            <div class="w-1/3 text-center text-white ">
                <h1 class="text-white text-2xl uppercase font-bold">{{ $user->name }}</h1>
                    <div class="flex justify-between">
                        <div class="w-1/2">
                            <p class="uppercase font-bold">Item</p>
                            @foreach ($user->items as $item)
                                <p class="">{{ $item->name }}</p>
                            @endforeach
                            <p class="mt-2 font-bold">Balance:</p>
                        </div>
                        <div class="w-1/2">
                            <p class="uppercase font-bold">Amount</p>
                            @foreach ($user->items as $item)
                                <p class="">{{ $item->amount }}</p>
                            @endforeach
                            <p class="mt-2 font-bold">{{$user->balance}}</p>
                        </div>
                    </div>
            </div>
        @endforeach

    </div>
@endsection
