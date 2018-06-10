<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ConstructorController extends Controller {

    public function createPhases() {
        $ph1 = new Phase();
        $ph1->setName('Gerenciamento de tarefas');
        $ph1->setDescription('A <b>produtividade</b> está totalmente ligada a forma como lidamos com a quantidade de tarefas e o tempo disponível. Realizar projetos por pequenas etapas vai deixar tudo mais fluído, ajudando a colocar em ordem tudo o que sua equipe produzirá, por isso, precisamos de uma boa estratégia de <b>gerenciamento de tarefas!</b>
            <br>
            <b>Escolha uma das sugestões que temos para você!</b>');
        $ph1->setActive(true);
        dump($ph1->save());

        $ph5 = new Phase();
        $ph5->setName('Gerenciamento de pessoas');
        $ph5->setDescription('O termo <b>gestão de pessoas</b> é um conceito empregado às estratégias que objetivam <b>atrair</b>, <b>reter</b>, <b>potencializar</b> e <b>administrar o capital humano</b> de uma corporação. As empresas que possuem essa expertise entre suas políticas internas são aquelas que formam profissionais mais bem qualificados e motivados para desempenhar suas funções. Por isso, é importante pensar bem no modo como as funções que serão definidas pelo método anterior serão distribuidas!
            <br>    
            <b>Escolha alguma das opções ao lado para continuar!</b>');
        $ph5->setActive(true);
        dump($ph5->save());

        $ph3 = new Phase();
        $ph3->setName('Método de entrega');
        $ph3->setDescription('Satisfazer um <b>cliente</b> é o principal objetivo quando se produz algo. O resultado final de tudo aquilo que foi criado tem sempre que atingir as principais expectativas de quem paga pelo serviço ou produto. Dessa maneira, pensar, analisar e propor melhorias devem ser tarefas rotineiras para todas as pessoas envolvidas naquele projeto. Mas, quem pode ser a melhor opção para <b>sugerir mudanças</b> que vão agregar mais valor ao produto? Se você pensou no próprio <b>cliente</b>, está absolutamente certo.
            <br>
            <b>E para atingirmos este objetivo, vamos planejar também nosso método de interação com o cliente!</b>');
        $ph3->setActive(true);
        dump($ph3->save());

        $ph2 = new Phase();
        $ph2->setName('Estrutura do ciclo de desenvolvimento');
        $ph2->setDescription('O <b>ciclo de vida</b> é a <b>estrutura</b> contendo <b>processos</b>, 
            <b>atividades e tarefas envolvidas no desenvolvimento</b>, <b>operação</b> e <b>manutenção</b> de um 
            produto de software, abrangendo a vida do sistema, desde a definição de seus requisitos até o término de 
            seu uso. Neste âmbito, nosso foco são os ciclos de desenvolvimento, contidos no ciclo de vida do projeto. A
            importância deste se dá na organização de um desenvolvimento adaptável a seu tipo de projeto. 
            <br>
            <b>Para isso, temos alguns modelos para lhe auxiliar!</b>');
        $ph2->setActive(true);
        dump($ph2->save());

        $ph4 = new Phase();
        $ph4->setName('Tempo do ciclo de desenvolvimento');
        $ph4->setDescription('O <b>tempo do ciclo de desenvolvimento</b> refere-se ao tempo de repetição do 
            mesmo, em que suas etapas são <b>reexecutadas</b>, garantindo a frequente iteração e promovendo um 
            desenvolvimento cíclico e incremental!');
        $ph4->setActive(true);
        dump($ph4->save());


        $ph6 = new Phase();
        $ph6->setName('Método de aplicação de métricas');
        $ph6->setDescription('<b>Métricas? É de passar no pão?</b>
            <br>
            Existem diversas medidas de garantia de qualidade fundamentais para o sucesso de qualquer tipo de aplicação de software, dentre elas, uma das <b>mais simples</b> e <b>menos custosa</b>, é a <b>medição de software</b>, e é ai que entram nossas <b>métricas!</b>
            <br>
            Com as métricas, conseguimos não só gerir a qualidade de nossos produtos como também utilizar o desenvolvimento deste como base para o próximo! Como? Basta aplicarmos os conceitos corretamente e utilizarmos os dados extraidos para estruturar uma <b>Base Histórica</b>.
            <br>
            <br>
            <b>Veja agora alguns exemplos de métricas e como aplicá-las!</b>');
        $ph6->setActive(true);
        dump($ph6->save());
    }

    public function createFeatures() {
        //---------------- Gerenciamento de tarefas

        $ft1 = new Feature();
        $ft1->setIdPhase(1);
        $ft1->setName('Checklist');
        $ft1->setShortdescription('Os <b>checklists</b> são <b>mágicos!</b> Com eles você vai ganhar tempo, errar menos e ser muito mais produtivo. Checklists são utilizados na <b>medicina</b>, na <b>engenharia</b> e até na <b>aeronáutica</b>. Se você trabalha com internet e ainda não usa checklists, está <b>perdendo tempo!</b>');
        $ft1->setLongdescription('O Checklist é uma lista de itens que foi previamente estabelecida para 
            certificar as condições de um serviço, produto, processo ou qualquer outra tarefa. Seu intuito é atestar 
            que todas as etapas ou itens da lista foram cumpridas de acordo com o programado.
            <br>
            <br>
			<h4>Como fazer um Checklist?</h4>
			<b>#1º passo: Defina o que precisa ser verificado</b>
			<br>
				Apesar de óbvio, muitos se enganam na hora de elaborar a lista de verificação. Por isso é importante definir o que deve ser enxergado e os porquês de desenvolver o Checklist, ou seja tenha claro em mente o objetivo e importância da ferramenta.
			<br>
			<br>
			<b>#2º passo: Defina a frequência de utilização</b>
			<br>
				Nesta etapa é essencial definir quais são os momentos que a lista de verificação deverá ser utilizada. Existem prestadores de serviço que após a realização do seu trabalho utilizam o checklist para demonstrar ao cliente que todas atividades foram executadas. Além disso, colocam um campo de assinatura onde o cliente valida a lista para demonstrar que tudo que foi entregue conforme o combinado.
			<br>
			<br>
			<b>#3º passo: Defina quem irá utilizar</b>
			<br>
				Tenha bem definido quem são os responsáveis por utilizar o Checklist. Com a definição dos responsáveis aplique um treinamento demonstrando como utilizar e a importância. Aplicar esta ferramenta pode exigir uma mudança de cultura, uma vez que no começo alguns colaboradores podem menosprezá-la.
			<br>
			<br>
			<b>#4º passo: Defina os itens a serem verificados</b>
			<br>
				Este é o momento de definir quais os itens precisam ser checados para constatar se um serviço, produto, processo ou atividade foi plenamente cumprido de acordo com as especificações. Por isso, peça ajuda do colaborador que utilizará a ferramenta, pois eles já possuem o conhecimento e a experiência necessárias para auxiliar na definição do conteúdo da lista.
			<br>
			<br>
			<b>#5º passo: Teste a lista</b>
			<br>
				Antes de utilizar a lista, peça para alguns colaboradores, que realizem alguns testes para certificar que o instrumento está validado ou se é necessário alterar alguma coisa. Normalmente, durante o teste sempre surgem dúvidas e sugestões de melhoria.');
        $ft1->setActive(true);
        dump($ft1->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(1);
        $ft2->setName('Quadro dividido por colunas');
        $ft2->setShortdescription('Um bom exemplo de utilização de quadros divididos por colunas é o '
            .'<b>Kanban</b>. O kanban é uma simbologia visual utilizada para registrar ações. Você pode seguir à risca a '
            .'proposta do Kanban, separando em to do, doing e done, ou ampliar essas fases para fazer um '
            .'gerenciamento mais detalhado, e se surpreender com os resultados!');
        $ft2->setLongdescription('<b>Princípios do Kanban</b>'
            .'<br>'
            .'O kanban procura identificar oportunidades de melhoria criando uma cultura Kaizen na equipe, na qual a '
            .'melhoria contínua é responsabilidade de todos.'
            .'<br>'
            .'Os princípios básicos em torno dessa ferramenta são:'
            .'<br>'
            .'<br>'
            .'<b>Visualização da Cadeia de Valor:</b> enxergando as fases do produto (por exemplo, um software, algo material '
            .'ou até mesmo um serviço);'
            .'<br>'
            .'<br>'
            .'<b>Desenvolvimento Evolucionário (Adaptativo):</b> através de gestão de mudanças simples, adaptando-se de forma '
            .'ágil, entregando o que tem mais valor antes. Perceba que a palavra “ágil”, muitas vezes confundida com '
            .'rapidez, aqui significa capacidade de se adaptar às mudanças com mais facilidade, mais agilidade;'
            .'<br>'
            .'<br>'
            .'<b>Restrição do trabalho e seu progresso em torno de seus estágios:</b> permitindo medição, controle e melhoria '
            .'contínua.'
            .'<br>'
            .'<br>'
            .'Para saber mais sobre o kanban, clique <a href="https://www.devmedia.com.br/kanban-4-passos-para-implementar-em-uma
                -equipe/30218">aqui</a>
');
        $ft2->setActive(true);
        dump($ft2->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(1);
        $ft2->setName('Quadro dividido por etiquetas');
        $ft2->setShortdescription('Um quadro de tarefas pode ser dividido por etiquetas em que cada cor de '
            .'etiqueta corresponde a uma prioridade ou classificação da tarefa. Assim, são definidos atributos das '
            .'tarefas, os quais devem ser seguidos à risca para a execução de cada uma!');
        $ft2->setLongdescription('Uma ferramenta que oferece suporte a este tipo de organização é o Trello, 
            com a possibilidade de marcar tarefas por meio de etiquetas coloridas, às quais você pode atribuir um 
            significado interno, simplificando sua organização.
            <br>
            Ficou interessado na ferramenta? Saiba mais <a href="https://trello.com/">aqui</a>, ou na sessão de escolha 
            de tarefas por meio dos membros da equipe.');
        $ft2->setActive(true);
        dump($ft2->save());

        //---------------- Gerenciamento de pessoas

        $ft2 = new Feature();
        $ft2->setIdPhase(2);
        $ft2->setName('Delegação de tarefas');
        $ft2->setShortdescription('Dentre tantas atividades desenvolvidas pelo gestor na sua rotina diária, talvez '
            .'a delegação seja uma das que possibilite maior probabilidade em atingir melhores resultados, por '
            .'proporcionar ao gestor tempo para focar-se nos aspectos de maior importância e pontos estratégicos '
            .'de sua função, bem como, gerar maior comprometimento dos colaboradores com o trabalho, diante da percepção '
            .'do desenvolvimento suas habilidades.'
            .'<br>'
            .'Delegar, além de permitir maior disponibilidade ao gestor faz com que esse possa avaliar a potencialidade '
            .'dos seus colaboradores.');
        $ft2->setLongdescription('<b>Não insista em fazer tudo sozinho</b>'
            .'<br>'
            .'Não é raro o líder acreditar que é a pessoa mais capacitada da empresa — principalmente se for o '
            .'proprietário dela. Ele imagina isso por causa da experiência, da visão de negócio ou de outras qualidades '
            .'que possa ter. Pensar assim é um dos erros que um líder pode cometer e atrapalha o desenvolvimento de todos.'
            .'<br>'
            .'Quem está em uma posição de liderança deve buscar o trabalho gerencial, e não operacional. Você não '
            .'precisa fazer tudo achando que só assim o trabalho será bem-feito: dê a oportunidade de outras pessoas '
            .'executarem o trabalho e até melhorarem resultados, enquanto você poderá focar em áreas e tarefas mais '
            .'importantes.'
            .'importantes.'
            .'<br>'
            .'<b>Entenda que delegar não é transferir responsabilidades</b>'
            .'<br>'
            .'Muitos líderes pensam que, ao delegar uma tarefa, estão transferindo a responsabilidade daquele trabalho. '
            .'Quem pensa assim apenas diz o que deve ser feito e esquece dessa atribuição (até o momento de cobrar o '
            .'resultado ou resolver algum problema). Delegar não é transferir, e pensar assim é fundamental para o '
            .'cumprimento de tarefas.'
            .'<br>'
            .'Ao delegar, você está dando a oportunidade para um funcionário trabalhar da maneira que achar melhor, '
            .'encontrando novas soluções ou sendo mais rápido do que você seria, por exemplo. Mas você precisa '
            .'acompanhar o andamento do processo, estando próximo ao colaborador e corrigindo o curso da atividade '
            .'caso note algo errado.'
            .'<br>'
            .'Perceba que você não transferiu a tarefa, apenas a delegou para que alguém pudesse executá-la sob '
            .'a sua gestão.'
            .'<br>'
            .'<br>'
            .'<b>Saiba que conhecer o time é fundamental na delegação de tarefas</b>'
            .'<br>'
            .'Você precisa conhecer os pontos fortes e fracos dos seus funcionários antes de distribuir tarefas. '
            .'Com essas informações, você saberá qual é a melhor atribuição para que cada um a cumpra e também se '
            .'desenvolva.'
            .'<br>'
            .'A ideia não é só entregar resultados, mas também dar a chance das pessoas aprenderem e ensinarem durante '
            .'a execução da atividade. Você só conseguirá isso se conhecer e respeitar as características individuais.'
            .'<br>'
            .'<br>'
            .'<b>Nunca se esqueça do feedback</b>'
            .'<br>'
            .'Não é preciso esperar o funcionário terminar a tarefa para mostrar no que ele acertou e no que poderia '
            .'melhorar. Dialogue com ele durante a execução! Você não deve, claro, pressioná-lo ou atrapalhar o '
            .'trabalho, mas precisa dar e receber feedbacks para corrigir desvios, ouvir, propor ideias, tirar e '
            .'esclarecer dúvidas da equipe.'
            .'<br>'
            .'Por isso a comunicação interpessoal é tão importante. Existem até aplicativos que facilitam essa '
            .'interação, de forma que a troca de informações seja constante.'
            .'<br>'
            .'<br>'
            .'<b>Aumente a produtividade</b>'
            .'<br>'
            .'Ao delegar tarefas, o líder gera desenvolvimento pessoal e profissional ao time, além de comprometimento, '
            .'senso de responsabilidade, motivação, proatividade e inovação, dentre outros benefícios. Todos eles '
            .'contribuem para aumentar a produtividade.'
            .'<br>'
            .'Quando os colaboradores notam que são importantes e estimulados pelo líder, os funcionários dão o seu '
            .'melhor. Eles percebem que, quando a empresa ganha, todos também saem ganhando e, por consequência, vão '
            .'buscar isso. O resultado dessa busca é uma produção cada vez melhor. Esse é um dos maiores benefícios da '
            .'delegação de tarefas, e deixa o negócio mais perto do sucesso.');
        $ft2->setActive(true);
        dump($ft2->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(2);
        $ft2->setName('Escolha de tarefa por membro');
        $ft2->setShortdescription('Um bom exemplo de como organizar as tarefas de um modo que os desenvolvedores '
            .'não fiquem dependentes de uma delegação de tarefas por meio do gerente de projetos é o 
                <a href="https://trello.com/">Trello</a>. Com ele, você '
            .'pode criar cartões com as tarefas posicionadas estratégicamente em colunas. Assim, basta que o desenvolvedor '
            .'consulte a coluna "ToDo" e desenvolva alguma das tarefas, dando mais liberdade a sua equipe!');
        $ft2->setLongdescription('Este metodo de gerenciamento de tarefas pode ser melhor vizualizado '
            .'com a aplicação de um sistema chamado '
            .'<a href="https://trello.com/">Trello</a>, que é amplamente utilizado em aplicações com metodos como o 
                <a href="https://www.desenvolvimentoagil.com.br/scrum/">Scrum</a>. '
            .'<br>'
            .'O Trello é um sistema de quadro virtual para gerenciamento de tarefas que segue o método "kanban", '
            .'muito usado no desenvolvimento com Scrum. Ele permite a criação de diversos quadros, nos quais podemos '
            .'criar quantas colunas quisermos. Dentro de cada coluna é possível adicionar um ou mais "cards" (que são '
            .'as tarefas propriamente ditas), contendo o conteúdo que o usuário desejar.'
            .'<br>'
            .'Em cada um dos cards, podemos adicionar informações diversas. Há uma pequena timeline em que podemos '
            .'deixar recados, uma listinha "to-do" para listar e marcar subtarefas, podemos enviar uma ou mais imagens '
            .'para esse card, adicionar prazos e datas-limite, entre outras funções interessantes. Além disso, cada '
            .'card pode ser marcado com uma etiqueta colorida, o que ajuda a definir, por exemplo, tarefas mais urgentes '
            .'que podem ser brevemente adiadas.'
            .'<br>'
            .'O Trello permite convidar outros membros para visualizar e editar seu quadro de tarefas. É possível '
            .'arrastar e soltar os cards de uma coluna para outra facilmente, e podemos definir uma tarefa para um '
            .'ou mais membros conforme a necessidade, bastando arrastar a foto do usuário desejado para o card da tarefa.'
            .'<br>'
            .'O Trello pode ser usado de forma gratuita, oferecendo também um serviço premium que permite usar funções '
            .'extras como integração com o Google Apps, exportação dos dados de todos os quadros criados, entre outros '
            .'mimos. É possível usar o Trello autenticando-se com sua conta do Google ou criando uma conta de usuário '
            .'própria.'
            .'<br>'
            .'Enfim, eis uma boa alternativa para organização e gerenciamento de equipes de desenvolvimento de software. '
            .'Embora tenhamos usado o Scrum como exemplo, obviamente não é obrigatório que os desenvolvedores usem '
            .'essa metodologia ágil para usufruir do Trello, podendo utilizá-lo conforme suas necessidades. Para deixar '
            .'tudo ainda mais versátil, o Trello também oferece aplicativos para iOS e Android, além de estar disponível '
            .'em trello.com.');
        $ft2->setActive(true);
        dump($ft2->save());

        //---------------- Gerenciamento de interação com o cliente

        $ft2 = new Feature();
        $ft2->setIdPhase(3);
        $ft2->setName('Entregas parciais');
        $ft2->setShortdescription('Entregas parciais são amplamente utilizadas para validação de um escopo '
            .'de desenvolvimento. Com um bom plamejamento de entregas, você garante o feedback do cliente em etapas cruciais '
            .'do seu sistema, promove validação dos seus requisitos. Utilize desta estratégia para atingir o sucesso de seu '
            .'projeto!');
        $ft2->setLongdescription('<b>Definindo as entregas em seus projetos</b> '
            .'<br>'
            .'Vamos definir de forma prática e muito simples (mas muito poderosa) o que são as entregas do seu projeto. '
            .'Sempre que você tem um novo projeto (criado / identificado por você ou que lhe for atribuído), uma das '
            .'primeiras coisas que você deve fazer é definir as entregas para o projeto.  As entregas em um projeto '
            .'são os produtos de trabalho específicos que você tem que produzir, a fim de completar o projeto.'
            .'<br>'
            .'<br>'
            .'Por exemplo, se o projeto é criar uma nova política de trabalho, as entregas podem ser:'
            .'<br>'
            .'Uma pesquisa de dados coletados de várias outras políticas e, em seguida, '
            .'<br>'
            .'Um documento de política completo.'
            .'<br>'
            .'<br>'
            .'Se o projeto é a criação de uma nova sala na sua casa, as entregas podem ser:'
            .'<br>'
            .'Móveis e ornamentos;'
            .'<br>'
            .'Quadros para as paredes; e'
            .'<br>'
            .'Uma sala onde estes itens são organizados (a sala propriamente descrita).'
            .'<br>'
            .'<br>'
            .'Para definir os resultados basta perguntar “Qual que é o resultado pretendido?” Isso ajuda a esclarecer '
            .'o que o projeto significa e, portanto, como fazer para completa-lo. O mais importante nisso tudo é que '
            .'definindo as entregas você direciona sua atenção para os resultados, em vez de atividades.  As atividades '
            .'não são necessariamente itens muito produtivos. Muitas das atividades que fazemos não são necessárias.'
            .'<br>'
            .'Quando você pensa sobre seus projetos, se você pensar primeiro em termos de “fazer atividades” para '
            .'faze-las, sua mente provavelmente vai criar um monte de trabalho desnecessário. Isso é natural – se você '
            .'acha que fazer um projeto significa fazer as atividades, que é na verdade o seu foco a sua mente deixará '
            .'de ter ideias e passará somente a executar as atividades dele.'
            .'<br>'
            .'Por outro lado, se você encontra quais são as entregas do primeiro, imediatamente você passa a pensar '
            .'nos resultados e não nas ações que levarão à ele, filtrando várias atividades que são realmente essenciais '
            .'para o projeto. Isto vai poupar tempo e proporcionar melhores resultados.');
        $ft2->setActive(true);
        dump($ft2->save());


        $ft2 = new Feature();
        $ft2->setIdPhase(3);
        $ft2->setName('Interação contínua');
        $ft2->setShortdescription('<b>O cliente: trabalhar com ele e não para ele.</b> 
            A interação continua é um ótimo metodo de promover a comunicação Requisitos em Projetos de Software!'
            .'<br>'
            .'Utilizar deste conceito da forma correta pode lhe auxiliar a obter a total satisfação do cliente para com o'
            .'seu projeto. Esta técnica visa o feedback contínuo do cliente para com a aplicação desenvolvida. Atinja a'
            .'satistfação total do seu cliente trabalhando com ele em seu projeto!');
        $ft2->setLongdescription('A interação contínua promove total foco na satisfação de requisitos, assim,'
            .'é necessário adquirir um bom metodo de levantamento e saber utiliza-lo com inteação continua dentro '
            .'de too o projeto.'
            .'<br>'
            .'<br>'
            .'<b>A comunicação das necessidades pelo Cliente ao AN/ER</b>'
            .'<br>'
            .'O Business Analysis Body of Knowledge (BABoK) [3], da IIBA®, um guia de referência para requisitos, '
            .'categoriza requisitos em: negócio (Business Requirements); stakeholders (Stakeholders Requirements) e '
            .'solução (Solution Requirements).'
            .'<br>'
            .'O BABoK, bem como o Guide to the Software Engineering Body of Knowledge (SWEBoK), apresentam as seguintes '
            .'técnicas de levantamento de requisitos:'
            .'<br>'
            .'Brainstorming'
            .'<br>'
            .'Análise documental'
            .'<br>'
            .'Grupos de foco'
            .'<br>'
            .'Análise de interfaces'
            .'<br>'
            .'Entrevistas'
            .'<br>'
            .'Observação'
            .'<br>'
            .'Prototipagem'
            .'<br>'
            .'Workshops de requisitos'
            .'<br>'
            .'Questionários'
            .'<br>'
            .'<br>'
            .'Todas estas técnicas têm vantagens e desvantagens, e são mais adequadas em determinadas circunstâncias do '
            .'que outras (não serão aqui descritas, dado a extensão do número de técnicas, pelo que o BABoK descreve '
            .'detalhadamente essas situações para cada técnica no seu capítulo “Techniques”), pelo que o processo de '
            .'(comunicação dos) requisitos a adotar depende da especificidade de cada projeto. Deve-se ter em atenção '
            .'quem participa, quantos participam, os processos a suportar, entre outros. Por exemplo, uma entrevista é '
            .'vantajosa no sentido do contacto direto, permitindo uma obtenção de respostas mais pessoais, bem como a '
            .'observação de gestos ou o tom de voz. Por outro lado, se o número de participantes for elevado, então a '
            .'opção mais vantajosa é a realização de questionários. Se a ideia se focar muito nos fluxos e em tarefas '
            .'sequenciais, a observação dos processos é a mais adequada.'
            .'<br>'
            .'<br>'
            .'<b>A comunicação dos requisitos recolhidos pelo AN/ER ao Cliente para validação</b>'
            .'<br>'
            .'O passo seguinte na tarefa do AN/ER é de registar o que foi levantado na interação cliente–>AN/RE anterior. '
            .'A este registo é dado o nome de documentação dos requisitos, e refere-se a um conjunto de informação '
            .'documental que vai servir de evidência no “contrato” celebrado entre cliente e equipa. A documentação '
            .'dos requisitos serve dois propósitos. 1. A validação de requisitos com o cliente; 2. Passar a informação '
            .'à equipa de desenvolvimento para a implementação da solução (as últimas duas “vias” que são referidas no '
            .'inicio deste artigo). Este último propósito, não constituindo uma comunicação cliente-equipa, não é '
            .'analisado a fundo neste artigo.'
            .'<br>'
            .'A documentação de requisitos mais direcionados para os clientes seguem formatos mais de alto-nível e sem '
            .'informação mais técnica. Os exemplos mais significativos são: diagramas UML (casos de uso e atividades), '
            .'user stories, prototipagem (através de wireframes ou mockups).'
            .'<br>'
            .'É sobre o conjunto de requisitos documentados que se baseia a segunda “via” possível relatada neste '
            .'artigo, a comunicação AN/RE –> cliente. Neste caso, a comunicação não está associada ao levantamento dos '
            .'requisitos e das necessidades, mas sim em validar a informação que foi recolhida nas interações anteriores. '
            .'Este tipo de comunicação é de grande relevância no já referido envolvimento do cliente, pois a forma '
            .'(bem como a frequência) como esta interação é realizada possui implicações diretas na gestão das '
            .'expectativas do cliente. Aqui, também o BABoK e o SWEBoK propõe técnicas idênticas para a validação de '
            .'requisitos, sendo que, ao contrário da interação anterior, o AN/ER pode utilizar complementarmente:'
            .'<br>'
            .'Revisão dos requisitos (Structured Walkthrough)'
            .'<br>'
            .'Prototipagem'
            .'<br>'
            .'Indicadores de desempenho'
            .'<br>'
            .'Análise de riscos'
            .'<br>'
            .'<br>'
            .'Note-se que não existe grandes vantagens em comunicar requisitos demasiado técnicos ao cliente, uma vez que '
            .'esta “linguagem” nem sempre é percetível pelo mesmo. A documentação mais técnica deve ser direcionada '
            .'para a equipa de desenvolvimento, em que a comunicação dos requisitos é efetuada numa ótica de '
            .'“passagem de conhecimento” adquirida na interações anteriores (cliente–><wbr>AN/RE–><wbr>cliente). Os exemplos mais '
            .'significativos são: diagramas UML (classes, componentes, deployment, sequência), user stories quando '
            .'acompanhados de detalhes técnicos e testes de aceitação, user stories técnicas (technical user '
            .'stories, i.e., histórias que derivam diretamente de questões de implementação ou da arquitetura da solução '
            .'e não de funcionalidades).');
        $ft2->setActive(true);
        dump($ft2->save());

        //---------------- Estrutura de ciclo de desenvolvimento
        $ft2 = new Feature();
        $ft2->setIdPhase(4);
        $ft2->setName('Ciclo de desenvolvimento com teste integrados');
        $ft2->setShortdescription('Neste <b>ciclo de desenvolvimento</b> são realizados os processos de 
            produção do software e também é <b>incluído</b> o <b>processo de testes</b> de software abrangendo os mais 
            diversos tipos de testes.');
        $ft2->setLongdescription('Neste tipo de ciclo, são incluídos testes como:
        <br>
        · <b>Teste de Usabilidade:</b> O software é fácil de usar?
        <br>
        · <b>Teste de Confiabilidade:</b> O quanto podemos contar com o correto funcionamento do software? Ele é tolerante a falhas?
        <br>
        · <b>Teste de Portabilidade:</b> É possível utilizar o software em diversas plataformas com pequeno esforço de adaptação?
        <br>
        · <b>Teste de Acessibilidade:</b> Qualquer usuário, deficiente ou não, consegue utilizar a aplicação?');
        $ft2->setActive(true);
        dump($ft2->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(4);
        $ft2->setName('Ciclo de desenvolvimento sem testes');
        $ft2->setShortdescription('Neste <b>ciclo de desenvolvimento</b> são realizados os processos de 
            produção do software <b>separados</b> do <b>ciclo de testes</b> de software, o qual abrange os mais diversos tipos 
            de testes.');
        $ft2->setLongdescription('No ciclo de <b>testes</b>, são incluídos testes como:
        <br>
        · <b>Teste de Usabilidade:</b> O software é fácil de usar?
        <br>
        · <b>Teste de Confiabilidade:</b> O quanto podemos contar com o correto funcionamento do software? Ele é tolerante a falhas?
        <br>
        · <b>Teste de Portabilidade:</b> É possível utilizar o software em diversas plataformas com pequeno esforço de adaptação?
        <br>
        · <b>Teste de Acessibilidade:</b> Qualquer usuário, deficiente ou não, consegue utilizar a aplicação?');
        $ft2->setActive(true);
        dump($ft2->save());

        //---------------- Tempo de ciclo de desenvolvimento

        $ft2 = new Feature();
        $ft2->setIdPhase(5);
        $ft2->setName('Cálculo do próprio tempo de ciclo');
        $ft2->setShortdescription('Analisa-se a equipe disponível para desenvolvimento considerando suas
            bases históricas e o contexto em que o projeto está inserido, procurando definir um tempo de ciclo adequado 
            para este conjunto de fatores.
            <br>
            Ficou confuso? Veja mais para entender sobre bases históricas!');
        $ft2->setLongdescription('<b>Bases Históricas</b>
            <br>
            Uma base histórica tem como objetivo colecionar informações sobre os aspectos produtivos dentro de um 
            projeto. Em empresas focadas na produção de software a base pode conter, entre outras informações, o 
            <b>tempo</b> e o <b>esforço</b> para a execução das atividades do processo e o <b>custo</b> na produção dos 
            artefatos. ');
        $ft2->setActive(true);
        dump($ft2->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(5);
        $ft2->setName('Ciclo de 7 a 14 dias');
        $ft2->setShortdescription('Ciclo comumente utilizado nas <b>metodologias ágeis</b>, sendo 
            frequentemente aplicado nas sprints do <a href="https://www.desenvolvimentoagil.com.br/scrum/">Scrum</a>, por
            exemplo.');
        $ft2->setLongdescription('');
        $ft2->setActive(true);
        dump($ft2->save());

        //---------------- Métricas
        $ft2 = new Feature();
        $ft2->setIdPhase(6);
        $ft2->setName('Pontos por função');
        $ft2->setShortdescription('<b>Análise de pontos por função</b>
            <br>
            A análise por ponto de função tem como principal objetivo medir a funcionalidade do sistema tendo como 
            base a visão do usuário, de acordo com as seguintes características:
            <br>            
            É independente da tecnologia utilizada;
            <br>            
            Auxilia a produção de resultados consistentes;
            <br>
            Baseia-se na visão do usuário;
            <br>
            Tem significado para o usuário final;
            <br>
            Utiliza-se de estimativas;
            <br>
            Passível de automação;
            <br>            
            Dificuldade por possuir relativa subjetividade por refletir a visão do usuário.');
        $ft2->setLongdescription('A análise por ponto de função (APF) é uma das técnicas mais usadas 
            para se medir projetos de desenvolvimento de software. Seu principal objetivo é estabelecer um tamanho 
            considerando a funcionalidade implementada, sempre sob o ponto de vista do usuário. A medida 
            independe da tecnologia utilizada e/ou da linguagem de programação em que a funcionalidade foi 
            implementada.
            <br>
            Ainda precisa de ajuda? Acesse 
            <a href="https://www.devmedia.com.br/contagem-de-pontos-de-funcao/34390">aqui</a>!');
        $ft2->setActive(true);
        dump($ft2->save());


        $ft2 = new Feature();
        $ft2->setIdPhase(6);
        $ft2->setName('Pontos por caso de uso');
        $ft2->setShortdescription('<b>Análise de pontos por caso de uso</b>
            <br>
            O <b>processo de medição do PCU </b>(Pontos por Caso de Uso) consiste resumidamente em: 
            <br>
            <br>
            1 - Contar os <b>atores</b> e identificar sua complexidade;
            <br>
            2 - Contar os <b>casos de uso</b> e identificar sua complexidade;
            <br>
            3 - Calcular os PCUs não ajustados;
            <br>
            4 - Determinar o fator de <b>complexidade técnica</b>;
            <br>
            5 - Determinar o fator de <b>complexidade ambiental</b>;
            <br>
            6 - Calcular os PCUs ajustados; 
            <br>
            <br>            
            Com o resultado desta medição e sabendo-se a produtividade média da organização para produzir um PCU, pode-se então estimar o esforço total para o projeto.
');
        $ft2->setLongdescription('Saiba mais <a href="http://www.cs.cmu.edu/~jhm/DMS%202011/Presentations/Cohn%20-%20Estimating%20with%20Use%20Case%20Points_v2.pdf">aqui</a>');
        $ft2->setActive(true);
        dump($ft2->save());


     }
}
