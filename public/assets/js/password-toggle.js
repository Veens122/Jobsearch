function togglePassword(el = null) {
    let input;

    // Case 1: Called like togglePassword(this) (data-target attribute is present)
    if (el && el.hasAttribute("data-target")) {
        const targetId = el.getAttribute("data-target");
        input = document.getElementById(targetId);
    }

    // Case 2: Called like togglePassword() (default case — find sibling input with id="password")
    if (!input && !el) {
        input = document.getElementById("password");
    }

    // Case 3: Fallback — find previous input sibling (for more flexible use)
    if (!input && el) {
        input = el.previousElementSibling;
    }

    // Toggle logic
    if (input) {
        input.type = input.type === "password" ? "text" : "password";

        // Optional: update icon
        if (el) {
            el.textContent = input.type === "password" ? "👁️" : "🙈";
        }
    }
}
