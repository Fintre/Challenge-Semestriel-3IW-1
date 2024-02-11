window.addEventListener("load", () => {
  document.querySelectorAll(".navbar_toggle_button").forEach((t) => {
    console.log(t);
    let o = document.createElement("span");
    t.append(o), t.onclick = () => {
      const a = t.getAttribute("data-target"), e = document.querySelector(a);
      e.classList.toggle("toggled"), t.classList.toggle("toggled"), e.classList.contains("toggled") ? e.style.maxHeight = e.scrollHeight + "px" : e.style.maxHeight = 0;
    };
  });
});
