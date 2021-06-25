// At5QTSInter3.spec.js created with Cypress
//
// Start writing your Cypress tests below!
// If you're unfamiliar with how Cypress works,
// check out the link below and learn how to write your first test:
// https://on.cypress.io/writing-first-test

describe('Teste ADM', ()=> {
    it('Fazer um Login como ADM', ()=> {
        cy.visit('http://localhost/interv1.35/paginas/logPage.php');
        cy.get('input[name="txEmail"]').type('gui@gmail.com')
        cy.get('input[name="txSenha"]').type('gui123')
        cy.get('input[name="entra"]').click()
        cy.get('a[href="../paginas/adm.php"]').click({force: true})
    })
})
