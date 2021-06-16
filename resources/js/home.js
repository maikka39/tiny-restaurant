document.querySelector('#video-modal-button').addEventListener('click', () => {
    let modal = document.querySelector('#video-modal')
    if(modal) {
        if(modal.classList.contains('is-active')) {
            modal.classList.add('is-active')
        } else {
            modal.classList.remove('is-active')
        }    
    } 
})
    