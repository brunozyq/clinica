@extends('layouts.app')

@section('title', 'Bem-vindo à Clínica Cisne')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-text fade-in">
            <h1>Bem-vindo à Clínica Cisne</h1>
            <p class="lead">Sua saúde com a elegância e precisão de um cisne. Cuidados médicos de alta qualidade para sua família.</p>
            <p class="mt-4">Na Clínica Cisne, combinamos a tecnologia mais avançada com a atenção humana para oferecer o melhor atendimento médico.</p>
            @guest
                <a href="{{ route('login') }}" class="btn-custom mt-3"><i class="fas fa-sign-in-alt"></i> Entrar no Sistema</a>
            @else
            @endguest
        </div>
        <div class="hero-image fade-in">
            <img src="https://sdmntpreastus.oaiusercontent.com/files/00000000-3158-61f9-9f53-058a152bc783/raw?se=2025-05-19T05%3A28%3A52Z&sp=r&sv=2024-08-04&sr=b&scid=00000000-0000-0000-0000-000000000000&skoid=04233560-0ad7-493e-8bf0-1347c317d021&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-05-18T23%3A31%3A30Z&ske=2025-05-19T23%3A31%3A30Z&sks=b&skv=2024-08-04&sig=79pm%2BPkAJQFuTTX8Hiq8XtHw8KFtGZmbru7VhhrvEIU%3D" alt="Doutora na Clínica Cisne" />
        </div>
    </div>
</div>

<div class="container">
    <div class="section-title fade-in">
        <h2>Por que escolher a Clínica Cisne</h2>
    </div>
    
    <div class="feature-cards">
        <div class="feature-card fade-in">
            <i class="fas fa-stethoscope"></i>
            <h3>Consultas Médicas</h3>
            <p>Atendimento personalizado com médicos especialistas em diversas áreas.</p>
        </div>
        <div class="feature-card fade-in">
            <i class="fas fa-procedures"></i>
            <h3>Internação</h3>
            <p>Internamentos em ambiente seguro e confortável, com monitoramento 24h.</p>
        </div>
        <div class="feature-card fade-in">
            <i class="fas fa-user-md"></i>
            <h3>Especialidades</h3>
            <p>Uma equipe de profissionais altamente qualificados para cuidar de você.</p>
        </div>
    </div>
    
    <div class="contact-section fade-in">
        <h2>Entre em Contato</h2>
        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Rua Exemplo, 123 - Bairro - Cidade, Estado</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>(11) 1234-5678</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>contato@clinica-cisne.com.br</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
               <span>Segunda a Sexta: 8h às 20h</span>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn-primary"><i class="fas fa-calendar-plus"></i> Agendar Consulta</a>
        </div>
    </div>
</div>
@endsection