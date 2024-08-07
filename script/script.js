function typeMask(){
    let mask = document.querySelector("input[name=keytype]:checked");
    let key = document.querySelector("#keyTransfer");
    key.disabled = false;
    

    if(mask.value == 1){ 
        key.setAttribute('type','text')
        //máscara para telefone
        key.addEventListener("input", () => {
            // limpar caracteres não numéricos
            if(key.type === "text"){
                const cleanField = key.value.replace(/\D/g, "").substring(0,11)
                        
                let numberArray = cleanField.split("");
    
                let numberFormat = "";
    
                if(numberArray.length > 0){
                    numberFormat += `(${numberArray.slice(0,2).join("")})`
                }
                if(numberArray.length > 2){
                    numberFormat += ` ${numberArray.slice(2,7).join("")}`
                }
                if(numberArray.length > 7){
                    numberFormat += `-${numberArray.slice(7,11).join("")}`
                }
                
                key.value = numberFormat;
            }
            else {

            }

        })
    }
    else if(mask.value == 2){
        key.setAttribute('type','email')
        key.value = ""
    }
    else if(mask.value == 3){
        key.setAttribute('type','text')
        
         key.addEventListener("input", () => {
            
            if(key.type === "text"){
                // limpar caracteres não numéricos
                const cleanField = key.value.replace(/\D/g, "").substring(0,11)
                            
                let numberArray = cleanField.split("");

                let numberFormat = "";

                if(numberArray.length > 0){
                    numberFormat += `${numberArray.slice(0,3).join("")}`
                }
                if(numberArray.length > 3){
                    numberFormat += `.${numberArray.slice(3,6).join("")}`
                }
                if(numberArray.length > 6){
                    numberFormat += `.${numberArray.slice(6,9).join("")}`
                }
                if(numberArray.length > 9){
                    numberFormat += `-${numberArray.slice(9,11).join("")}`
                }

                key.value = numberFormat;
            }
            else {}
         })
    }
    else if(mask.value == 4){
        key.setAttribute('type','text')
        
         key.addEventListener("input", () => {
            
            if(key.type === "text"){
                // limpar caracteres não numéricos
                const cleanField = key.value.replace(/\D/g, "").substring(0,14)
                            
                let numberArray = cleanField.split("");

                let numberFormat = "";

                if(numberArray.length > 0){
                    numberFormat += `${numberArray.slice(0,2).join("")}`
                }
                if(numberArray.length > 2){
                    numberFormat += `.${numberArray.slice(2,5).join("")}`
                }
                if(numberArray.length > 5){
                    numberFormat += `.${numberArray.slice(5,8).join("")}`
                }
                if(numberArray.length > 8){
                    numberFormat += `/${numberArray.slice(8,12).join("")}`
                }
                if(numberArray.length > 12){
                    numberFormat += `-${numberArray.slice(12,14).join("")}`
                }

                key.value = numberFormat;
            }
            else {}
         })
    }
}

const mascaraMoeda = (event) => {
    const onlyDigits = event.target.value
      .split("")
      .filter(s => /\d/.test(s))
      .join("")
      .padStart(3, "0")
    const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2)
    event.target.value = maskCurrency(digitsFloat)
  }
const maskCurrency = (valor, locale = 'pt-BR', currency = 'BRL') => {
    return new Intl.NumberFormat(locale, {
      style: 'currency',
      currency
    }).format(valor)
  }

 