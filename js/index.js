fetch('assets/data.json')
    .then(results => results.json())
    .then(results => results.forEach(function(item) {
        vr = item.table_name + '-'  + item.id_item;
        vr = vr.replace(/\s/g, '');
        cla = vr;
        try {
          document.querySelector('#'+cla).addEventListener("click",function(){
            a = $(this).children('img')[0].getAttribute('src');
            val = $(this).data('value')
            if (a == 'assets/like.png') {
                $(this).children('img')[0].src="assets/dislike.png";
                val = val + '-' + 'dislike';
            }else {
                // $(this)[0].children('img')[0].src="assets/like.png";
                a = $(this).children('img')[0].src="assets/like.png";
                val = val + '-' + 'like';
            }
            
            // console.log(val);
            const instance = axios.create();
              instance.get(`index.php?like=${val}`)
              .then(function (response) {
                
              })
              .catch(function (error) {
                console.log(error);
              })
              .then(function () {
                // always executed
              }); 
        })
        }
        catch(err) {
          //pass
        }
        
        
    }))
    // .then(console.log);

// const obj = JSON.parse('data.json');
// data = JSON.toString(x);
// l = JSON.parse(data);
// console.log(obj);


// document.querySelector(".like").addEventListener("click",function(){
//     let like = document.querySelector(".like");
//         like = $('.like').data('value');
//         const instance = axios.create();
//           instance.get(`index.php?like=${like}`)
//           .then(function (response) {
//             console.log(response);
//           })
//           .catch(function (error) {
//             console.log(error);
//           })
//           .then(function () {
//             // always executed
//           }); 
//     })