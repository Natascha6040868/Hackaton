document.addEventListener("DOMContentLoaded", function () {
  // Adding click event listeners to each dashboard card
  var cards = document.querySelectorAll(".dashboard-card");
  cards.forEach(function (card, index) {
    card.addEventListener("click", function () {
      alert("Card " + (index + 1) + " clicked!");
    });
  });

  // Function to add a new row to the table
  function addTableRow(data) {
    var table = document.querySelector(".table-dashboard");
    var newRow = table.insertRow();
    data.forEach(function (cellData) {
      var cell = newRow.insertCell();
      cell.textContent = cellData;
    });
  }

  // Example: Dynamically adding data to the table
  var sampleData = [
    ["Data 7", "Data 8", "Data 9"],
    ["Data 10", "Data 11", "Data 12"],
  ];

  sampleData.forEach(function (rowData) {
    addTableRow(rowData);
  });
});
