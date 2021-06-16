window.onload = function () {
    let video = document.querySelector('#homepage-video')

    document.querySelector('#video-modal-open').addEventListener('click', () => {
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
}


    