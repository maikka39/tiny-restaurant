import 'keen-slider/keen-slider.min.css'
import KeenSlider from 'keen-slider'

const slider = new KeenSlider('#carousel', {
    created: function (instance) {
        document
            .getElementById("arrow-left")
            .addEventListener("click", function () {
                instance.prev()
            })

        document
            .getElementById("arrow-right")
            .addEventListener("click", function () {
                instance.next()
            })
        const dots_wrapper = document.getElementById("dots")
        const slides = document.querySelectorAll(".keen-slider__slide")
        slides.forEach(function (t, idx) {
            const dot = document.createElement("button")
            dot.classList.add("dot")
            dots_wrapper.appendChild(dot)
            dot.addEventListener("click", function () {
                instance.moveToSlide(idx)
            })
        })
        updateClasses(instance)
    },
    slideChanged(instance) {
        updateClasses(instance)
    },
});

function updateClasses(instance) {
    const slide = instance.details().relativeSlide
    const arrowLeft = document.getElementById("arrow-left")
    const arrowRight = document.getElementById("arrow-right")
    slide === 0
        ? arrowLeft.classList.add("arrow--disabled")
        : arrowLeft.classList.remove("arrow--disabled")
    slide === instance.details().size - 1
        ? arrowRight.classList.add("arrow--disabled")
        : arrowRight.classList.remove("arrow--disabled")

    const dots = document.querySelectorAll(".dot")
    dots.forEach(function (dot, idx) {
        idx === slide
            ? dot.classList.add("dot--active")
            : dot.classList.remove("dot--active")
    })
}