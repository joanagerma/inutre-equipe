<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos - iNutre</title>

    <link rel="stylesheet" href="css/main.css"> <!-- CSS -->
    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
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
                <div class="btn-nav">
                    <a href="#" role="button" class="btn">Login</a>
                </div>
            </div>

        </header>
    </section>

    <section class="planos">
        <div class="content-planos">
            <h3>PLANOS</h3>
            <h2>Vamos escolher um plano para você começar com o iNutre</h2>
            <p>Escolha aquele que mais se aplica a suas expectativas</p>
        </div>

        <div class="wrapper active">
            <form method="get" action="cadastro.php">
                <div class="card-p">
                    <h3>Básico</h3>
                    <h2>R$00,00<span>/mês</span></h2>
                    <p>Você tem acesso aos nossos principais serviços.</p>

                    <ul>
                        <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                        <li><i class="bi bi-check-lg"></i> Blog Embasado</li>
                        <li><i class="bi bi-check-lg"></i> Recomendação de Receitas</li>
                    </ul>

                    <input type="hidden" name="plano" value="1">
                    <button type="submit" class="btn-b">Começe Agora<i class="bi bi-arrow-right"></i></button>
                </div>
            </form>

            <form method="get" action="cadastro.php">
                <div class="card-p active">
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

                    <input type="hidden" name="plano" value="2">
                    <button type="submit" class="btn-p">Assinar</button>
                </div>
            </form>

            <form method="get" action="cadastro.php">
                <div class="card-p">
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

                    <input type="hidden" name="plano" value="3">
                    <button type="submit" class="btn-p">Assinar</button>
                </div>
            </form>

            <?php if (isset($_SESSION['id'])): ?>
                    <form action="cancelar_plano.php" method="post">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja cancelar seu plano?');">
                            Cancelar plano atual
                        </button>
                    </form>

                    <form action="atualizar_plano.php" method="post">
                        <button type="submit">ATUALIZAR PLANO ATUAL</button>
                    </form>
                <?php endif; ?>

        </div>
    </section>

    <section class="feedback">
        <div class="titulo-feed autoShow">
            <h3>FEEDBACKS</h3>
            <h2>Veja o que os nossos assinantes tenham falado do iNutre</h2>
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
                    "Finalmente encontrei uma plataforma que respeita meu ritmo e meu jeito de comer. Me sinto acolhida!"
                </blockquote>

                <div class="autor">
                    <div class="autor-avatar">
                        <img src="img/celia.jpg" alt="Imagem do Cliente">
                    </div>

                    <div class="autor-info">
                        <h3>Célia S.</h3>
                        <p>Assinante ProNutre</p>
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
                    "O ProNutre otimizou meu atendimento. Agora consigo acompanhar meus pacientes com muito mais precisão e empatia."
                </blockquote>

                <div class="autor">
                    <div class="autor-avatar">
                        <img src="img/marcelo.jpg" alt="Imagem do Cliente">
                    </div>

                    <div class="autor-info">
                        <h3>Dr. Marcelo R.</h3>
                        <p>Nutricionista</p>
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
                    "Com as recomendações personalizadas e o apoio dos profissionais, estou cuidando da minha saúde sem neura."
                </blockquote>

                <div class="autor">
                    <div class="autor-avatar">
                        <img src="img/alessandro.jpg" alt="Imagem do Cliente">
                    </div>

                    <div class="autor-info">
                        <h3>Alessandro F.</h3>
                        <p>Assinante ProNutre</p>
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
                    "É uma ferramenta poderosa para integrar saúde mental e alimentação. Uso no consultório e recomendo!"
                </blockquote>

                <div class="autor">
                    <div class="autor-avatar">
                        <img src="img/helenna.jpg" alt="Imagem do Cliente">
                    </div>

                    <div class="autor-info">
                        <h3>Dra. Helenna F.</h3>
                        <p>Psicóloga</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
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