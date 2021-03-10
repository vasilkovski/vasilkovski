// write your code here
// use products array from the other file in here
// (yes you can use it, it doesn't matter if it's from another file)

let bikesCard = $("#bikes-cards")
let showAll = $("#showAll")
let male = $("#aMale")
let female = $("#aFemale")
let leGrand = $("#aLeGrand")
let explorer = $("#aExplorer")
let kross = $("#aKross")
let eBikes = $("#aEbikes")
let force = $("#aForce")
let ideal = $("#aIdeal")
let pony = $("#aPony")
let visitor = $("#aVisitor")



 $.get("https://json-project3.herokuapp.com/products", function (data) {
  data.forEach((el) => {
    bikesCard.append(
      `<div class="col-4">
        <div class="card-deck py-2 h-100">
        <div class="card">
          <img src="img/${el.image}.png" class="card-img-top p-5" alt="...">
          <div class="card-body bg-warning">
            <h5 class="card-title font-weight-bold">${el.name}</h5>
            <p class="card-text">${el.price}</p>
          </div>
        </div>
        
        </div>
      </div>
      </div>`
    );
  });
  
  let maleNum = 0;
  let femaleNum = 0;
  let leGrandBikesNum = 0
  let krossNum = 0
  let explorerNum = 0
  let visitorNum = 0
  let ponyNum = 0
  let forceNum = 0
  let eBikesNum = 0
  let idealNum = 0
  data.forEach((obj) => {
    if (obj.gender == "MALE") {
      maleNum++;
    } else if (obj.gender == "FEMALE") {
      femaleNum++;
    }
    if (obj.brand == "LE GRAND BIKES"){
        leGrandBikesNum++
    }
    else if (obj.brand == "KROSS" ){
        krossNum++
    }
    else if (obj.brand == "EXPLORER"){
        explorerNum++
    }
    else if(obj.brand == "VISITOR"){
        visitorNum++
    }
    else if (obj.brand == "PONY"){
        ponyNum++
    }
    else if (obj.brand == "FORCE"){
        forceNum++
    }else if (obj.brand == "E-BIKES"){
        eBikesNum++
    }else if (obj.brand == "IDEAL"){
        idealNum++
    }
   
  });
  $("#total").text(data.length);
  $("#male").text(maleNum);
  $("#female").text(femaleNum);
  $("#leGrand").text(leGrandBikesNum)
  $("#explorer").text(explorerNum)
  $("#kross").text(krossNum)
  $("#e-bikes").text(eBikesNum)
  $("#force").text(forceNum)
  $("#ideal").text(idealNum)
  $("#pony").text(ponyNum)
  $("#visitor").text(visitorNum)
  

$(".check").click(function(){
    $(".active").removeClass("active");
    $(this).addClass("active");
});

kross.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "KROSS"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    }
    
  })
  
})

leGrand.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "LE GRAND BIKES"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

explorer.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "EXPLORER"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

ideal.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "IDEAL"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

force.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "FORCE"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

pony.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "PONY"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

eBikes.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "E-BIKES"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

visitor.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.brand == "VISITOR"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})


male.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.gender == "MALE"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

female.click(function(){
  bikesCard.html("")
  data.filter(obj => {
    if (obj.gender == "FEMALE"){
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
    } 
  })
})

showAll.click(function(){
  bikesCard.html("")
  data.filter(obj => {
      bikesCard.append(
        `<div class="col-4">
          <div class="card-deck py-2 h-100">
          <div class="card">
            <img src="img/${obj.image}.png" class="card-img-top p-5" alt="...">
            <div class="card-body bg-warning">
              <h5 class="card-title font-weight-bold">${obj.name}</h5>
              <p class="card-text">${obj.price}</p>
            </div>
          </div>
          
          </div>
        </div>
        </div>`
      );
  })
})
console.log(data)
  
});
