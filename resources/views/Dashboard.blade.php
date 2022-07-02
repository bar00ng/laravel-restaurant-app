@extends('Parent')
@section('content')
        <!-- Menu Header -->
        <div class="flex justify-between items-center sm:w-4/5 sm:mx-auto">
            <h1 class="text-2xl font-semibold tracking-widest">MENU</h1>
            <a class="bg-green-500 rounded-lg text-white p-2 font-bold tracking-wide hover:bg-green-700" href={{ route('formTambah') }}>TAMBAH</a>
        </div>

        <!-- Display Menu -->
        @if($products->isEmpty())
        <div class="text-center w-full mt-5">
            <p class="italic">Tidak ada Produk</p>
        </div>


        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mt-5">
                @foreach($products as $product)
                    <div class="max-w-md rounded overflow-hidden shadow-lg border-2 border-gray-300 flex justify-between flex-col">
                        <div class="px-6 py-4">
                            <p class="text-gray-700 text-base">
                                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                                Rp. {{ number_format($product->price) }}
                            </p>
                        </div>

                        <div class="px-6 pt-4 pb-2 flex lg:items-center lg:justify-between mb-2 flex-col lg:flex-row">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2 lg:mb-0 text-center lg:text-left">
                                {{ $product->category->name }}
                            </span>

                            <div class="flex items-center justify-center">
                                <!-- Active jika Admin -->
                                <form action="{{ route('hapusData', $product->id) }}" method="POST" class="hidden">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" title="Hapus">
                                        <i class="fa-solid fa-trash text-red-600 hover:text-red-900 text-xl cursor-pointer mr-5"></i>
                                    </button>
                                </form>

                                <!-- Active jika admin -->
                                <a href="{{ route('formEdit', $product->id) }}" class="hidden">
                                    <i class="fa-solid fa-pen-to-square text-yellow-400 hover:text-yellow-900 text-xl cursor-pointer"></i>
                                </a>  
                                
                                <!-- Active jika user -->
                                <a href="{{ route('addToCart', $product->id) }}">
                                    <i class="fa-solid fa-cart-plus text-green-400 hover:text-green-900 text-xl cursor-pointer"></i>
                                </a> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
@endsection

