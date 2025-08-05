-- planos
CREATE TABLE planos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    plano VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2)
);
INSERT INTO planos (plano, preco) VALUES
('basico', NULL),
('premium', 129.90),
('profissional', 119.90),
('administrador', NULL);

-- cadastro usuarios
CREATE TABLE cadastro_usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(100) NOT NULL,
    nickname VARCHAR(255) UNIQUE NOT NULL,
    data_nasc DATE NOT NULL,
    genero ENUM('Masculino', 'Feminino', 'Outro') NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(320) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    plano INT,
    premium_expires DATE, 
    foto VARCHAR(255),
    cep VARCHAR(10),
    pergunta_seguranca VARCHAR(255) NOT NULL,
    resposta_seguranca VARCHAR(255) NOT NULL,
    FOREIGN KEY (plano) REFERENCES planos(id)
);
INSERT INTO cadastro_usuarios (nome_usuario, nickname, data_nasc, genero, telefone, email, senha, plano, premium_expires, foto, cep, pergunta_seguranca, resposta_seguranca) 
VALUES
('Laís de Carvalho Novo', 'laiscnv', '2007-07-09', 'Feminino', '(19)992619625', 'lais.novo@eaportal.org', 'lais09072007', 4, NULL, 'uploads/8764563748.jpg', '13184-140', 'Qual o nome do seu primeiro animal de estimação?', 'Bony'),
('Fabiana Gonçalves Almeida', 'fabi.almeida44', '1987-12-02', 'Feminino', '(19)987789677', 'fabi.almeida44@eaportal.org', 'fabiana02121987', 3, '2025-06-30', 'uploads/8764563748.jpg', '12946-851', 'Qual sua cidade natal?', 'Natal'),
('Tatiana Munhoz Fernandes', 'tatifernandes.nutri', '1999-08-30', 'Feminino', '(41)982233699', 'tatifernandes.nutri@eaportal.org', 'tatiana30081999', 3, '2025-05-31', 'uploads/8764563748.jpg', '17240-009', 'Qual o nome do seu primeiro animal de estimação?', 'Dunga'),
('Bárbara Cordeiro Ferreira', 'babi_ferreira', '2004-07-12', 'Feminino', '(41)991238997', 'barbara_cferreira@eaportal.org', 'barbara12072004', 2, '2025-06-04', 'uploads/8764563748.jpg', '80010-050', 'Qual sua cidade natal?', 'Niterói'),
('Rafael Gomes Castro', 'rgcastro', '1994-01-17', 'Masculino', '(27)996664444', 'rafael.cast@email.com', 'rafael17011994', 4, NULL, 'rafael_admin.jpg', '29010-080', 'Qual sua cidade natal?', 'Montes Claros'),
('Lucas Alves Dias', 'lucasdias_', '2000-07-12', 'Masculino', '(41)99880-4455', 'lucas.adias@email.com', 'lucas12072000', 1, NULL, 'uploads/38648590.png', '80010-000', 'Qual o nome da sua escola primária?', 'UNASP'),
('Bruno Henrique Lopes', 'brunoh22', '1997-11-30', 'Masculino', '(51)99123-9876', 'brunoh@email.com', 'bruno30111997', 2, '2025-06-03', 'uploads/38648590.png', '90420-030', 'Qual o nome do seu primeiro animal de estimação?', 'Rex'),
('Renata Dias Souza', 'renasouza_', '1995-04-18', 'Feminino', '(71)99888-1122', 'renata.dias@email.com', 'renata18041995', 2, '2025-06-30', 'uploads/83645875.jpg', '40301-110', 'Qual o nome da sua mãe solteira?', 'Maria Catarina dos Santos'),
('Thiago Moura Leite', 'thi_moura', '1996-06-05', 'Masculino', '(62)99999-0000', 'thiago.leite@email.com', 'hashthiago2024', 2, '2025-06-01', 'uploads/83645875.jpg', '74000-010', 'Qual o nome do seu primeiro animal de estimação?', 'Flor'),
('Bianca Teixeira Ramos', 'bia.tr', '2003-12-01', 'Feminino', '(19)97777-8888', 'bianca.ramos@email.com', 'senhaCriptBianca', 1, NULL, 'uploads/83645875.jpg', '13040-000', 'Qual o nome da sua escola primária?', 'EMEI Dona Fabiana Clotilde Queiroz');


