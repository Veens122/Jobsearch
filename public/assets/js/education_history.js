function addEducation() {
    const wrapper = document.getElementById("education-wrapper");
    const template = document.getElementById("education-template").innerHTML;
    const index = wrapper.querySelectorAll(".education-item").length;

    const newItemHtml = template.replace(/__INDEX__/g, index);
    const tempDiv = document.createElement("div");
    tempDiv.innerHTML = newItemHtml.trim();
    wrapper.appendChild(tempDiv.firstChild);
}

function removeEducation(button) {
    const item = button.closest(".education-item");
    if (item) {
        item.remove();
        reindexEducation();
    }
}

function reindexEducation() {
    const wrapper = document.getElementById("education-wrapper");
    const items = wrapper.querySelectorAll(".education-item");

    items.forEach((item, index) => {
        const inputs = item.querySelectorAll("input");
        inputs.forEach((input) => {
            input.name = input.name.replace(
                /education\[\d+\]/,
                `education[${index}]`
            );
        });
    });
}
