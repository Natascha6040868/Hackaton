// Get the input field and set up event listener for input changes
const searchInput = document.getElementById('searchInput');

searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.trim().toLowerCase(); // Convert input value to lowercase for case-insensitive search
    const projectTitles = document.querySelectorAll('.box-topic'); // Assuming each project title has a class 'box-topic'
    const projectBoxes = document.querySelectorAll('.box'); // Assuming each project box has a class 'box'

    // Loop through each project title to check if it contains the search term
    projectTitles.forEach(function(title, index) {
        const titleText = title.textContent.toLowerCase(); // Get the text content of the project title

        // Check if project title contains the search term
        if (titleText.includes(searchTerm)) {
            projectBoxes[index].style.display = 'block'; // Show the corresponding project box
        } else {
            projectBoxes[index].style.display = 'none'; // Hide the corresponding project box if it doesn't match the search term
        }
    });
});
