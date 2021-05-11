let slideshows = []

window.addEventListener('load', () => {
  for (const el of document.getElementsByClassName("slideshow")) {
    if (el.getAttribute("rendered") == "true") continue
    el.setAttribute("rendered", "true")

    let ss = new slideshow(el)

      ss.setup()
      ss.showSlides()
      ss.autoScroll()

    slideshows.push(ss)
  }
})


function slideshow(el) {
  this.index = 0
  this.el = el

  this.setup = () => {
    var prev = this.el.getElementsByClassName('prev')[0]
    var next = this.el.getElementsByClassName('next')[0]

    if (prev == null || next == null) return

    prev.addEventListener('click', () => this.showSlides(this.index--))
    next.addEventListener('click', () => this.showSlides(this.index++))

    this.slides = this.el.getElementsByClassName("mySlides")
    let dots = this.el.getElementsByClassName('slideshowdots')[0]

    for (let i = 0; i < this.slides.length; i++) {
      if (i >= 10)
        break

      let dot = document.createElement('span')
      dot.className = 'dot'
      dot.onclick = () => {
        this.index = i
        this.showSlides()
      }
      dots.appendChild(dot)
    }
  }

  this.autoScroll = () => {
    setTimeout(() => {
      this.index++
      this.showSlides()
      this.autoScroll()
    }, 5000)
  }

  this.showSlides = () => {
    let dots = this.el.getElementsByClassName("dot")
    if (this.index >= this.slides.length)
      this.index = 0
    if (this.index < 0)
      this.index = this.slides.length - 1
    for (let i = 0; i < this.slides.length; i++)
      this.slides[i].style.display = "none"

    for (let i = 0; i < dots.length; i++)
      dots[i].className = dots[i].className.replace(" active", "")

    this.slides[this.index].style.display = "block"
    dots[this.index].className += " active"
  }
}
