

//PJESA PER TRANSTION DUKE PERDORUR BOTTOM UP DHE TOP DOWN ME OPACITY PER CDO IMAZH DUKE I MARRE
//TE GJITHA ME ANE TE NJE SELECTOR .EVENT-IMAGE DHE NJE FUNKSIONI "checkScroll()"
const images = document.querySelectorAll('.event-image');

function checkScroll() {
    images.forEach(image => {
        const imageTop = image.getBoundingClientRect().top;
        const imageBottom = image.getBoundingClientRect().bottom;

        
        if (imageTop < window.innerHeight && imageBottom >= 0) {
           
            image.style.transition = "opacity 0.5s ease-in-out";
            image.style.opacity = 1;
        }
    });
}







//FUNKSIONI PER TE SHKUAR NGA CONTACTS NGA NAV BAR TEK PJESA E FOOTER
document.addEventListener('DOMContentLoaded', function() {
    var scrollToContactsLinks = document.querySelectorAll('a[href="#contacts"]');

    scrollToContactsLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            var footer = document.getElementById('footer');
            footer.scrollIntoView({ behavior: 'smooth' });
        });
    });
});

window.addEventListener('scroll', checkScroll);
checkScroll(); 
