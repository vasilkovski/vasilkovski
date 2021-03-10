let budgetInput = $("#budget-input");
let budgetSubmit = $("#budget-submit");
let budget = $("#budget-amount");
let balance = $("#balance-amount");

let expenseSubmit = $("#expense-submit");
let expenseInputTitle = $("#expense-input");
let expenseInput = $("#amount-input");
let expenseAmount = $("#expense-amount");

function balanceColor() {
  if (balance.html() < 0) {
    $("#balance").css("color", "#b80c09");
  } else {
    $("#balance").css("color", "#317b22");
  }
}

budgetSubmit.on("click", function (event) {
  event.preventDefault();
  if (budgetInput.val() == "" || budgetInput.val() < 0) {
    $("#feedback-id").show();
    budgetInput.val("")
  } else {
    budget.text(parseInt(budgetInput.val()));
    balance.text(parseInt(budgetInput.val()) - expenseAmount.text());
    budgetInput.val("");
  }
  balanceColor();
});

let form = $("#budget-form");
form.on("mouseenter", function () {
  $("#feedback-id").hide();
});

let formEx = $("#expense-form");
formEx.on("mouseenter", function () {
  $("#expense-feedbeck").hide();
});

let divFour = $("#div-fourth");
let table = $("<table> </table");
table.addClass("text-center ml-5 w-100");
let th = $(
  "<th class='ml-5 p-2'>Expense Title</th><th class=' p-2 m-5'>Expense Value</th> "
);
table.append(th);
divFour.append(table);
table.hide();

expenseSubmit.on("click", function (event) {
  event.preventDefault();
  if (expenseInput.val() == "" || expenseInputTitle.val() == "") {
    $("#expense-feedbeck").show();
  } else {
    expenseAmount.html(
      parseInt(expenseInput.val()) + parseInt(expenseAmount.text())
    );
    balance.html(parseInt(balance.html()) - parseInt(expenseInput.val()));

    table.show();
    if ($(".editing").length > 0) {
      $(".editing td:nth-child(1)").text(expenseInputTitle.val());
      $(".editing td:nth-child(2)").text(expenseInput.val());
      $(".editing").removeClass("editing");
    } else {
      let row = $(
        `<tr> <td > ${expenseInputTitle.val()} </td><td>${expenseInput.val()}</td><td><i style="color:#05668d" class="fa fa-edit "></i><i class="ml-2 fa fa-trash"></i></td></tr>`
      );
      row.css("color", "#b80c09");
      table.append(row);
    }
  }

  expenseInput.val("");
  expenseInputTitle.val("");
  balanceColor();
});

document.addEventListener("click", function (event) {
  if (event.target.classList.contains("fa-trash")) {
    event.target.parentElement.parentElement.style.display = "none";
    balance.html(
      parseInt(balance.html()) +
        parseInt(event.target.parentElement.parentElement.children[1].innerText)
    );
    expenseAmount.html(
      parseInt(expenseAmount.text()) -
        parseInt(event.target.parentElement.parentElement.children[1].innerText)
    );
  }

  if (event.target.classList.contains("fa-edit")) {
    //  event.target.parentElement.parentElement.style.display = "none";
    expenseInputTitle.val(
      event.target.parentElement.parentElement.children[0].innerText
    );
    expenseInput.val(
      event.target.parentElement.parentElement.children[1].innerText
    );
    balance.html(
      parseInt(balance.html()) +
        parseInt(event.target.parentElement.parentElement.children[1].innerText)
    );
    expenseAmount.html(
      parseInt(expenseAmount.text()) -
        parseInt(event.target.parentElement.parentElement.children[1].innerText)
    );
    event.target.parentElement.parentElement.children[1].innerText = "";
    event.target.parentElement.parentElement.children[0].innerText = "";
    event.target.parentElement.parentElement.setAttribute("class", "editing");
    console.log(event.target.parentElement.parentElement);
  }
  balanceColor();
});
