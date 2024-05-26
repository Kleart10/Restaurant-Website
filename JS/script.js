document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reservationForm');
    const messageElement = document.getElementById('reservationMessage');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('php/reserve.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            if (data.success) {
                // If reservation was successful, display the success message
                messageElement.innerHTML = '<p >' + data.message + '</p>';
                form.reset(); // Reset the form inputs
            } else {
                // If reservation failed, display the error message
                messageElement.innerHTML = '<p style="color: red;">' + data.message + '</p>';
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

var videoEle = document.getElementById("videopromo");
videoEle.onpause = () => {
  videoEle.play();
};
//FUNKSIONI PER TE SHKUAR NGA CONTACTS NGA NAV BAR TEK PJESA E FOOTEr
document.addEventListener('DOMContentLoaded', function() {
    var scrollToContactsLinks = document.querySelectorAll('a[href="#contacts"]');

    scrollToContactsLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default anchor behavior
            var footer = document.getElementById('footer');
            footer.scrollIntoView({ behavior: 'smooth' }); // Scroll to the footer smoothly
        });
    });
});