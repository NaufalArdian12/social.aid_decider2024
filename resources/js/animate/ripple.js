export function rippleEffect(event) {
    event.preventDefault();

    const btn = event.currentTarget;

    const circle = document.createElement("span");
    const diameter = Math.max(btn.clientWidth, btn.clientHeight);
    const radius = diameter / 2;

    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `${event.clientX - (btn.offsetLeft + radius)}px`;
    circle.style.top = `${event.clientY - (btn.offsetTop + radius)}px`;
    circle.classList.add("ripple");

    const ripple = btn.getElementsByClassName("ripple")[0];

    if (ripple) {
        ripple.remove();
    }

    btn.appendChild(circle);

    setTimeout(() => {

        if ($(btn).closest("form").length != 0) {
            $(btn).closest("form").submit()
        } else {
            window.location = $(btn).closest("a").attr("href")
        }
    }, 500);
}