-- historico de doenças
CREATE TABLE doencas( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    doenca VARCHAR(255), 
    id_usuario INT, 
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) 
);
INSERT INTO doencas (doenca, id_usuario) 
VALUES
('Hipertensão', 9),
('Diabetes', 9),
('Diabetes', 6),
('SM', 4),
('Displipidemia', 4),
('Lúpus', 3),
('Dislipidemia', 8),
('Câncer', 2),
('Anemia', 7),
('Anemia', 10);

-- alergias
CREATE TABLE alergias( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    alimento VARCHAR(255), 
    id_usuario INT, 
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) 
);
INSERT INTO alergias (alimento, id_usuario) 
VALUES
('Frutos do mar', 10),
('Frutos do mar', 6),
('Soja', 6),
('Lactose', 4),
('Lactose', 5),
('Lactose', 9),
('APLV', 8),
('Amendoim', 2),
('Aveia', 7),
('Glúten', 3);

-- alimentos para recomendar
CREATE TABLE bons( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(255), 
    id_usuario INT, 
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) 
);
INSERT INTO bons (nome, id_usuario) 
VALUES
('Legumes', 1),
('Legumes', 3),
('Banana', 6),
('Batata', 4),
('Carne bovina', 5),
('Peixes', 9),
('Ovo', 8),
('Amendoim', 3),
('Aveia', 7),
('Aveia', 1);

-- alimentos para não recomendar
CREATE TABLE ruins ( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    id_usuario INT, 
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) 
);
INSERT INTO ruins (nome, id_usuario) 
VALUES
('Coentro', 4),
('Cebola', 3),
('Banana', 10),
('Inhame', 1),
('Aveia', 5),
('Chá', 9),
('Jiló', 8),
('Jiló', 3),
('Mamão', 2),
('Ovo', 1);

-- perguntas: a tabela "perguntas" armazena as perguntas para os usuários. Como o formulário possui apenas duas com respostas individuais, não são necessários mais inserts. Ela é utiliazda apenas para se manter uma melhor orgaização e vinculação das respostas.
CREATE TABLE perguntas (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    descricao TEXT NOT NULL  
);
INSERT INTO perguntas (descricao) VALUES
('Qual é seu principal objetivo com a plataforma?'),
('Por onde você nos conheceu?');

-- respostas
CREATE TABLE respostas (
    id_usuario INT,
    id_pergunta INT NOT NULL,
    resposta TEXT NOT NULL,  
    PRIMARY KEY (id_usuario, id_pergunta),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (id_pergunta) REFERENCES perguntas(id) ON DELETE CASCADE
);
INSERT INTO respostas (id_usuario, id_pergunta, resposta) VALUES
(1, 1, 'Quero melhorar a relação com a comida'),
(1, 2, 'Caí de paraquedas'),
(2, 1, 'Quero explorar novas possibilidades com as receitas'),
(2, 2, 'Redes Sociais'),
(3, 1, 'Quero criar hábitos saudáveis'),
(3, 2, 'Redes Sociais'),
(4, 1, 'Quero melhorar a relação com a comida'),
(4, 2, 'Amigos e/ou familiares'),
(5, 1, 'Quero explorar novas possibilidades com as receitas'),
(5, 2, 'Caí de paraquedas'),
(6, 1, 'Quero criar hábitos saudáveis'),
(6, 2, 'Caí de paraquedas'),
(7, 1, 'Quero uma ferramenta a mais no acompanhamento profissional'),
(7, 2, 'Redes Sociais'),
(8, 1, 'Quero uma ferramenta a mais no acompanhamento profissional'),
(8, 2, 'Recomendação do(a) meu(minha) nutri/psico'),
(9, 1, 'Quero uma ferramenta a mais no acompanhamento profissional'),
(9, 2, 'Recomendação do(a) meu(minha) nutri/psico'),
(10, 1, 'Quero melhorar a relação com a comida'),
(10, 2, 'Redes Sociais');

