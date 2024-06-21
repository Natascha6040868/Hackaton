// document.addEventListener("DOMContentLoaded", function () {
//   // İlgili elementleri seç
//   let opTijdIngeleverdBox = document.querySelector(".box .box-topic");
//   let opTijdIngeleverdNumber = document.querySelector(".box .number");
//   let opTijdIngeleverdIndicator = document.querySelector(".box .indicator");

//   // Op tijd Ingeleverd kutusunu göster
//   opTijdIngeleverdBox.style.display = "block";
//   opTijdIngeleverdNumber.style.display = "block";
//   opTijdIngeleverdIndicator.style.display = "block";

//   // Diğer kutuları gizle
//   let teLaatIngeleverdBox = document.querySelector(".sales-boxes");
//   teLaatIngeleverdBox.style.display = "none";
// });

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};
