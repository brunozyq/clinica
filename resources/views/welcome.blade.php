@extends('layouts.app')

@section('title', 'Bem-vindo à Agende Bem')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-text fade-in">
            <h1>Bem-vindo à Agende Bem</h1>
            <p class="lead">Sua saúde com a elegância e precisão de um cisne. Cuidados médicos de alta qualidade para sua família.</p>
            <p class="mt-4">Na Agende Bem, combinamos a tecnologia mais avançada com a atenção humana para oferecer o melhor atendimento médico.</p>
            @guest
                <a href="{{ route('login') }}" class="btn-custom mt-3"><i class="fas fa-sign-in-alt"></i> Entrar no Sistema</a>
            @else
            @endguest
        </div>
        <div class="hero-image fade-in">
            <img src="{{ asset('images/medica.png') }}" alt="Doutora na Agende Bem" />
        </div>
    </div>
</div>

<div class="container">
    <div class="section-title fade-in">
        <h2>Por que escolher a Agende Bem</h2>
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
                <span>contato@agendebem.com.br</span>
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