-- depoimentos
CREATE TABLE depoimentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    data_post DATETIME DEFAULT CURRENT_TIMESTAMP,
    conteudo TEXT NOT NULL,
    foto VARCHAR(255),
    video VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id)
);
INSERT INTO depoimentos (id_usuario, data_post, conteudo, foto, video) VALUES 
(1, '2025-04-15 14:30:00', 'Adorei a experiência com este site! Foi transformador para minha vida.', 'foto1.jpg', NULL),
(3, '2025-05-02 09:15:22', 'Recomendo a todos meus amigos. A experiência foi excepcional!', NULL, 'video1.mp4'),
(5, '2025-05-02 09:15:22', 'Não esperava tanto em tão pouco tempo. Superou todas minhas expectativas!', 'foto2.jpg', null),
(2, '2025-05-10 18:45:00', 'Estou muito satisfeito com os resultados alcançados. Valeu cada centavo investido.', null, null),
(7, '2025-05-12 09:15:22', 'Durante 10 anos lutei contra a compulsão. Quem diria que, depois de 1 ano e 2 meses eu finalmente conseguiria comer uma, e apenas uma, paçoca sem precisas acabar com o pote de uma vez! Assista o vídeo para ver o depoimento completo', 'foto_9.jpg', 'video2.mp4'),
(4, '2025-05-12 11:20:33', 'Depois de anos procurando, finalmente encontrei o que precisava aqui <3', 'foto3.jpg', null),
(8, '2025-06-02 09:15:22', 'Minha vida mudou completamente depois que comecei a usar o diário alimentar. Gratidão!', null, null),
(6, '2025-06-04 16:10:47', 'Incrível como algo tão simples pode fazer tanta diferença!', 'foto4.jpg', 'video3.mp4'),
(9, '2025-06-04 09:15:22', 'Atendimento personalizado e resultados rápidos. O que mais se pode pedir? Quer conhcer mais da minha história? Dá o play!', null, 'video4.mp4'),
(10, '2025-06-08 13:25:18', 'Já indiquei para toda minha família. Todos estão amando a experiência!', null, null);


-- comunidade
CREATE TABLE comunidade (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    data_post DATETIME DEFAULT CURRENT_TIMESTAMP,
    conteudo TEXT NOT NULL,
    foto VARCHAR(255),
    video VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id)
);
INSERT INTO comunidade (id_usuario, data_post, conteudo, foto, video) VALUES 
(5, '2025-05-19 11:50:00', 'Acabei de chegar nessa comunidade! Ansiosa por conhecer mais 😊', null, null),
(10, '2025-05-19 19:25:00', 'Olhem que lindo bolo minha filha preparou para mim depois que cheguei do trabalho. Isso não tem preço! ', 'bolo.jpg', null),
(8, '2025-05-20 12:30:00', 'Oie! Já foram conferir a nova receita que postei? #lasanhadiferente', 'lasanha.jpg', null),
(3, '2025-05-20 06:40:00', 'Bom dia pessoal! Bora aproveitar esse dia lindo movendo o corpo? ✌️', 'boom_taquaral(1).mp4', null),
(9, '2025-05-21 14:45:00', 'Minha mais nova aquisição <3', 'airfryer.jpg', null),
(7, '2025-05-22 08:09:00', 'Apaixonada por esse lanchinho: mini panquecas de banana com iogurte natural (este é proteico 😉). Querem receita??? ', 'panquecas.jpg', 'panquecas.mp4'),
(9, '2025-06-22 19:30:00', 'Comemorando +1 ano de vida! 🎉', 'comemoracao.jpg', 'parabens.mp4'),
(4, '2025-05-24 08:15:00', 'Acabei de ler esse livro sobre comer intuitivo e queria compartilhar: Comer Intuitivo', 'livro_comer_intuitivo.jpg', null),
(1, '2025-05-25 14:22:00', 'Alguém tem alguma receita que deixe chuchu bom? Não consigo gostar dele 🙄 ', null, null),
(6, '2025-05-25 18:15:00', 'Dica rápida para caso você se sinta ansioso essa semana 👉 ', null, 'tutorial.mp4');


