
let sacola = document.querySelectorAll('.linkCarrinho-shop');

for (let i=0; i < sacola.length; i++) {
    sacola[i].addEventListener('click', () => {
        itens_sacola();
    });  
}

function onLoaditens_sacola() {
    let numeroProduto = localStorage.getItem('itens_sacola');
    if ( numeroProduto ) {
        document.querySelector('.idxli span').textContent = numeroProduto;

    }
}

function itens_sacola() {
    let numeroProduto = localStorage.getItem('itens_sacola');

    numeroProduto = parseInt(numeroProduto);

    if ( numeroProduto ) {
        localStorage.setItem('itens_sacola', numeroProduto + 1);
        document.querySelector('.idxli span').textContent = numeroProduto + 1;
    }else{
        localStorage.setItem('itens_sacola', 1);
        document.querySelector('.idxli span').textContent = 1;
    }
}


onLoaditens_sacola();


