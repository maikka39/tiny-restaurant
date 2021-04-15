let slideIndex = 1;

window.addEventListener('load', function () {
  var prev = document.getElementsByClassName('prev')[0];
  var next = document.getElementsByClassName('next')[0];

  if (prev == null || next == null) return;

  prev.addEventListener('click', function () {
    plusSlides(-1)
  });
  next.addEventListener('click', function () {
    plusSlides(1)
  });

  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementById('slideshowdots');
  dots.innerHTML = ""
  for (let i = 0; i < slides.length; i++) {
    if (i >= 10)
      break;

    let dot = document.createElement('span');
    dot.className = 'dot';
    dot.onclick = () => {
      currentSlide(i + 1)
    }
    dots.appendChild(dot);
  }

  showSlides(slideIndex);

  autoScroll();
})



// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function autoScroll() {
  setTimeout(() => {
    plusSlides(1)
    autoScroll()
  }, 5000)
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length)
    slideIndex = 1
  if (n < 1)
    slideIndex = slides.length
  for (i = 0; i < slides.length; i++)
    slides[i].style.display = "none";

  for (i = 0; i < dots.length; i++)
    dots[i].className = dots[i].className.replace(" active", "");

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}