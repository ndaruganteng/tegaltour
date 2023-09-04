const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('rating-value');

let selectedRating = 0;

stars.forEach(star => {
  star.addEventListener('mouseover', () => {
    highlightStars(parseInt(star.dataset.value));
  });

  star.addEventListener('click', () => {
    selectedRating = parseInt(star.dataset.value);
    showRatingValue();
  });

  star.addEventListener('mouseout', () => {
    highlightStars(selectedRating);
  });
});

function highlightStars(starCount) {
  stars.forEach((star, index) => {
    star.classList.toggle('active', index < starCount);
  });
}

function showRatingValue() {
  ratingValue.innerHTML = `Rating: ${selectedRating}`;
}
