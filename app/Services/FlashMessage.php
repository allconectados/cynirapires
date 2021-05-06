<?php

namespace App\Services;

use RealRashid\SweetAlert\Facades\Alert;

class FlashMessage
{
    public function storeMessageSuccess()
    {
        return Alert::success('Sucesso!', 'Registro realizado com sucesso!');
    }

    public function storeMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível realizar o registro!');
    }

    public function updateMessageSuccess()
    {
        return Alert::success('Sucesso!', 'Registro atualizado com sucesso!');
    }

    public function updateMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível atualizar o registro!');
    }

    public function activeMessageSuccess()
    {
        return Alert::success('Sucesso!', 'Registro ativado com sucesso!');
    }

    public function activeMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível ativar o registro!');
    }

    public function destroyMessageSuccess()
    {
        return Alert::success('Sucesso!', 'Registro excluído com sucesso!');
    }

    public function destroyMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível excluído o registro!');
    }

    public function destroyMessageCommentError()
    {
        return Alert::error('Erro!', 'Não foi possível excluír o registro!');
    }

    public function deleteMessageSuccess()
    {
        return Alert::success('Sucesso!', 'Registro excluído com sucesso!');
    }

    public function deleteMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível excluído o registro!');
    }

    public function getIdMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível encotrar o registro!');
    }

    public function selectCheckbox()
    {
        return Alert::warning('Atenção!', 'Por favor, selecione um registro!');
    }
}
