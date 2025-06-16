function addJobHistory() {
    const container = document.getElementById("job-history-container");
    const template = document.getElementById("job-history-template").innerHTML;

    // Calculate new index based on current job history items
    const currentItems = container.querySelectorAll(".job-history-item");
    const newIndex = currentItems.length;

    // Replace __INDEX__ placeholder with the actual new index
    const newItemHtml = template.replace(/__INDEX__/g, newIndex);

    // Create a temporary div to convert string HTML to DOM element
    const tempDiv = document.createElement("div");
    tempDiv.innerHTML = newItemHtml.trim();

    // Append new job history item
    container.appendChild(tempDiv.firstChild);
}

function removeJobHistory(button) {
    // Remove the job history item div containing this button
    const jobItem = button.closest(".job-history-item");
    if (jobItem) {
        jobItem.remove();
    }

    // Re-index all job history inputs after removal
    reindexJobHistory();
}

function reindexJobHistory() {
    const container = document.getElementById("job-history-container");
    const items = container.querySelectorAll(".job-history-item");

    items.forEach((item, index) => {
        // Update all input names inside this job history item
        const inputs = item.querySelectorAll("input");
        inputs.forEach((input) => {
            // Example input name: job_history[3][start_date]
            // Replace the number inside the brackets with the current index
            input.name = input.name.replace(
                /job_history\[\d+\]/,
                `job_history[${index}]`
            );
        });
    });
}
