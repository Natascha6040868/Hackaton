
  document.getElementById('searchInput').addEventListener('keyup', function() {
    const query = this.value.toLowerCase();
    const organizationSections = document.querySelectorAll('.organization-section');

    organizationSections.forEach(section => {
      const text = section.textContent.toLowerCase();
      if (text.includes(query)) {
        section.style.display = 'block';
      } else {
        section.style.display = 'none';
      }
    });
  });

