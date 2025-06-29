    @extends('layouts.app')

    @section('title', 'Login')

    @section('content')

    <style>

        h2{
            text-align: center;
            margin-top: 25px    
        }

        form {
    max-width: 400px;
    margin: 5rem auto;
    padding: 2rem;
    border: 1px solid transparent;
    border-radius: 12px;
    background-color: transparent;
    box-shadow: 0 2px 8px #ccc;
}

form h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: black;
}

form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: black;
}

form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 0.6rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    box-sizing: border-box;
}

form button {
    width: 100%;
    padding: 0.8rem;
    background-color: #00b4d8;
    border: none;
    color: black;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #00b4d8;
    opacity: 85%;
}

div[style*="color: red"] {
    margin-bottom: 1rem;
    padding: 0.75rem;
    background-color: #ffe6e6;
    border: 1px solid #ff4d4d;
    border-radius: 8px;
    color: #cc0000;
}
    </style>
        <h2>Entrar no Sistema</h2>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.entrar') }}" method="POST">
            @csrf

            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div style="margin-top: 1rem;">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div style="margin-top: 1rem;">
                <button type="submit">Entrar</button>
            </div>
        </form>

        
    @endsection