-- sabores
CREATE TABLE sabores(
    id INT PRIMARY KEY AUTO_INCREMENT,
    sabor VARCHAR(100)
);
INSERT INTO sabores (sabor) VALUES
('amargo'),
('azedo'),
('doce'),
('salgado'),
('umami'),
('picante'),
('agridoce'),
('frutado'),
('terroso'),
('nutty'), 
('defumado'),
('refrescante'),
('amanteigado'), 
('neutro'), -- 14
('doce_nutty'),
('doce_salgado'),
('doce_amargo'),
('doce_azedo'),
('doce_refrescante'),
('doce_umami'),
('doce_picante'),
('doce_frutado'),
('doce_terroso'),
('doce_defumado'),
('doce_amanteigado'), -- 25
('amargo_nutty'),
('amargo_salgado'),
('amargo_azedo'),
('amargo_refrescante'),
('amargo_umami'),
('amargo_picante'),
('amargo_frutado'),
('amargo_terroso'),
('amargo_defumado'),
('amargo_amanteigado'), -- 35
('azedo_nutty'),
('azedo_salgado'),
('azedo_refrescante'),
('azedo_umami'),
('azedo_picante'),
('azedo_frutado'),
('azedo_terroso'),
('azedo_defumado'),
('azedo_amanteigado'), -- 44
('salgado_nutty'),
('salgado_refrescante'),
('salgado_umami'),
('salgado_picante'),
('salgado_frutado'),
('salgado_terroso'),
('salgado_defumado'),
('salgado_amanteigado'),-- 52
('umami_nutty'),
('umami_refrescante'),
('umami_picante'),
('umami_frutado'),
('umami_terroso'),
('umami_defumado'),
('umami_amanteigado'),
('picante_nutty'),
('picante_refrescante'),
('picante_frutado'),
('picante_terroso'),
('picante_defumado'),
('picante_amanteigado'),
('frutado_nutty'),
('frutado_refrescante'),
('frutado_terroso'),
('frutado_defumado'),
('frutado_amanteigado'),
('terroso_nutty'),
('terroso_refrescante'),
('terroso_defumado'),
('terroso_amanteigado'),
('nutty_refrescante'),
('nutty_defumado'),
('nutty_amanteigado'),
('defumado_refrescante'),
('defumado_amanteigado'),
('refrescante_amanteigado');

-- texturas
CREATE TABLE texturas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    textura VARCHAR(100)
);
INSERT INTO texturas (textura) VALUES
('macio'),
('crocante'),
('firme'),
('gelatinoso'),
('pegajoso'),
('cremoso'),
('fibroso'),
('pastoso'),
('líquido'),
('amanteigado'), -- 10
('macio_crocante'),
('macio_firme'),
('macio_gelatinoso'),
('macio_pegajoso'),
('macio_cremoso'),
('macio_fibroso'),
('macio_pastoso'),
('macio_líquido'),
('macio_amanteigado'), -- 19
('crocante_firme'),
('crocante_gelatinoso'),
('crocante_pegajoso'),
('crocante_cremoso'),
('crocante_fibroso'),
('crocante_pastoso'),
('crocante_líquido'),
('crocante_amanteigado'), -- 27
('firme_gelatinoso'),
('firme_pegajoso'),
('firme_cremoso'),
('firme_fibroso'),
('firme_pastoso'),
('firme_líquido'),
('firme_amanteigado'), -- 34
('gelatinoso_pegajoso'),
('gelatinoso_cremoso'),
('gelatinoso_fibroso'),
('gelatinoso_pastoso'),
('gelatinoso_líquido'),
('gelatinoso_amanteigado'), -- 40
('pegajoso_cremoso'),
('pegajoso_fibroso'),
('pegajoso_pastoso'),
('pegajoso_líquido'),
('pegajoso_amanteigado'), -- 45
('cremoso_fibroso'),
('cremoso_pastoso'),
('cremoso_líquido'),
('cremoso_amanteigado'), -- 49
('fibroso_pastoso'),
('fibroso_líquido'),
('fibroso_amanteigado'), -- 52
('pastoso_líquido'),
('pastoso_amanteigado'), -- 54
('líquido_amanteigado'); -- 55

