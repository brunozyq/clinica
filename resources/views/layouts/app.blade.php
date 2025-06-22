<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Clínica Cisne')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Adicione seu CSS aqui -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #0a0a0a;
            --accent-color: #00b4d8;
            --text-color: #e1e1e6;
            --highlight-color: #00b4d8;
            --gradient-primary: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
            --gradient-secondary: linear-gradient(135deg, #0a0a0a 0%, #000000 100%);
        }
        
        body {
            background-color: var(--primary-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            transition: background-color 0.3s ease;

        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--highlight-color);
            text-shadow: 0 0 5px rgba(0, 180, 216, 0.5);
        }
        
        .btn-custom {
            background-color: var(--accent-color);
            color: var(--text-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        .btn-custom:hover {
            background-color: #0096c7;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        
        .btn-custom i {
            margin-right: 8px;
        }
        
        header {
            background: var(--gradient-primary);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-color);
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 10px;
            color: var(--highlight-color);
            font-size: 1.8rem;
        }
        
        nav ul {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

        nav ul li {
        margin-left: 20px;
        display: flex;
        align-items: center;
    }

        nav ul li a {
        display: inline-block;
        color: var(--text-color);
        font-weight: 500;
        padding: 8px 12px;
        text-decoration: none;
        position: relative;
        transition: color 0.3s ease;
    }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--highlight-color);
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        main {
            min-height: calc(100vh - 180px);
            padding: 2rem 0;
        }
        
        .notification {
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            animation: fadeIn 0.5s ease;
            display: flex;
            align-items: center;
            background-color: rgba(10, 10, 10, 0.5);
            border-left: 4px solid;
        }
        
        .notification i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .notification.success {
            border-left-color: #28a745;
        }
        
        .notification.success i {
            color: #28a745;
        }
        
        .notification.error {
            border-left-color: #dc3545;
        }
        
        .notification.error i {
            color: #dc3545;
        }
        
        footer {
            background: var(--gradient-secondary);
            padding: 1.5rem 0;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .footer-logo i {
            margin-right: 10px;
            color: var(--highlight-color);
            font-size: 1.8rem;
        }
        
        .footer-logo span {
            font-size: 1.2rem;
            font-weight: 700;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-links a {
            color: var(--text-color);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            color: var(--highlight-color);
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
            }
            
            .footer-logo, .social-links {
                margin-bottom: 15px;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .welcome-container {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            animation: slideIn 1s ease;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(10, 10, 10, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--highlight-color);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .fade-in {
            animation: fadeIn 1s ease;
        }
        
        .feature-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .feature-card {
            background-color: rgba(10, 10, 10, 0.5);
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .feature-card i {
            font-size: 2rem;
            color: var(--highlight-color);
            margin-bottom: 15px;
        }
        
        .feature-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        
        /* Novas seções */
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 40px 0;
        }
        
        .hero-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .hero-text {
            flex: 1;
            padding: 20px;
        }
        
        .hero-image {
            flex: 1;
            text-align: right;
        }
        
        .hero-image img {
            max-width: 80%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }
        
        .hero-image img:hover {
            transform: scale(1.02);
        }
        
        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
            }
            
            .hero-image {
                text-align: center;
                margin-top: 20px;
            }
            
            .hero-image img {
                width: 80%;
            }
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--highlight-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .contact-section {
            background-color: rgba(10, 10, 10, 0.3);
            padding: 40px;
            border-radius: 10px;
            margin: 40px 0;
        }
        
        .contact-section h2 {
            color: var(--highlight-color);
            margin-bottom: 20px;
        }
        
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .contact-item i {
            margin-right: 10px;
            color: var(--highlight-color);
        }
        
        .btn-primary {
            background-color: var(--highlight-color);
            color: var(--text-color);
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary:hover {
            background-color: #0096c7;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .btn-cancelar{
            background-color: red;
            opacity: 90%;
            color: var(--text-color);
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
         .btn-cancelar:hover{
            opacity: 70%;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
         }   
        
         .table-container {
            width: 80%; /* Largura da tabela */
            margin: 20px auto; /* Centraliza a tabela */
            border-radius: 8px; /* Cantos arredondados */
            overflow: hidden; /* Para bordas arredondadas */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Sombra da tabela */
            background-color: transparent; /* Fundo da tabela */
            }
            table {
                width: 100%; /* Ocupa toda a largura */
                border-collapse: collapse; /* Remove espaçamentos entre as células */
            }
            th, td {
                padding: 12px; /* Espaçamento interno */
                text-align: left; /* Alinhamento à esquerda */
            }
            th {
                background-color: #00b4d8; /* Cabeçalho azul */
                color: white; /* Texto branco no cabeçalho */
            }
            tr:hover {
                background-color: #3a3a3a; /* Realce na linha ao passar o mouse */
            }

            .tit-cad{
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
                color: var(--highlight-color);
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            }

            /* Containers dos inputs */
            .input-cad {
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
            }

            /* Labels */
            .form-label {
                margin-bottom: 8px;
                color: #00b4d8;
                font-weight: 600;
            }

            /* Campos de texto e senha */
            .form-control {
                padding: 10px 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            /* Selects */
            .form-select {
                padding: 10px 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            /* Efeito ao focar nos inputs e selects */
            .form-control:focus,
            .form-select:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
            }

            /* Multiselect */
            .form-select[multiple] {
                min-height: 120px;
                height: auto;
            }

            /* Botão */
            .btn-cad {
                background-color: #00b4d8;
                color: #fff;
                border: none;
                padding: 12px 20px;
                border-radius: 8px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s ease;
                width: 100%;
            }

            /* Hover no botão */
            .btn-cad:hover {
                background-color: #00b4d8;
                opacity: 80%;
            }

            /* Layout dos cards */
            .row {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
            }

            /* Cada coluna */
            .col-md-4 {
                flex: 1 1 300px;
                max-width: 350px;
            }

            /* Card */
            .card {
                background-color: transparent;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            /* Efeito hover no card */
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            /* Conteúdo interno */
            .card-body {
                padding: 20px;
            }

            /* Título */
            .card-title {
                font-size: 20px;
                color: #00b4d8;
                margin-bottom: 10px;
                font-weight: 700;
            }

            /* Texto */
            .card-text {
                color: white;
                margin-bottom: 15px;
                font-size: 15px;
                line-height: 1.4;
            }

            /* Botão */
            .btn {
                display: inline-block;
                text-decoration: none;
                background-color: #00b4d8;
                color: #fff;
                padding: 10px 18px;
                border-radius: 8px;
                font-size: 15px;
                transition: background-color 0.3s ease;
                text-align: center;
            }

            /* Hover botão */
            .btn:hover {
                background-color: #00b4d8;
                opacity: 80%;
                color: white
            }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-container">
                <div class="logo">
                    <i class="fas fa-feather-alt"></i>
                    Clínica Cisne
                </div>
                <nav>
                    <ul>
                        @auth
                        @if(auth()->user()->tipo === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.usuarios.index') }}">Usuários</a></li>
                            <li><a href="{{ route('admin.especialidades.index') }}">Especialidades</a></li>
                            <li><a href="{{ route('admin.consultas.index') }}">Consultas</a></li>
                        @elseif(auth()->user()->tipo === 'medico')
                            <li><a href="{{ route('medico.consultas.index') }}">Minhas Consultas</a></li>
                        @elseif(auth()->user()->tipo === 'cliente')
                            <li><a href="{{ route('cliente.consultas.index') }}">Minhas Consultas</a></li>
                            <li><a href="{{ route('cliente.medicos.index') }}">Médicos</a></li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn-custom">Sair</button>
                            </form>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}" class="btn-custom">Entrar</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            @if(session('success'))
                <div class="notification success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="notification error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>
    <footer style="margin-top: 2rem;">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-feather-alt"></i>
                    <span><a href="{{ route('home') }}" style="color: var(--highlight-color); text-decoration: none;">Clínica Cisne</a></span>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
                <p>&copy; {{ date('Y') }} Clínica Cisne. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>