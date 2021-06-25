//http://localhost/interv1.35/paginas/  cy.get('a[href="#"]').should()

describe('Teste Cadastro', ()=> {
    it('Fazer um Cadastro', ()=> {
        cy.visit('http://localhost/interv1.35/paginas/logPage.php');
        cy.contains('a').click()
        cy.get('input[name="CadastroNome"]').type('Bet')
        cy.get('input[name="CadastroEmail"]').type('gio@gmail.com')
        cy.get('input[name="CadastroSenha"]').type('rosaROSA30')
        cy.get('input[name="CadastroData"]').type('2021-06-25')
        cy.get('input[name="CadastroCEP"]').type('08210610')
        cy.get('input[name="CadastroEstado"]').type('SP')
        cy.get('input[name="ok"]').click()
    })
})
