# Teste Titan Software
# Para instalar siga os passos abaixo
# 1° PASSO: BAIXAR O REPOSITORIO.
# 2° PASSO: COLOCAR A PASTA DO SISTEMA DENTRO DE UM SERVIDOR APACHE.
# 3° PASSO: INICIE O SERVIDOR APACHE E O SERVIDOR MYSQL.
# 4° PASSO: CRIAR O BANCO DE DADOS COM O CÓDIGO CONTIDO NO ARQUIVO Config\DatabaseCreatEScript.
# 5° PASSO: CONFIGURAR A CONEXÃO COM O BANCO DE DADOS NO ARQUIVO Config\database.php.
# 6° PASSO: Atravez do servidor apache apache acesso o arquivo Frontend/productList.htm.

# Agradecimento especial ao site https://www.visualdicas.com.br/scripts/css/35-botoes-de-alerta-classes-css 
# Local onde retirei o código css para os botões

# SOBRE O SISTEMA:
  O sistema foi desenvolvido com foco no backend e em sua manutenibilidade, para isso foi desenvolvido um router semelhante a routers utilizados em outras linguagens.
  O sistema funciona  baseado no MVC utilizando uma custumização adicionando mais camadas para melhor separação de responsabilidades.
  Apesar do foco em manutenibilidade o sistema não contem todas as validações principalmente de campos, e mensagens de api.
  Devido a não utilização de framework e o intuito de desenvolver uma SPA sem frameworks, o código frontend ficou confuso devido a grande quantidade de linhas para manipulação da DOM
  
