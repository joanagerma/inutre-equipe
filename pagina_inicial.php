<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main.css"> <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> <!-- Swiper JS -->
</head>
<body>

    <section class="header">
        <header>
            <nav class="navbar">
                <div class="logo">
                    <img src="img/logo-preta.png" alt="INUTRE">
                </div>
                <div class="nav-list">
                    <ul>
                        <li class="nav-item"><a href="pagina_inicial.php">Home</a></li>
                        <li class="nav-item"><a href="depoimentos.php">Depoimentos</a></li>
                        <li class="nav-item"><a href="sobre_nos.php">Sobre nós</a></li>
                        <li class="nav-item"><a href="planos.php">ProNutre</a></li>
                    </ul>
                </div>
                <div class="btn-nav">
                    <a href="login.php" role="button" class="btn">Fazer Login</a>
                </div>

                <div class="mobile-menu-icon">
                    <button onclick="menuShow()"><img src="img/open.svg"></button>
                </div>
            </nav>

            <!--Responsivo-->
            <div class="mobile-menu">
                <ul>
                        <li class="nav-item"><a href="#">Home</a></li>
                        <li class="nav-item"><a href="#">Depoimentos</a></li>
                        <li class="nav-item"><a href="#">Sobre nós</a></li>
                        <li class="nav-item"><a href="#">ProNutre</a></li>
                </ul>
            </div>

        </header>
    </section>

    <section class="hero">
        <div class="container-hero">
            <img src="img/hero-image.png">
            <div class="hero-text">
                <h2>A plataforma que te ajuda a se conciliar com a comida</h2>
                <p>Comer bem não é sobre se privar, mas sim sobre se cuidar com equilíbrio, prazer e consciência.</p>
                <a href="login.php" role="button" class="button">Saiba Mais</a>
            </div>
        </div>
    </section>

    <section class="servicos">
        <div class="container-service">
            <div class="service-w">
                <div class="service">
                    <div class="service-text autoShow">
                        <h3>SERVIÇOS</h3>
                        <h2>A cada dia sua alimentação fica melhor ainda</h2>
                        <p>Hoje, muito se fala em comer saudável e fazer dietas restritivas. Mas o aspecto emocional fica de fora? Com o iNutre não!</p>
                    </div>

                    <div class="cards cardShow">
                        <div class="card-service">
                            <i class="bi bi-book"></i>
                            <h2>Diário alimentar emocional</h2>
                            <p>Cadastre suas refeições diárias, nos conte suas emoções e descubra uma nova relação com a comida.</p>
                        </div>

                        <div class="card-service">
                            <i class="bi bi-card-text"></i>
                            <h2>Blog embasado</h2>
                            <p>Conteúdos informacionais sobre o campo da nutrição e psicologia embasados por profissionais da área.</p>
                        </div>

                        <div class="card-service">
                            <i class="bi bi-fork-knife"></i>
                            <h2>Recomendação de receitas</h2>
                            <p>Nossa IA recomenda novas receitas analisando características semelhantes como aroma, textura e sabor.</p>
                        </div>

                        <div class="card-service">
                            <i class="bi bi-people-fill"></i>
                            <h2>Comunidade ativa</h2>
                            <p>Conheça novas pessoas, interaja com profissionais e compartilhe experiências.</p>
                        </div>

                        <div class="card-service">
                            <i class="bi bi-clipboard-heart-fill"></i>
                            <h2>Acompanhamento profissional</h2>
                            <p>Consultas semanalmente com profissionais da área comportamental para um apoio mais direcionado.</p>
                        </div>

                        <div class="card-service">
                            <i class="bi bi-file-bar-graph-fill"></i>
                            <h2>Relatórios de desempenho</h2>
                            <p>Nossa IA analisa todos os valores nutricionais das refeições cadastradas e recomenda novas receitas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="acessar">
        <div class="container-acesso block">
            <h2>Você pode acessar <br> quando quiser, onde quiser</h2>
            <p>Contamos com uma plataforma responsiva, que se extende em várias dimenções de telas diferentes.</p>

            <div class="dispositivos-acesso">
                <div class="item-acesso">
                    <i class="bi bi-laptop"></i>
                    <span>Computador</span>
                </div>
                <div class="item-acesso">
                    <i class="bi bi-tablet-landscape"></i>
                    <span>Tablet</span>
                </div>
                <div class="item-acesso ">
                    <i class="bi bi-phone"></i>
                    <span>Celular</span>
                </div>
            </div>

        </div>
    </section>

    <section class="diferencial">
        <div class="container-diferencial">
            <div class="content-diferencial autoShow">
                <h3>DIFERENCIAL</h3>
                <h2>Mas o que torna o iNutre diferente dos outros?</h2>
                <p>Com base nas refeições cadastradas em seu diário alimentar, nossa IA te recomenda receitas com características semelhantes à aquelas que você mais gostou, levando em conta</p>

                <div class="grid">
                    <div class="item">
                        <div class="img">
                            <img src="img/textura.jpeg">
                        </div>
                        <h3>Textura</h3>
                    </div>

                    <div class="item">
                        <div class="img">
                            <img src="img/aroma.jpeg">
                        </div>
                        <h3>Aroma</h3>
                    </div>

                    <div class="item">
                        <div class="img">
                            <img src="img/sabor.jpeg">
                        </div>
                        <h3>Sabor</h3>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="planos">
        <div class="content-planos autoShow">
            <h3>PLANOS</h3>
            <h2>Dê uma olhada no que os nossos planos podem oferecer</h2>
            <p>O básico já é seu. Se quiser ter acesso completo e ilimitado, torne-se um ProNutre!</p>
        </div>

        <div class="wrapper">
            <div class="card-p cardShow">
                <h3>Básico</h3>
                <h2>R$00,00<span>/mês</span></h2>
                <p>Você tem acesso aos nossos principais serviços.</p>

                <ul>
                    <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                    <li><i class="bi bi-check-lg"></i> Blog Embasado</li>
                    <li><i class="bi bi-check-lg"></i> Recomendação de Receitas</li>
                </ul>
                <a href="login.php" class="btn-b">Começe Agora<i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="card-p cardShow">
                <h3>ProNutre</h3>
                <h2>R$120,00<span>/mês</span></h2>
                <p>Se com o básico já é bom, com o ProNutre é excepcional!</p>

                <ul>
                    <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                    <li><i class="bi bi-check-lg"></i> Blog Embasado</li>
                    <li><i class="bi bi-check-lg"></i> Recomendação de Receitas</li>
                    <li><i class="bi bi-check-lg"></i> Relatórios de Desempenho</li>
                    <li><i class="bi bi-check-lg"></i> Acompanhamento Profissional</li>
                    <li><i class="bi bi-check-lg"></i> Comunidade Ativa</li>
                </ul>
                <a href="planos.php" class="btn-p">Saiba Mais</a>
            </div>

            <div class="card-p cardShow">
                <h3>ProNutre<span> - para profissionais</span></h3>
                <h2>R$200,00<span>/mês</span></h2>
                <p>Para os profissionais também temos um espaço especial.</p>

                <ul>
                    <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                    <li><i class="bi bi-check-lg"></i> Postagens Autorais no Blog</li>
                    <li><i class="bi bi-check-lg"></i> Postagens, Comentários e Recomendações de Receitas</li>
                    <li><i class="bi bi-check-lg"></i> Comunidade Ativa</li>
                    <li><i class="bi bi-check-lg"></i> Relatórios de Desempenho</li>
                    <li><i class="bi bi-check-lg"></i> Comunicação Direta com os Pacientes</li>
                </ul>
                <a href="planos.php" class="btn-p">Saiba Mais</a>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="titulo-feed autoShow">
            <h3>AVALIAÇÕES</h3>
            <h2>O que os clientes dizem</h2>
            <p>Quer saber o que torna o iNutre tão especial? Confira o que nossos clientes tem a dizer!</p>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper cardShow">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="nota">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="descricao">
                        "Sempre achei que comer saudável era sinônimo de cortar tudo que eu gosto. Com o iNutre, aprendi a equilibrar minha alimentação sem culpa. O diário me ajudou a entender como minhas emoções influenciam minhas escolhas. Me sinto mais leve."
                    </blockquote>

                    <div class="autor">
                        <div class="autor-avatar">
                            <img src="img/MarianaMaria.jpg" alt="Imagem do Cliente">
                        </div>

                        <div class="autor-info">
                            <h3>Mariana Maria</h3>
                            <p>Cliente</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="nota">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="descricao">
                        "O que mais me surpreendeu foi o quanto a plataforma respeita nossos gostos e rotina. As receitas são práticas e adaptadas ao que eu realmente gosto de comer. Me sinto acolhido e motivado a manter hábitos mais saudáveis sem pressão."
                    </blockquote>

                    <div class="autor">
                        <div class="autor-avatar">
                            <img src="img/LucasCassio.jpg" alt="Imagem do Cliente">
                        </div>

                        <div class="autor-info">
                            <h3>Lucas Cassio</h3>
                            <p>Cliente</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="nota">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="descricao">
                        "Conheci o iNutre por meio de uma cliente minha. No começo não achei que fosse fazer grande diferença em meu trabalho, mas como eu estava enganada! O iNutre me ajudou muito com minhas consultas e a entender melhor o cuidado que meus pacientes precisavam."
                    </blockquote>

                    <div class="autor">
                        <div class="autor-avatar">
                            <img src="img/FernandaCastro.jpg" alt="Imagem do Cliente">
                        </div>

                        <div class="autor-info">
                            <h3>Dra. Fernanda Castro</h3>
                            <p>Nutricionista Comportamental</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="nota">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="descricao">
                        "A comunidade do iNutre é incrível! Compartilhar minhas experiências com outras pessoas me ajudou a perceber que não estou sozinha nessa jornada. Além de que as consultas com os nutricionistas e os psicólogos foram transformadoras para mim."
                    </blockquote>

                    <div class="autor">
                        <div class="autor-avatar">
                            <img src="img/MairaClara.jpg" alt="Imagem do Cliente">
                        </div>

                        <div class="autor-info">
                            <h3>Maira Clara</h3>
                            <p>Cliente ProNutre</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="nota">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="descricao">
                        "A abordagem do iNutre é moderna, baseada em evidências e, acima de tudo, empática. O suporte à comunidade e os recursos disponíveis oferecem um cuidado contínuo que vai além da consulta tradicional. É um avanço importante na promoção da saúde."
                    </blockquote>

                    <div class="autor">
                        <div class="autor-avatar">
                            <img src="img/TiagoLopes.jpg" alt="Imagem do Cliente">
                        </div>

                        <div class="autor-info">
                            <h3>Dr. Tiago Lopes</h3>
                            <p>Psicólogo Comportamental</p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="final">
        <div class="container-final block">
            <h2>Mais do que uma plataforma, <br> um novo jeito de se cuidar.</h2>
            <p>Com leveza, consciência e equilíbrio. Sua jornada para uma alimentação equilibrada começa aqui, venha com o iNutre.</p>

            <a href="login.php" role="button" class="button-final">Começe agora</a>
        </div>
    </section>

    <footer class="footer"> <!--NOVO-->
        <div id="footer-content">
            <div id="footer-contacts">
                <h2>Te proporcionando concientização, prevenção e cuidado à saúde.</h2>

                <div class="social-media">
                    <a href="#" class="footer-link"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-link"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="footer-link"><i class="bi bi-envelope-at"></i></a>
                </div>
            </div>

            <ul class="footer-list">
                <li><h3>Links</h3></li>
                <li><a href="pagina_inicial.php" class=footer-link>Home</a></li>
                <li><a href="sobre_nos.php" class=footer-link>Sobre Nós</a></li>
                <li><a href="planos.php" class=footer-link>Planos</a></li>
                <li><a href="depoimentos.php" class=footer-link>Depoimentos</a></li>
            </ul>

            <ul class="footer-list">
                <li><h3>Informações</h3></li>
                <li><a href="#" class=footer-link>Copyright</a></li>
                <li><a href="#" class=footer-link>Política de Privacidade</a></li>
                <li><a href="#" class=footer-link>Termos de Uso</a></li>
            </ul>

            <ul class="footer-list">
                <li><h3>Contato</h3></li>
                <li><a href="#" class="footer-link">Email@gmail.com</a></li>
                <li><a href="#" class="footer-link">@Instagram124</a></li>
                <li><a href="#" class="footer-link">Linkedi55n</a></li>
            </ul>

        </div>

        <div id="footer-copy">
            Copyright
            &#169
            2025 iNutre, Inc. All Rights Reserved.
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- Swiper JS -->
    <script src="js/main.js"></script> <!-- JS -->

</body>
</html>