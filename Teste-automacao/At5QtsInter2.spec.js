// At5QtsInter2.spec.js created with Cypress
//
// Start writing your Cypress tests below!
// If you're unfamiliar with how Cypress works,
// check out the link below and learn how to write your first test:
// https://on.cypress.io/writing-first-test

describe('Teste Login', ()=> {
    it('Fazer um Login', ()=> {
        cy.visit('http://localhost/interv1.35/paginas/logPage.php');
        cy.get('input[name="txEmail"]').type('gio@gmail.com')
        cy.get('input[name="txSenha"]').type('rosaROSA30')
        cy.get('input[name="entra"]').click()
    })
})
