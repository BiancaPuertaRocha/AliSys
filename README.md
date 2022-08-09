# AliSys
PHP system developed in 2017 for my second year in IT technical course

## Escopo
O sistema AliSys(Aliança System) tem como objetivo facilitar o gerenciamento de estoque, compras e vendas de comércios do ramo de temperos, como também facilitar a organização financeira para que o administrador possa tomar conhecimento do desempenho financeiro do negócio.
O cliente seleciona os produtos nas prateleiras podendo ser auxiliado por um funcionário. O funcionário registra os produtos, selecionados pelo cliente, no sistema, que determina o valor total da venda, baseado no preço, na quantidade definida de cada produto e permite que o funcionário dê um desconto ao cliente, se necessário. Para tanto, os produtos disponíveis precisam estar previamente cadastrados pelo código de barras e associados por categorias e unidades.
O sistema permite que o usuário (funcionário/administrador) cadastre as categorias e unidades que são associadas aos produtos para melhorar a organização dos mesmos e a precisão das consultas. As categorias podem ser alteradas, mas só podem ser excluídas se não houver produtos associados pois há uma preocupação com a segurança dos dados armazenados. Os produtos podem ter suas categorias alteradas a qualquer momento.
O usuário também pode cadastrar produtos, fornecedores e registrar compras e vendas, bem como visualizar relatórios de tais cadastros que podem ser gerados a qualquer momento para consulta. Os relatórios de vendas, compras, balanço e despesas tem filtros por data para ajudar no controle das informações e na consulta. 
O proprietário do negócio pode executar as mesmas funções do funcionário no sistema, mas o controle de despesas e funcionários só podem ser efetuados pelo mesmo. Por questões de segurança de dados dos próprios funcionários, apenas o administrador pode visualizar o relatório de funcionários.
Os usuários são responsáveis pela atualização dos seus dados no sistema, mas o administrador também pode fazer alterações nos cadastros de seus empregados. As demais funções podem ser executadas por qualquer usuário a qualquer momento. As despesas do estabelecimento podem ser lançadas no sistema para facilitar a contagem de balanço, ou seja, elas são lançadas pelo administrador após o pagamento ser efetuado.
O Aliança System é um sistema web que funciona somente na rede local de onde foi instalado, não permitindo acesso externo. Somente um usuário pode ser cadastrado como administrador e ter as funções do mesmo.

## Documentação [aqui](Documentacao_sistema_alisys2.pdf)
