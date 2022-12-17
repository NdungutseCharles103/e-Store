<x-header></x-header>
<x-navbar></x-navbar>
<div class="flex w-full flex-col h-full items-center justify-center">
            <form action="{{ route('products.store') }}" class="flex items-center flex-col p-4 w-[400px] min-w-[280px] " method="POST">
                <h2 class="text-2xl font-semibold text-blue-500 text-center">Enter your new product in store</h2>
                @if ($errors->any())
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
                    <input type="text" placeholder="enter product name" name="p_name" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none text-lg border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product quantity</label>
                    <input type="text" placeholder="enter product quantity" name="p_qoh" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none text-lg border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product price</label>
                    <input type="text" placeholder="enter product price per 1 item" name="price" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none text-lg border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex  w-full mt-6 justify-between items-center">
                    <label for="text" class="font-semibold">Product Type</label>
                    <select class="ml-3 w-1/2 bg-blue-400 outline-none p-2 text-white" name="p_type" id="">
                        <option value="">Select type</option>
                        <option value="food">Food</option>
                        <option value="drink">Drink</option>
                        <option value="equipment">Equipment</option>
                        <option value="electronic device">Electronic devices</option>
                        <option value="clothes">Clothes</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <input name="submit" class="bg-blue-500 px-4 py-2 mx-auto w-full 
             cursor-pointer text-white rounded-lg mt-6" type="submit" value="Add Product">
            </form>
        </div>
    </div>
