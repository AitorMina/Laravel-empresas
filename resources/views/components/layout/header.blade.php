<div class="h-15vh bg-header flex flex-row justify-between p-5" >
    <img src="{{asset("images/logo.png")}}" alt="logo">
    <h1 class="text-7xl text-white ">Gestión de Empresas</h1>
    <div class="justify-items-end">
        @auth
            {{auth()->user()->name}}
            <form action="logout" method="POST">
                @csrf
                <x-primary-button>Logout</x-primary-button>
            </form>
        @endauth
        @guest
                <form  action="login" method="POST" >
        @csrf
        <div>
        <x-text-input class="mx-3 p-2 bg-red-50 w-1/4" value="{{old('email')}}" type="email" name="email" placeholder="email"/>
        <x-text-input class="mx-3 p-2 bg-red-50 w-1/4" type="password" name="password" placeholder="password"/>
        </div>
        <div>
        <x-primary-button>Login</x-primary-button>
        <x-a href="{{route('register')}}">Registrarse</x-a>
        </div>
        </form>
        @endguest
    </div>
</div>
