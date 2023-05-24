const AUTOPLAY_CLASS = "slider--autoplay";

// Remove autoplay class on stop
Flickity.prototype.stopPlayer = function() {
    this.player.stop();
    this.element.classList.remove(AUTOPLAY_CLASS);
};

let flkty = new Flickity(".pageslider", {
    autoPlay: 6000,
    prevNextButtons: true,
    pageDots: true,
    setGallerySize: false,
    pauseAutoPlayOnHover: false,
    wrapAround: true,
    l18nPageDot: "Slide %",
    l18nPrevious: "Vorherige Slide",
    l18nNext: "Nächste Slide",
    on: {
        ready: function() {
            this.element.classList.add(AUTOPLAY_CLASS);
            setTimeout(() => {
                this.element.classList.add("slider--init");
            }, 10);
        }
    }
});

