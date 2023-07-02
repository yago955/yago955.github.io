$(document).ready(function() {
    // Handle click events on the links in the slider
    $('.nav-link').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var pageUrl = $(this).attr('href'); // Get the target page URL

        if (pageUrl === 'index.html') {
            // Load the initial content for the home page
            $('#content-container').html(`
        <h2>Welcome to my personal website!</h2>
        <p>Explore the various sections using the links on the left.</p>
      `);
        } else {
            // Load the content of the target page into the content container
            $('#content-container').load(pageUrl);
        }
    });
});