-- aromas
CREATE TABLE aromas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    aroma VARCHAR(100)
);
INSERT INTO aromas (aroma) VALUES
('cítrico'),
('herbal'),
('vegetal'),
('adocicado'),
('caramelizado'),
('floral'),
('defumado'),
('enxofrado'),
('lácteo'),
('amanteigado'),
('pão'),
('café'), -- 12
('cítrico_herbal'),
('cítrico_vegetal'),
('cítrico_adocicado'),
('cítrico_caramelizado'),
('cítrico_floral'),
('cítrico_defumado'),
('cítrico_enxofrado'),
('cítrico_lácteo'),
('cítrico_amanteigado'),
('cítrico_café'), -- 22
('herbal_vegetal'),
('herbal_adocicado'),
('herbal_caramelizado'),
('herbal_floral'),
('herbal_defumado'),
('herbal_enxofrado'),
('herbal_lácteo'),
('herbal_amanteigado'),
('herbal_café'), -- 31
('vegetal_adocicado'),
('vegetal_caramelizado'),
('vegetal_floral'),
('vegetal_defumado'),
('vegetal_enxofrado'),
('vegetal_lácteo'),
('vegetal_amanteigado'),
('vegetal_café'), -- 39
('adocicado_caramelizado'),
('adocicado_floral'),
('adocicado_defumado'),
('adocicado_enxofrado'),
('adocicado_lácteo'),
('adocicado_amanteigado'),
('adocicado_café'), -- 46
('caramelizado_floral'),
('caramelizado_defumado'),
('caramelizado_enxofrado'),
('caramelizado_lácteo'),
('caramelizado_amanteigado'),
('caramelizado_café'), -- 50
('floral_defumado'),
('floral_enxofrado'),
('floral_lácteo'),
('floral_amanteigado'),
('floral_café'), -- 55
('defumado_enxofrado'),
('defumado_lácteo'),
('defumado_amanteigado'),
('defumado_café'),-- 59
('enxofrado_lácteo'),
('enxofrado_amanteigado'),
('enxofrado_café'), -- 62
('lácteo_amanteigado'),
('lácteo_café'), -- 63
('amanteigado_café'); -- 64

-- sentimentos
CREATE TABLE sentimentos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    sentimento VARCHAR(100)
);
INSERT INTO sentimentos (id, sentimento) VALUES
(1, 'alegria'),
(2, 'tristeza'),
(3, 'nojo'),
(4, 'raiva'),
(5, 'medo'),
(6, 'angústia'),
(7, 'ansiedade'),
(8, 'nostalgia'),
(9, 'culpa'),
(10, 'decepção');

