const tasksData = document.getElementById("tasks-data");
const description = document.getElementById("description");
const notifi = document.getElementById("error");
const tasksTable = document.querySelector("#tasks-table tbody");

tasksArr = [];
if (localStorage.getItem("tasks")) {
    tasksArr = JSON.parse(localStorage.getItem("tasks"));
    if (tasksArr.length > 0)
        document.getElementById("clearAll").style.display = "table-row";
}
displayAllTasks(tasksArr);

tasksData.onsubmit = (e) => {
    e.preventDefault();
    if (description.value == '') {
        notifi.innerHTML = `
        <div class="alert alert-danger alert-dismissible fade show col-10 offset-2 mx-auto" role="alert">
            <strong>please fill inputs.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        `;
        createNotification("please fill inputs.", "danger");

        return false;
    }

    let uid = Math.floor(Math.random() * 50000);
    let task = { uid: uid, description: description.value };
    tasksArr.push(task);

    displayNewTasks(task);

    localStorage.setItem("tasks", JSON.stringify(tasksArr));


    clearInputs();
}

function displayAllTasks(arr) {
    arr.map((task) => {
        tasksTable.innerHTML += `
            <tr class="text-center text-white">
                <td>${task.description}</td>
                <td><i class="btn btn-sm btn-danger" onClick=deleteTask(${task.uid}) id="${task.uid}">X</i></td>
            </tr>
        `;
    });

    if (arr.length > 0)
        document.getElementById("clearAll").style.display = "table-row";
}

displayNewTasks = (task) => {
    tasksTable.innerHTML += `
        <tr class="text-center text-white">
            <td>${task.description}</td>
            <td><i class="btn btn-sm btn-danger" onClick=deleteTask(${task.uid}) id="${task.uid}">X</i></td>
        </tr>
    `
    document.getElementById("clearAll").style.display = "table-row";

    createNotification("Task added successfully.", "success");

}

clearInputs = () => {
    description.value = '';
}

deleteTask = (uid) => {
    document.getElementById(uid).parentNode.parentNode.remove();
    data = JSON.parse(localStorage.getItem("tasks"));
    newData = data.filter((data) => data.uid != uid);
    localStorage.setItem("tasks", JSON.stringify(newData));

    if (newData.length <= 0)
        document.getElementById("clearAll").style.display = "none";

    createNotification("Task deleted successfully.", "success");
}

deleteAll = () => {
    localStorage.setItem("tasks", "[]");

    tasksTable.innerHTML = '';
    document.getElementById("clearAll").style.display = "none";
    createNotification("Tasks deleted successfully.", "success");
}

createNotification = (mess, type) => {
    notifi.innerHTML = `
    <div class="alert alert-${type} alert-dismissible fade show col-10 offset-2 mx-auto" role="alert">
        <strong>${mess}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    `;
}