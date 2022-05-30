
document.querySelector("#marque").addEventListener("change",function(){
let marque = document.querySelector("#marque").value;
    const instance = axios.create();
      instance.get(`sellphone_tab.php?marque=${marque}`)
      .then(function (response) {
        console.log(response);
        let data = response.data;
        let modele = document.querySelector("#modele");
        
        modele.innerHTML = "";
        modele.innerHTML += `
            <option value="0">Modele</option>
        `

        data.forEach(function(item){
            modele.innerHTML += `
            <option value="${item.name}">${item.name}</option>
            `
        })
      })
      .catch(function (error) {
        console.log(error);
      })
      .then(function () {
        // always executed
      }); 
})

 
