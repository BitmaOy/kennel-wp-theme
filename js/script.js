function togglePuppies(className) {
        var elements = document.getElementsByClassName(className);
        for (let element of elements) {
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    }