//Gets a copy of the block it should add
let linkblocks = document.querySelectorAll('.linkblock');
renderRemoveButtons(linkblocks);

let blockcount = linkblocks.length;
let linkblock = linkblocks[0].cloneNode(true);
//Gets the holder in which it should be added.
let linkholder = document.querySelector('#links');
//Gets the button on which the event should be called
let addButton = document.querySelector('#addButton');
let error = document.querySelector('#add-error')

addButton.addEventListener('click', () => {
    error.textContent = ''
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
        if (hasEmpty) return
    })
    
    if (hasEmpty) {
        error.textContent = 'Vul eerst de lege velden voordat een nieuwe wordt toegevoegd.'
        return
    }
    if (blockcount >= 10) {
        error.value = 'Maximaal aantal homepagina linkjes bereikt'
        return
    }
    
    let newblock = linkblock.cloneNode(true)
    //edit needed props on the new block
    let fields = newblock.querySelectorAll('.link-input')
    fields[0].name = `links[${blockcount + 1}][name]`
    fields[0].value = ''
    fields[1].name = `links[${blockcount + 1}][url]`
    fields[1].value = ''
    
    linkholder.appendChild(newblock);
    renderRemoveButtons(document.querySelectorAll('.linkblock'));
    blockcount++
});

//Remove empty blocks on form submit
let form = document.querySelector('#settingform');
form.addEventListener('submit', (e) => {
    let blocks = document.querySelectorAll('.linkblock');
    //wont add a new one when there is still one empty
    blocks.forEach(el => {
        let allEmpty = true;
        let fields = el.querySelectorAll('.link-input')
        fields.forEach(f => {
            if (f.value != '') {
                allEmpty = false;
            }
        })

        if (allEmpty) {
            blocks[0].parentNode.removeChild(el);
        }
    }) 
});

//Give every linkblock a removeicon
function renderRemoveButtons(blocks) {
    blocks.forEach((el) => {
        console.log(el);
        let icon = document.createElement('icon');
        icon.classList.add('fas', 'fa-times' ,'fa-lg' , 'remove-button')

        icon.addEventListener('click', () => {
            blocks[0].parentNode.removeChild(el);
            blocks = document.querySelectorAll('.linkblock');
        });

        let existing = el.querySelectorAll('.remove-button')
        existing.forEach(b => {
            el.removeChild(b)
        })    
        el.appendChild(icon)
    })
}

