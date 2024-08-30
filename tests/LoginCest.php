<?php

namespace Tests;

use Tests\Support\AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->fillField(['name' => 'email'], 'rafaela');
        $I->fillField(['name' => 'senha'], '1234');
        $I->click('.botao_login');
        $I->see('Fornecedor');
    }

    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        $I->fillField(['name' => 'email'], 'rafaela');
        $I->fillField(['name' => 'senha'], 'senhaerrada');
        $I->click('.botao_login');
        $I->see('Falha ao logar! Email ou senha incorretos');

    }
}