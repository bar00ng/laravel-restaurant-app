@extends('Parent')
@section('content')
<!-- Menu Header -->
<div class="flex justify-between items-center sm:w-4/5 sm:mx-auto">
    <h1 class="text-2xl font-semibold tracking-widest">DAFTAR PESANAN</h1>
    <a class="bg-green-500 rounded-lg text-white p-2 font-bold tracking-wide hover:bg-green-700" href={{ route('home') }}>HOME</a>
</div>

<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Nama Pemesan
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Daftar Pesanan
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Status
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr class="bg-gray-100 border-b">
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @foreach($order['data'] as $d)
                  <p>{{ $d['name'] }} ({{ $d['quantity'] }})</p>
                @endforeach
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @if($order->isActive == 1)
                  <span class="text-red-500">Belum Selesai</span>
                @else
                  <span class="text-green-500">Selesai</span>
                @endif
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <div class="text-center flex items-center">
                    <form action="{{ route('updateStatus',$order->id) }}" method="post">
                        @method('patch')
                        @csrf
                        @if($order->isActive == 1)
                          <button class="rounded-full py-2 px-3 uppercase text-xs font-bold cursor-pointer tracking-wider text-green-800 bg-green-200">Selesai</button>
                        @else
                          <button class="rounded-full py-2 px-3 uppercase text-xs font-bold cursor-pointer tracking-wider text-red-800 bg-red-200">Belum Selesai</button>
                        @endif
                    </form>
                    <form action="{{ route('deleteOrder',$order->id) }}" method="post" class="ml-2.5">
                      @method('delete')
                      @csrf
                      <button class="bg-red-500 hover:bg-red-700 p-2.5 text-white remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection