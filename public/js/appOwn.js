// Scroll certain amounts from current position
window.scrollBy({
    top: 100, // could be negative value
    left: 0,
    behavior: "smooth"
});

// Animacje na stronie
if (window.innerWidth > 576) {
    window.onscroll = function() {
        scrollFunction();
        animationShow();
    };
}

function animationShow() {
    // Pojawianie się elementów podczas skrolowania
    //
    //
    var scroll =
        window.requestAnimationFrame ||
        // IE Fallback
        function(callback) {
            window.setTimeout(callback, 1000 / 60);
        };

    var elementsToShow = document.querySelectorAll(".show-on-scroll");

    if (elementsToShow) {
        for (let index = 0; index < elementsToShow.length; index++) {
            if (index % 2 == 0) {
                if (
                    !elementsToShow[index].classList.contains("inline-PhotoX")
                ) {
                    elementsToShow[index].classList.add("inline-PhotoX");
                }
            } else {
                if (
                    !elementsToShow[index].classList.contains("inline-PhotoY")
                ) {
                    elementsToShow[index].classList.add("inline-PhotoY");
                }
            }
        }
    }

    Array.prototype.forEach.call(elementsToShow, function(element) {
        if (isElementInViewport(element)) {
            element.classList.add("is-visible");
        } else {
            element.classList.remove("is-visible");
        }
    });

    // Helper function from: http://stackoverflow.com/a/7557433/274826
    function isElementInViewport(el) {
        // special bonus for those using jQuery
        if (typeof jQuery === "function" && el instanceof jQuery) {
            el = el[0];
        }
        var rect = el.getBoundingClientRect();
        return (
            (rect.top <= 0 && rect.bottom >= 0) ||
            (rect.bottom >=
                (window.innerHeight || document.documentElement.clientHeight) &&
                rect.top <=
                    (window.innerHeight ||
                        document.documentElement.clientHeight)) ||
            (rect.top >= 0 &&
                rect.bottom <=
                    (window.innerHeight ||
                        document.documentElement.clientHeight))
        );
    }
}

function scrollFunction() {
    // Kolor menu
    if (window.innerWidth > 576) {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            document.getElementById("nav").style.backgroundColor = "white";
            document.getElementById("nav").style.boxShadow =
                "5px 0 10px 2px rgb(129, 129, 129)";
            document.getElementById("nav").style.textShadow = "";
        } else {
            document.getElementById("nav").style.backgroundColor =
                "rgba(255, 255, 255, 0.0)";
            document.getElementById("nav").style.boxShadow = "";
            document.getElementById("nav").style.textShadow =
                "0 0 5px rgb(145, 145, 145";
        }
    } else {
        document.getElementById("nav").style.backgroundColor = "white";
        document.getElementById("nav").style.boxShadow =
            "5px 0 10px 2px rgb(129, 129, 129)";
        document.getElementById("nav").style.textShadow = "";
    }

    if (document.getElementById("goTop")) {
        if (
            document.body.scrollTop > 150 ||
            document.documentElement.scrollTop > 150
        ) {
            document.getElementById("goTop").style.opacity = "0.6";
        } else {
            document.getElementById("goTop").style.opacity = "0";
        }
    }
}
