############################
EVA - ACADEMIC EVENT SYSTEM
EVA - SISTEMA DE EVENTOS ACADÊMICOS
############################

S-EVA: Um Sistema para Controle de eventos acadêmicos baseado em um projeto de
Base de Dados Relacional.

Trabalho de conclusão de curso 
apresentado ao curso de Licenciatura em 
Computação, como requisito parcial para 
conclusão do curso. Área de concentração: 
Banco de Dados/Programação Web.

S-EVA: A System for Control of academic events based on a project of
Relational Database

Completion of course work
presented to the Degree course in
Computing, as a partial requirement for
completion of the course. Concentration area:
Database / Web Programming.

*******************
Release Information
*******************

Este trabalho modela um sistema de eventos acadêmicos na forma de um projeto de base de 
dados relacional. Dessa forma, os maiores desafios envolvem a transformação de requisitos 
do domínio em restrições do sistema. A solução proposta é realizada em duas etapas: (i)
modelagem lógica e física da base de dados, (ii) criação da interface com o usuário. A 
primeira etapa consiste na interpretação dos requisitos do sistema por meio da notação do 
Modelo Entidade-Relacionamento e seu mapeamento e normalização em uma base de dados 
relacional. Sobre esta base, são implementadas as consultas que correspondem aos relatórios 
esperados pelos usuários do sistema. Por outro lado, a segunda etapa da proposta consiste na 
criação de uma interface gráfica para a inserção de dados na base relacional e a visualização 
dos relatórios. Para otimizar e permitir reuso de código, a solução é proposta sob o padrão de 
desenvolvimento MVC (Modelo-Vista-Controlador), onde a interface gráfica é desacoplada 
da base de dados. O sistema S-EVA (Sistema de Eventos Acadêmicos) é um protótipo que 
implementa a solução proposta, no qual o SGBD MySQL® é usado para armazenar a base de 
dados e o framework CodeIgniter® é empregado para a criação da interface gráfica. 
Adicionalmente, a solução proposta contempla a transferência e armazenamento de dados 
entre uma Interface de Programa de Aplicações (API) de terceiros e a base de dados de forma 
que o processo de autenticação possa ser realizado por um agente externo. Para a 
implementação particular deste trabalho, o protótipo S-EVA utiliza a API disponibilizada pelo 
Facebook®. Atualmente, o S-EVA se encontra em fase de testes com usuários, cujo objetivo é 
validar o protótipo para uso na próxima Semana da Computação do INFES em 2017. 

This study proposes a solution for the modeling of academic events based on the project of a 
relational database. Therefore, the major challenges are relate to the transformation of domain 
requirements into system constraints. The solution relies on two steps: (i) logical and physical 
modeling of the database, (ii) creation of the user interface. The first step consists in the 
diagram of the system requirements through the Entity-Relationship Model notation and its 
mapping and normalization as a relational database. Thereafter, system implements user
demanded reports by means of SQL queries. On the other hand, the second step of the 
proposal consists in the creation of a graphical interface for the insertion of data in the 
relational database, which enables the further visualization of the reports. For code 
optimization and reuse, the solution is implemented under the MVC pattern (Model-View
Controller), where the graphical interface is decoupled from the database. The S-EVA system 
is a prototype that implements our solution, in which DBMS MySQL is employed for data 
storage the CodeIgniter® framework is used for the creation of the graphical interface. 
Additionally, our solution includes data transfer and storage between an Application Program 
Interface (API) and the prototype in such a way the authentication process can be carried out 
by an external agent. In the particular implementation of this study, S-EVA prototype 
employs the Facebook® API. Presently, S-EVA is under tests, whose goal is the validation of 
the prototype for use in the 2017 INFES Computing Week. 

*******************
Server Requirements
*******************

PHP version 5.1.
Mysql version 5.1.
CodeIgniter framework version 3.1.

