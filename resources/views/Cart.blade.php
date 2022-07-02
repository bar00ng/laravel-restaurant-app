@extends('Parent')
@section('content')
        <!-- Menu Header -->
        <div class="flex justify-between items-center sm:w-4/5 sm:mx-auto">
            <h1 class="text-2xl font-semibold tracking-widest">KERANJANG</h1>
            <a class="bg-yellow-500 rounded-lg text-white p-2 font-bold tracking-wide hover:bg-yellow-700" href={{ route('home') }}>KEMBALI BELANJA</a>
        </div>

        <form action="{{ route('storeCart') }}" method="post">
            @csrf
            <div class="w-full min-w-md mt-5 overflow-x-auto py-5">
                <table class="shadow-lg text-md text-left rounded-lg px-8 pt-6 pb-8 mb-4 lg:w-1/2 lg:m-auto">
                    <thead class="text-sm uppercase">
                        <tr>
                            <td colspan="5" class="text-left px-6 py-3">
                                <span class="text-lg">Nama Pemesan : </span>
                                <input type="text" name="customer_name" placeholder="Atas Nama" class="p-2 border border-black" autocomplete="off">
                            </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="px-6 py-3">Product</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3 w-2/4">Quantity</th>
                            <th class="px-6 py-3">Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}" class="border-b even:bg-gray-200 odd:bg-white">
                                    <td data-th="Price" class="px-5 py-4 font-medium whitespace-nowrap">{{ $details['name'] }}</td>
                                    <td data-th="Price">Rp. {{ number_format($details['price']) }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}" class="quantity update-cart w-1/2 md:w-1/4 border border-black pl-2" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['price'] * $details['quantity']) }}</td>
                                    <td class="actions" data-th="">
                                        <button class="bg-red-500 hover:bg-red-700 p-2.5 text-white remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right text-lg"><h3><strong>Total Rp{{ number_format($total) }}</strong></h3></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href=""></a>
                                <button class="bg-green-500 p-2 text-white rounded-lg m-2 hover:bg-green-700">CHECKOUT</button>
                                </td>
                            </tr>
                        </tfoot>
                 </table>
            </div>
        </form>
    @endsection

@section('scripts')
<script type="text/javascript">
$(".update-cart").change(function (e) {
    e.preventDefault();

    var ele = $(this);

    $.ajax({
        url: '{{ route('update.cart') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}', 
            id: ele.parents("tr").attr("data-id"), 
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function (response) {
            window.location.reload();
        }
    });
});

$(".remove-from-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);

    if(confirm("Yakin ingin menghapus item?")) {
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});
</script>
@endsection
