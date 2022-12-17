<x-header></x-header>
<x-navbar></x-navbar>

<div class="flex w-full flex-col h-full items-center justify-center">
            <form action="{{ route('products.update', $product->id) }}" method="POST"
            class="flex items-center flex-col p-4 w-[400px] min-w-[280px] ">
                @csrf
                @method('PUT')

                <h2 class="text-2xl font-semibold text-blue-500 text-center">Update your product</h2>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex flex-col w-full mt-6">
                    <label for="name" class="font-semibold">Product Name</label>
                    <input type="text" value="{{$product->p_name }}"
                     placeholder="enter product name" name="p_name" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 text-lg focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product quantity</label>
                    <input  value="{{$product->p_qoh }}"type="text" placeholder="enter product quantity" name="p_qoh" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 text-lg focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product price</label>
                    <input type="text" placeholder="enter product price per 1 item"  value="{{ $product->price }}" name="price" id="password" class="w-full border-[2px]
                     rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 text-lg focus:border-blue-400">
                </div>
                <div class="flex  w-full mt-6 justify-between items-center">
                    <label for="text" class="font-semibold">Product Type</label>
                    <select class="ml-3 w-1/2 bg-blue-400 outline-none p-2 text-white"
                       name="p_type" id="">
                        <option value="{{$product->p_type }}">{{$product->p_type }}</option>
                        <option value="food">Food</option>
                        <option value="drink">Drink</option>
                        <option value="equipment">Equipment</option>
                        <option value="electronic device">Electronic devices</option>
                        <option value="clothes">Clothes</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <input name="p_submit" class="bg-blue-500 px-4 py-2 mx-auto w-full 
             cursor-pointer text-white rounded-lg mt-6" type="submit" value="Update Product">
            </form>
        </div>
    </div>
