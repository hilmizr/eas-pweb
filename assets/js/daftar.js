function navToFirstAccordion() {
  const hrLeft = document.getElementsByClassName("horizontalLineLeft")[0];
  const hrRight = document.getElementsByClassName("horizontalLineRight")[0];
  const navPoints = Array.from(document.getElementsByClassName("navPoint"));

  reset(navPoints, hrLeft, hrRight);

  navPoints[0].classList.remove("bg-gray");
  navPoints[0].classList.add("bg-brand");
}

function navToSecondAccordion() {
  const hrLeft = document.getElementsByClassName("horizontalLineLeft")[0];
  const hrRight = document.getElementsByClassName("horizontalLineRight")[0];
  const navPoints = Array.from(document.getElementsByClassName("navPoint"));

  reset(navPoints, hrLeft, hrRight);

  hrLeft.classList.remove("horizontalLineInactive");
  hrLeft.classList.add("horizontalLineActive");

  navPoints[0].classList.remove("bg-gray");
  navPoints[1].classList.remove("bg-gray");
  navPoints[0].classList.add("bg-brand");
  navPoints[1].classList.add("bg-brand");
}

function navToThirdAccordion() {
  const hrLeft = document.getElementsByClassName("horizontalLineLeft")[0];
  const hrRight = document.getElementsByClassName("horizontalLineRight")[0];
  const navPoints = Array.from(document.getElementsByClassName("navPoint"));

  reset(navPoints, hrLeft, hrRight);

  hrLeft.classList.remove("horizontalLineInactive");
  hrRight.classList.remove("horizontalLineInactive");
  hrLeft.classList.add("horizontalLineActive");
  hrRight.classList.add("horizontalLineActive");

  navPoints[0].classList.remove("bg-gray");
  navPoints[1].classList.remove("bg-gray");
  navPoints[2].classList.remove("bg-gray");
  navPoints[0].classList.add("bg-brand");
  navPoints[1].classList.add("bg-brand");
  navPoints[2].classList.add("bg-brand");
}

function reset(navPoints, hrLeft, hrRight) {
  navPoints.forEach((el) => {
    el.classList.add("bg-gray");
    el.classList.remove("bg-brand");
  });

  hrLeft.classList.add("horizontalLineInactive");
  hrLeft.classList.remove("horizontalLineActive");
  hrRight.classList.add("horizontalLineInactive");
  hrRight.classList.remove("horizontalLineActive");
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("submitButton")
    .addEventListener("click", function () {
      document.getElementById("registerForm").submit();
    });
});
