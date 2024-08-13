import './bootstrap';

import Alpine from 'alpinejs';
// import mask from '@alpinejs/mask'
 
// Alpine.plugin(mask)

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('moneyMask', (value) => ({
        value: value ? maskMoney(value) : '',
        applyMask() {
            this.value = maskMoney(this.value);
        }
    }));
});


const maskMoney = function (input) {

    console.log("Clicou: " + input)
        
    let v = input.replace(/\D/g, '');
    let hasDecimalSeparator = input.includes('.') || input.includes(',');
    let numberValue = parseFloat(v);

    // if(hasDecimalSeparator) {
        numberValue = numberValue / 100;
    // }

    let formattedValue = numberValue.toLocaleString('pt-BR', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
    console.log("greou: " + formattedValue + "\n\n")

    return 'R$ ' + formattedValue;
}

Alpine.start();



