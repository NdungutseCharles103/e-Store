<x-header></x-header>
<div class="w-full flex flex-col h-screen items-center justify-center">

    <form action="{{ route('users.store') }}" method="POST" class="flex shadow-xl border-[1px] items-center flex-col p-4 w-[700px] min-w-[280px] ">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <!-- <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul> -->
        </div>
        @endif
        @csrf
        <h2 class="text-2xl font-semibold text-blue-500 text-center">Signup and get started with e-Store</h2>

        <div class="flex flex-wrap text-red-400"></div>
        <div class="flex flex-col w-full mt-4">
            <label for="name" class="font-semibold">Name</label>
            <input placeholder="enter your names" type="text" name="u_name" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
        </div>
        <div class="flex flex-col w-full mt-4">
            <label for="name" class="font-semibold">Email</label>
            <input type="email" placeholder="enter your email" name="u_email" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
        </div>
        <div class="flex flex-col w-full mt-4">
            <label for="address" class="font-semibold">Address</label>
            <input type="text" placeholder="enter your address" name="u_address" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
        </div>
        <div class="flex flex-col w-full mt-4">
            <label for="name" class="font-semibold">Phone</label>
            <input type="tel" placeholder="enter your mobile phone number" name="u_phone" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
        </div>
        <div class="flex flex-col w-full mt-4">
            <label for="password" class="font-semibold">Password</label>
            <input type="password" placeholder="enter your password" name="u_password" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
        </div>

        <input name="u_submit" class="bg-blue-500 px-4 py-2 mx-auto w-full 
             cursor-pointer text-white rounded-lg mt-4" type="submit" value="Signup">
        <div class="flex w-full mt-4 items-center">
            <p class="mb-0">Already have an account?</p>
            <a class="ml-3 text-blue-600" href="/users/login">Login</a>
        </div>
    </form>
</div>