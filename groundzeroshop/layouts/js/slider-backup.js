class Slider {
	
	constructor(seconds) {
		this.seconds = seconds;
		this.slidesContainers = document.querySelectorAll(".slides-container");
	}

	controlSlider() {
		this.slidesContainers.forEach(slidesContainer => {
			slidesContainer.scrollLeft = 0;

			const slide = document.querySelector(".slide");

			const prevButton = slidesContainer.parentNode.querySelector("#slide-arrow-prev");
			const nextButton = slidesContainer.parentNode.querySelector("#slide-arrow-next");

			nextButton.addEventListener("click", () => {
				clearInterval(this.intervalId);
				const slideWidth = slide.clientWidth;
				if (slidesContainer.scrollLeft + slidesContainer.clientWidth >= slidesContainer.scrollWidth) {
					slidesContainer.scrollLeft = 0;
				} else {
					slidesContainer.scrollLeft += slideWidth;
				}
				this.intervalId = setInterval(() => {
					nextButton.click();
				}, this.seconds * 1000);
			});

			prevButton.addEventListener("click", () => {
				clearInterval(this.intervalId);
				const slideWidth = slide.clientWidth;
				if (slidesContainer.scrollLeft === 0) {
					slidesContainer.scrollLeft = slidesContainer.scrollWidth - slidesContainer.clientWidth;
				} else {
					slidesContainer.scrollLeft -= slideWidth;
				}
				this.intervalId = setInterval(() => {
					nextButton.click();
				}, this.seconds * 1000);
			});

			let intervalId = setInterval(() => {
				nextButton.click();
			}, this.seconds * 1000);
		});
	}
}
