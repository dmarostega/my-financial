import './bootstrap';

import Alpine from 'alpinejs';
// import mask from '@alpinejs/mask'
 
// Alpine.plugin(mask)

window.Alpine = Alpine;


document.addEventListener('alpine:init', () => {
    Alpine.data('moneyMask', () => ({
        value: '',
        applyMask() {
            this.value = maskMoney(this.value);
        }
    }));
});


const maskMoney = function (input) {
    // Remove tudo que não é dígito
    let v = input.replace(/\D/g, '');
    
    // Adiciona os zeros no início caso o valor seja menor que 3 dígitos (para garantir pelo menos R$ 0,00)
    v = (v / 100).toFixed(2) + '';
    
    // Substitui ponto por vírgula
    v = v.replace('.', ',');
    
    // Adiciona o separador de milhar
    v = v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    
    // Adiciona o prefixo "R$ "
    return 'R$ ' + v;
}


Alpine.start();



