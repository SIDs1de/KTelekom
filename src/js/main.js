document.addEventListener('DOMContentLoaded', () => {
  const activateSlider = () => {
    const slider = $('.owl-carousel')
    if (slider) {
      slider.owlCarousel()
    }
  }

  activateSlider()
})
