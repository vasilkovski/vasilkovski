
let bikesCard = $("#bikes-cards");
let showAll = $("#showAll");
let male = $("#aMale");
let female = $("#aFemale");
let leGrand = $("#aLeGrand");
let explorer = $("#aExplorer");
let kross = $("#aKross");
let eBikes = $("#aEbikes");
let force = $("#aForce");
let ideal = $("#aIdeal");
let pony = $("#aPony");
let visitor = $("#aVisitor");

let allBikes = [];
let filteredBikes = [];

$.get("https://json-project3.herokuapp.com/products", function (data) {
  allBikes = data;
  createCards(data);
  fillBadges(data);
});

function createCards(data) {
  bikesCard.html("");
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
}

function filterBikesGender(query) {
  let bikesGender = allBikes.filter((bike) => bike.gender === query);
  createCards(bikesGender);
}

function filterBrand(query) {
  let bikesBrand = allBikes.filter((bike) => bike.brand === query);
  createCards(bikesBrand);
}

$(".gender").click(function (e) {
  e.preventDefault();
  let inputVal = $(this).text().toUpperCase();

  filterBikesGender(inputVal);
});

$(".brand").click(function (e) {
  e.preventDefault();
  let inputVal = $(this).text().toUpperCase();
  filterBrand(inputVal);
});
$(".show").click(function () {
  createCards(allBikes);
});

let maleNum = 0;
let femaleNum = 0;
let leGrandBikesNum = 0;
let krossNum = 0;
let explorerNum = 0;
let visitorNum = 0;
let ponyNum = 0;
let forceNum = 0;
let eBikesNum = 0;
let idealNum = 0;


function fillBadges(array) {
  array.forEach((obj) => {
    if (obj.gender == "MALE") {
      maleNum++;
    } else if (obj.gender == "FEMALE") {
      femaleNum++;
    }
    if (obj.brand == "LE GRAND BIKES") {
      leGrandBikesNum++;
    } else if (obj.brand == "KROSS") {
      krossNum++;
    } else if (obj.brand == "EXPLORER") {
      explorerNum++;
    } else if (obj.brand == "VISITOR") {
      visitorNum++;
    } else if (obj.brand == "PONY") {
      ponyNum++;
    } else if (obj.brand == "FORCE") {
      forceNum++;
    } else if (obj.brand == "E-BIKES") {
      eBikesNum++;
    } else if (obj.brand == "IDEAL") {
      idealNum++;
    }
  });
  $("#total").text(allBikes.length);
  $("#male").text(maleNum);
  $("#female").text(femaleNum);
  $("#leGrand").text(leGrandBikesNum);
  $("#explorer").text(explorerNum);
  $("#kross").text(krossNum);
  $("#e-bikes").text(eBikesNum);
  $("#force").text(forceNum);
  $("#ideal").text(idealNum);
  $("#pony").text(ponyNum);
  $("#visitor").text(visitorNum);
}

$(".check").click(function () {
  $(".active").removeClass("active");
  $(this).addClass("active");
});
