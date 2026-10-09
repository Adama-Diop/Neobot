function bubble() {
  const bubble = document.createElement("span");
  bubble.classList.add("bubble");
  document.body.appendChild(bubble);

  const size = Math.random() * 100 + 80 + "px";
  bubble.style.height = size;
  bubble.style.width = size;
  bubble.style.top = Math.random() * 170 + 50 + "%";
  bubble.style.left = Math.random() * 80 + "%";

  const plusMinus = Math.random() > 0.5 ? 1 : -1;
  bubble.style.setProperty("--bottom", Math.random() * 100 * plusMinus + "%");

  setTimeout(() => {
    bubble.remove();
  }, 15000);
};
setInterval(bubble, 3000);
