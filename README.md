# 🐾 Petshop

Sistema web de cadastro e agendamento para um petshop, com foco em modelagem e documentação do banco de dados.

## Funcionalidades
- Cadastro de **clientes** (com verificação de CPF já cadastrado)
- Cadastro de **pets** ligados ao dono (espécie, porte e nascimento)
- Cadastro de **serviços** (preço e duração)
- **Agendamentos** de serviços para cada pet, com status (agendado, concluído, cancelado)

## Tecnologias
- PHP
- MySQL (chaves estrangeiras, `ENUM` e `CHECK`)
- HTML e CSS

## Banco de dados
Tabelas `cliente`, `pet`, `servico` e `agendamento` (script em [`db.sql`](db.sql)).

## Como executar
1. Instale o [XAMPP](https://www.apachefriends.org/) (Apache + MySQL).
2. Clone este repositório dentro da pasta `htdocs`.
3. No phpMyAdmin, importe o arquivo `db.sql`.
4. Confira os dados de conexão em `db.php`.
5. Acesse o projeto pelo `http://localhost/`.

---
Desenvolvido por [Gustavo Baumann](https://www.linkedin.com/in/gustavo-baumann-92b1442a1/).
