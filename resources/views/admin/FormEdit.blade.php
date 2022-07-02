@extends('Parent')
@section('content')
<div class="flex justify-between items-center sm:w-4/5 sm:mx-auto">
    <h1 class="text-2xl font-semibold tracking-widest">EDIT MENU</h1>
    <a class="bg-red-500 rounded-lg text-white p-2 font-bold tracking-wide hover:bg-red-700" href={{ route('home') }}>CANCEL</a>
</div>

<div class="w-full min-w-md mt-5">
  <form action="{{route('patchData',$product->id)}}" class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 lg:w-1/2 lg:m-auto" method="POST">
    @method('patch')
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-lg font-bold mb-2" for="name">Product Name</label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->first('name') ? 'border-red-500' : ''}}" type="text" name="name" placeholder="Product Name" value="{{ $errors->first('name') ? old('name') : $product->name }}" autocomplete="off">
      @if($errors->first('name'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
      @endif
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-lg font-bold mb-2" for="name">Product Price</label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->first('price') ? 'border-red-500' : ''}}" type="text" name="price" placeholder="Product Price" value="{{ $errors->first('price') ? old('price') : $product->price }}"  autocomplete="off">
      @if($errors->first('price'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('price') }}</p>
      @endif
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-lg font-bold mb-2" for="name">Product Category</label>
      <div class="relative">
          <select class="shadow appearance-none bg-white border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->first('category_id') ? 'border-red-500' : ''}}" name="category_id">
            <option class="italic" value="">-- PILIH --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} {{ $product->category_id == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
            @endforeach
          </select>  

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
      </div>
      @if($errors->first('category_id'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('category_id') }}</p>
      @endif
    </div>

    <div class="mt-4 text-center">
      <input type="submit" value="SAVE" class="bg-{{ env('APP_THEME') !== null ? env('APP_THEME') : 'blue'}}-700 hover:bg-{{ env('APP_THEME') !== null ? env('APP_THEME') : 'blue'}}-900 text-white font-bold py-2 w-full cursor-pointer rounded focus:outline-none focus:shadow-outline">
    </div>
  </form>


</div>
@endsection