-- alimentos
CREATE TABLE alimentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_alimento VARCHAR(255),
    id_sabor INT,
    id_textura INT,
    id_aroma INT,
    FOREIGN KEY (id_sabor) REFERENCES sabores(id),
    FOREIGN KEY (id_textura) REFERENCES texturas(id),
    FOREIGN KEY (id_aroma) REFERENCES aromas(id)
);
INSERT INTO alimentos (id, nome_alimento, id_sabor, id_textura, id_aroma) VALUES
(1, 'Abóbora Cabotiá Cozida', 15, 16, 31),
(2, 'Pão Francês', 4, 11, 11),
(3, 'Bolo de Maçã com Canela e Castanhas', 14, 11, 4),
(4, 'Iogurte Natural Desnatado', 2, 6, 9),
(5, 'Atum em pedaços ao natural', 46, 3, 8 ),
(6, 'Granola com uvas passas', 21, 2, 4 ),
(7, 'Chocolate ao Leite', 3, 6, 4 ),
(8, 'Músculo Bovino Moído', 50, 12, 7),
(9, 'Ovo Cozido', 46, 1, 8),
(10, 'Kimchi de Acelga', 39, 2, 3 ),
(11, 'Arroz Branco Cozido', 4, 1, 10),
(12, 'Feijão Preto Cozido', 4, 1, 10),
(13, 'Beterraba Crua', 23, 3, 4 ),
(14, 'Sorvete de Ninho Trufado', 3, 6, 4 ),
(15, 'Barra de Cereais: Frutas Vermelhas e Chocolate', 3, 22, 4 ),
(16, 'Banana Prata', 3, 31, 4),
(17, 'Laranja Maçã', 3, 7, 4 ),
(18, 'Mamão Papaia', 3, 7, 4 ),
(19, 'Requeijão', 4, 6, 8),
(20, 'Molho de Tomate', 47, 9, 4);

-- diario alimentar
CREATE TABLE diario_alimentar(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    data_ref DATE,
    nome_ref VARCHAR(30),
    lugar VARCHAR(30),
    hora TIME,
    nota INT,
    descricao TEXT,
    id_sentimento INT,  
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id),
    FOREIGN KEY (id_sentimento) REFERENCES sentimentos(id)
);
INSERT INTO diario_alimentar (id_usuario, data_ref, nome_ref, lugar, hora, nota, descricao, id_sentimento) VALUES
(1, '2025-06-03', 'Café da manhã', 'Casa', '05:30', 10, 'Este é meu café da manhã favorito! Além de delicioso me mantém super saciada pela manhã. Mas sinto que ainda falta alguma coisa... talvez amanhã eu adicione uma frutinha também.', 1),
(5, '2025-06-03', 'Almoço', 'Casa', '12:30', 8, 'Estava bem gostoso, mas faltou um arrozinho... infelizmente não tive tempo de me preparar a acabei só comendo os restos da geladeira. Mas no fim, a combinação deu certo!', 1),
(2, '2025-06-03', 'Café da tarde', 'Casa', '15:30', 10, 'Isso sim foi um baita lanche! Era tudo o que eu queria! Refrescante, macio, crocante... e ainda de pós treino? Não podia ser melhor!', 1),
(10, '2025-06-03', 'Café da manhã', 'Casa', '7:00', 7, 'A banana estava verde e senti fome muito rápido... deveria ter adicionado alguma proteína para me saciar mais', 10),
(4, '2025-06-03', 'Café da manhã', 'Casa', '10:00', 2, 'Ainda não me sinto à vontade comendo "tanto" no café da manhã... ainda por cima, não estava tão boa, e assim mesmo eu comi tudo, o que aumentou ainda mais a minha culpa.', 9),
(3, '2025-06-03', 'Café da manhã', 'Casa', '08:45', 3, 'Já é a terceira vez que exagero no sorvete desde que começei a incluí-o de novo. Me sinto fora de controle porque gosto muito e depois entro em um ciclo vicioso de restringir e exagerar. Preciso trabalhar melhor essa questão para que minha sobremesa favorita não tenha mais gosto de culpa.', 6),
(7, '2025-06-03', 'Café da tarde', 'Casa', '17:05', 9, 'Simplesmente muito bom, é isso!', 1),
(8, '2025-06-03', 'Almoço', 'Casa', '14:40', 10, 'Não tenho nem palavras para descrever meu AMOR por esta refeição. Tenho feito ela literalmente todos os dias depois que a descobri no iNUTRE. ', 1),
(4, '2025-06-03', 'Almoço', 'Casa', '11:00', 4, 'Não consegui... os pensamentos ruins tomaram conta da minha cabeça e acabei jogando quase tudo fora quando ninguém estava vendo. Estou muito arrependida agora!', 1),
(6, '2025-06-03', 'Janta', 'Casa', '18:30', 5, 'Foi um pouco decepcionante... acabei colocando muita expectativa em um prato que não valeu a pena...', 10);


