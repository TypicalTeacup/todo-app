const form = document.getElementById("newTodo");

form.addEventListener("submit", async (e) => {
    const body = {
        name: form.name.value,
        description: form.description.value,
        status: form.status.value,
        priority: form.priority.value,
        deadline: form.deadline.value,
    };
    console.log(body);
    const response = await fetch("/api/todo", {
        method: "PUT",
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json",
        },
    });
    return false;
});
