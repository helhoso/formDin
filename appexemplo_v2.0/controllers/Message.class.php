<?php

class Message {
    const GENERIC_SAVE   = 'Registro gravado com sucesso!';
    const GENERIC_INSERT = 'Registro criado com sucesso!';
    const GENERIC_UPDATE = 'Registro alterado com sucesso!';
    const GENERIC_DELETE = 'Registro excluído com sucesso!';
    const GENERIC_EXEC   = 'Ação executada com sucesso!';

    const TYPE_NOT_INT = 'Tipo não númerico! ';

    const ERROR_PESSOA_CPFCNPJ = 'Já existe outra pessoa com o CPF/CNPJ informado';
    const ERROR_CAMPO_OBRIGATORIO = 'Campo Obrigatório: ';
}