-- alimentos de cada diario
CREATE TABLE alimentos_diario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_diario INT NOT NULL,
    id_alimento INT NOT NULL,
    qtde DECIMAL(10,2) NOT NULL,
    UNIQUE (id_usuario, id_diario, id_alimento),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (id_diario) REFERENCES diario_alimentar(id) ON DELETE CASCADE,
    FOREIGN KEY (id_alimento) REFERENCES alimentos(id)
);
INSERT INTO alimentos_diario(id_usuario, id_diario, id_alimento, qtde) VALUES
(1, 1, 2, 50.0),
(1, 1, 9, 65.0),
(5, 2, 1, 80.0),
(5, 2, 8, 80.0),
(5, 2, 9, 50.0),
(5, 2, 10, 100.0),
(2, 3, 4, 170.0),
(2, 3, 6, 40.0),
(10, 4, 2, 50.0),
(10, 4, 5, 60.0),
(10, 4, 13, 40.0),
(10, 4, 19, 30.0),
(4, 5, 3, 80.0),
(4, 5, 4, 120.0 ),
(4, 5, 6, 20.0),
(4, 5, 16, 45.0),
(4, 5, 18, 135.0),
(3, 6, 14, 250.0),
(7, 7, 7, 30.0),
(8, 8, 1, 50.0),
(8, 8, 8, 100.0),
(8, 8, 11, 100.0),
(8, 8, 12, 100.0),
(4, 9, 8, 70.0),
(4, 9, 11, 100.0),
(4, 9, 12, 100.0),
(4, 9, 19, 30.0),
(4, 9, 20, 20.0),
(6, 10, 2, 70.0),
(6, 10, 9, 100.0),
(6, 10, 10, 80.0);

-- tabela nutricional básica para cada alimento cadastrado
CREATE TABLE tabela_nutricional(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_alimento INT,
    kcal DECIMAL,
    carboidratos DECIMAL,
    acucares_add DECIMAL,
    proteinas DECIMAL,
    gorduras_totais DECIMAL,
    FOREIGN KEY (id_alimento) REFERENCES alimentos(id)
);
INSERT INTO tabela_nutricional (id_alimento, kcal, carboidratos, acucares_add, proteinas, gorduras_totais) VALUES 
(1, 48, 12.0, 0.0, 1.4, 0.1),
(2, 300, 58.0, 0.0, 8.0, 3.0),
(3, 320, 45.0, 20.0, 5.0, 12.0),
(4, 60, 4.0, 0.0, 10.0, 0.0),
(5, 120, 0.0, 0.0, 26.0, 1.0),
(6, 450, 65.0, 10.0, 10.0, 12.0),
(7, 540, 55.0, 45.0, 7.0, 30.0),
(8, 250, 0.0, 0.0, 26.0, 15.0),
(9, 155, 1.1, 0.0, 13.0, 11.0),
(10, 30, 5.0, 0.0, 2.0, 0.5),
(11, 130, 28.0, 0.0, 2.7, 0.3),
(12, 132, 23.0, 0.0, 8.9, 0.5),
(13, 43, 9.6, 0.0, 1.6, 0.2),
(14, 350, 30.0, 25.0, 5.0, 20.0),
(15, 200, 30.0, 15.0, 5.0, 6.0),
(16, 89, 23.0, 0.0, 1.1, 0.3),
(17, 47, 12.0, 0.0, 0.9, 0.1),
(18, 43, 11.0, 0.0, 0.5, 0.1),
(19, 250, 3.0, 0.0, 10.0, 20.0),
(20, 35, 7.0, 0.0, 1.5, 0.2);