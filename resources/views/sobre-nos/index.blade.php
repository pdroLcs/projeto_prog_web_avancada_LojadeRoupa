@extends('layouts.app')

@section('title', 'Sobre nós')

@section('header')
    <h2 class="h4 mb-0">
        {{ __('Sobre nós') }}
    </h2>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-8">

        {{-- Card principal "Sobre Nós" --}}
        <div class="card shadow-lg border-0 mb-5">
            
            {{-- Título Principal --}}
            <div class="card-header bg-dark text-white text-center py-4">
                <h1 class="mb-0 fw-bold">🛍️ Sobre Nós: A Essência do Seu Estilo</h1>
            </div>

            <div class="card-body p-4 p-md-5">

                {{-- Seção de Introdução (Slogan) --}}
                <section class="mb-5 text-center">
                    <p class="lead text-muted">
                        Bem-vindo(a) à nossa loja! Somos mais do que apenas um ponto de venda de roupas; somos um 
                        <strong>espaço dedicado a celebrar a sua individualidade e estilo pessoal</strong>. Acreditamos que a moda é uma das formas mais poderosas de expressão, e estamos aqui para garantir que você encontre as peças perfeitas para contar a sua história.
                    </p>
                    <hr class="my-4">
                </section>

                {{-- Seção Missão --}}
                <section class="mb-5">
                    <h2 class="h4 fw-bold text-dark mb-3">Nossa Missão</h2>
                    <p class="text-secondary">
                        Nossa missão é simples: <strong>oferecer roupas de alta qualidade, que combinam conforto, tendências atuais e durabilidade, a preços justos.</strong> Selecionamos cuidadosamente cada item do nosso catálogo, buscando fornecedores que compartilham o nosso compromisso com a excelência e a ética.
                    </p>
                </section>

                {{-- Seção O Que Você Encontra (Diferenciais) --}}
                <section class="mb-5">
                    <h2 class="h4 fw-bold text-dark mb-4">O Que Você Encontra Aqui</h2>
                    
                    <div class="row g-4">
                        {{-- Diferencial 1 --}}
                        <div class="col-md-6">
                            <div class="p-3 border rounded h-100">
                                <h3 class="h5 fw-bold text-primary">Curadoria Especializada</h3>
                                <p class="mb-0 text-secondary">Desde o básico essencial até as peças <em>statement</em> da estação, nossa coleção é pensada para atender a todos os momentos da sua vida, seja para o trabalho, o lazer ou ocasiões especiais.</p>
                            </div>
                        </div>
                        
                        {{-- Diferencial 2 --}}
                        <div class="col-md-6">
                            <div class="p-3 border rounded h-100">
                                <h3 class="h5 fw-bold text-primary">Foco no Cliente</h3>
                                <p class="mb-0 text-secondary">A sua satisfação é a nossa prioridade. Oferecemos um atendimento personalizado e consultoria de moda, ajudando você a montar <em>looks</em> que realçam a sua melhor versão.</p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Seção Por Que Nos Escolher (Lista de Motivos) --}}
                <section class="mb-4">
                    <h2 class="h4 fw-bold text-dark mb-4">Por Que Nos Escolher?</h2>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-heart-fill me-2 text-danger"></i> 
                            <strong>Paixão por Moda:</strong> Vivemos e respiramos moda, trazendo o que há de mais novo e inspirador.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill me-2 text-success"></i> 
                            <strong>Compromisso com a Qualidade:</strong> Investimos em tecidos e acabamentos que garantem caimento impecável e longevidade.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-star-fill me-2 text-warning"></i> 
                            <strong>Mais que Roupa, Estilo:</strong> Queremos inspirar você a se sentir confiante e poderosa(o) em cada peça que vestir.
                        </li>
                    </ul>
                </section>

            </div> {{-- Fim do card-body --}}

            {{-- Chamada Final no Rodapé do Card --}}
            <div class="card-footer bg-light text-center py-4">
                <p class="h5 mb-0 text-dark">
                    Venha nos visitar e descubra a próxima peça favorita do seu guarda-roupa. <strong>Seu estilo começa aqui!</strong>
                </p>
            </div>

        </div> {{-- Fim do card principal --}}

    </div>
</div>
@endsection