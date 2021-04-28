//Gets a copy of the block it should add
let linkblocks = document.querySelectorAll('.linkblock');
let blockcount = linkblocks.length;
let linkblock = linkblocks[linkblocks.length - 1].cloneNode(true);
//Gets the holder in which it should be added.
let linkholder = document.querySelector('#links');
//Gets the button on which the event should be called
let addButton = document.querySelector('#addButton');
let error = document.querySelector('#add-error')

addButton.addEventListener('click', () => {
    let blocks = document.querySelectorAll('.linkblock');
    let hasEmpty = false;
    //wont add a new one when there is still one empty
    blocks.forEach(el => {
        let fields = el.querySelectorAll('.link-input')
        fields.forEach(f => {
            if (f.value == null || f.value == '') {
                hasEmpty = true;
                return
            }
        })
        if(hasEmpty) return
    })
    
    if (hasEmpty) {
        error.textContent = 'Vul eerst de lege velden voordat een nieuwe wordt toegevoegd.'
        return
    }
    if(blockcount >= 10) {
        error.value = 'Maximaal aantal homepagina linkjes bereikt'
        return
    }
    
    let newblock = linkblock.cloneNode(true)
    //edit needed props on the new block
    let fields = newblock.querySelectorAll('.link-input')
    fields[0].name = `links[${blockcount + 1}][name]`
    fields[1].name = `links[${blockcount + 1}][url]` 
    
    linkholder.appendChild(newblock);
    blockcount++

})