$(function () {
  let car1 = $(".car1");
  let car2 = $(".car2");
  let overlay = $("#overlay");
  let count = 4;
  let carWidth = $(".car1").width();
  let trackWidth = $("#race").width() - carWidth;
  let winner = false;
  let interval;
  let start = $("#start");
  let startAgain = $("#start_again");

  let random = function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
  };
  // localStorage.clear();
  let firstCarTime = random(3000);
  let secondCarTime = random(3000);

  function findWinner(carWinner) {
    if (!winner) {
      winner = carWinner;
      showOverlay();
      showFlag();
    } else {
      winner = "Second";
      $("#start").removeAttr("disabled");
      $("#start_again").removeAttr("disabled");
    }
  }

  function raceCars() {
    car1.animate(
      {
        left: trackWidth,
      },
      firstCarTime,
      function () {
        findWinner("First");
        $(".car-one-time").prepend(
          `<tr><th>Finished in: <span class="white">${winner}</span> place with a time of:<span class="white">${firstCarTime}</span> miliseconds</th></tr>`
        );
        setCarOneLocalStorage();
      }
    );
    car2.animate(
      {
        left: trackWidth,
      },
      secondCarTime,
      function () {
        findWinner("First");
        $(".car-two-time").prepend(
          `<tr><th>Finished in:<span class="red">${winner}</span> place with a time of:<span class="red">${secondCarTime}</span> miliseconds</th></tr>`
        );
        setCarTwoLocalStorage();
      }
    );
  }

  function carsBack() {
    car1.css({
      left: "0",
    });
    car2.css({
      left: "0",
    });
  }
  function showOverlay() {
    overlay.css({
      display: "block",
      opacity: "1",
    });
  }
  function removeOverlay() {
    overlay.css({
      display: "none",
      opacity: "0",
    });
    $(".count").text("");
    $(".finish").attr("src", "");
  }

  function countDown() {
    interval = setInterval(function () {
      if (count > 1) {
        count--;
        showOverlay();
        $(".count").text(count);
      } else if (count == 1) {
        removeOverlay();
        clearInterval(interval);
        raceCars();
      }
    }, 1000);
  }
  function showFlag() {
    $(".finish").attr("src", "img/finish.gif");
  }

  start.on("click", function () {
    start.attr("disabled", true);
    startAgain.attr("disabled", true);
    countDown();
  });
  startAgain.on("click", function () {
    removeOverlay();
    carsBack();
    winner = false;
    count = 4;
    firstCarTime = random(3000);
    secondCarTime = random(3000);
  });

  function setCarOneLocalStorage() {
    let carOneDetails = {
      carOnePlace: $(".car-one-time tr").find("span").eq(0).text(),
      carOneTime: $(".car-one-time tr").find("span").eq(1).text(),
    };

    window.localStorage.setItem("carOneDetails", JSON.stringify(carOneDetails));
  }

  function setCarTwoLocalStorage() {
    let carTwoDetails = {
      carTwoPlace: $(".car-two-time tr").find("span").eq(0).text(),
      carTwoTime: $(".car-two-time tr").find("span").eq(1).text(),
    };

    window.localStorage.setItem("carTwoDetails", JSON.stringify(carTwoDetails));
  }

  function createResultTable() {
    let carOneDetails = localStorage.getItem("carOneDetails");
    let carTwoDetails = localStorage.getItem("carTwoDetails");
    carOneDetails = JSON.parse(carOneDetails);
    carTwoDetails = JSON.parse(carTwoDetails);

    if(window.localStorage.length == ""){
      carOneDetails = ""
      carTwoDetails = ""
    }else{

      if (
        carOneDetails.carOnePlace &&
        carOneDetails.carOneTime &&
        carTwoDetails.carTwoPlace &&
        carTwoDetails.carTwoTime
      ) {
        $(".local-storage")
          .append(`<h3 class="padding">Results from previous time you played this game:</h3>
        <table class="table table-bordered">
          <tbody>
          <tr><th><span class="white">Car 1</span> finished in: <span class="white">${carOneDetails.carOnePlace}</span> place with a time of:<span class="white">${carOneDetails.carOneTime}</span> miliseconds</th></tr>
          <tr><th><span class="red">Car 2</span> finished in: <span class="red">${carTwoDetails.carTwoPlace}</span> place with a time of:<span class="red">${carTwoDetails.carTwoTime}</span> miliseconds</th></tr>
          </tbody>
        </table>`);
      }
    }
    
  }
  createResultTable();

  
});
