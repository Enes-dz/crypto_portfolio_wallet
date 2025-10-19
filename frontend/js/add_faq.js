function toggleAccordion() {
    const accordionHeaders = document.querySelectorAll(".accordion-header");
        
    accordionHeaders.forEach(header => {
        header.addEventListener("click", () => {
            const content = header.nextElementSibling;
            header.classList.toggle("active");
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }

            const allContents = document.querySelectorAll(".accordion-content");
            allContents.forEach(otherContent => {
                if (otherContent !== content) {
                    otherContent.style.display = "none";
                }
            });
        });
    });
};
