window.onload = function () {
    let video = document.querySelector('.video-container > iframe')

    let openBtn = document.querySelector('#video-modal-open')
    if(openBtn != null) {
        openBtn.addEventListener('click', () => {
            let modal = document.querySelector('#video-modal')

            if (modal) {
                if(modal.classList.contains('is-active')) {
                    modal.classList.remove('is-active')
                    document.body.style.overflow = "auto"; 
                    document.body.style.height = "auto";
                    video.src = video.src
                } else {
                    modal.classList.add('is-active')
                    document.body.style.overflow = "hidden";
                    document.body.style.height = "100vh";
                }    
            } 
        })

        document.querySelector('#video-modal-close').addEventListener('click', () => {
            let modal = document.querySelector('#video-modal')
            if (modal) {
                modal.classList.remove('is-active')
                document.body.style.overflow = "auto"; 
                document.body.style.height = "auto";
                video.src = video.src
            } 
        })

        let modal = document.querySelector('#video-modal')
        if(modal) {
            modal.addEventListener('click', () => {
                modal.classList.remove('is-active')
                document.body.style.overflow = "auto"; 
                document.body.style.height = "auto";
                video.src = video.src
            })
        }
    }

    //IMG SLIDESHOW

    //Init
    let container = document.querySelector('[data-slideshow]');
    let slides = container.querySelectorAll('img');
    slides.forEach((slide, i) => {
        slide.setAttribute('data-slide', i)
    })
    let imagesloaded = slides.length;
    let currentIndex = slides.length - 1;
    let slideshow = null;
    let prevSlide = null;
    let nextSlide = null;
    setNextSlide();
    if(slides.length > 1) {
        playSlideshow();
    }

    function loadImage() {
        imagesLoaded += imagesloaded;
        if (imagesLoaded >= slides.length) {
            
        }
    }

    function playSlideshow() {
        
        slideshow = window.setInterval(() => {
            performSlide()
        }, 3500)
    }

    function performSlide() {
        if (prevSlide != null) {
            prevSlide.classList.remove('prev')
            prevSlide.classList.remove('fade-out')
        }


        nextSlide.classList.remove('next')
        prevSlide = nextSlide
        prevSlide.classList.add('prev')
        currentIndex += 1
        
        if (currentIndex >= slides.length) {
            currentIndex = 0
        }
        setNextSlide()
        prevSlide.classList.add('fade-out')
    }

    function setNextSlide() {
        nextSlide = container.querySelector(`[data-slide="${currentIndex}"]`);
        nextSlide.classList.add('next')
    }
}   