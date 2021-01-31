$(document).ready(function () {
    function renderTable(tasks) {
        let tasksBody = $("#tasksTable tbody");
        if (tasks) {
            let row = '';
            for (let i = 0; i < tasks.length; i++) {
                row += `<tr>
                             <td>${tasks[i].id}</td>
                                    <td>${tasks[i].name}</td>
                                    <td>${tasks[i].email}</td>
                                    <td>${tasks[i].text}</td>
                                    <td>${tasks[i].status == 0 ? 'In Progress' : 'Done'}</td>
                                    <td>${tasks[i].is_edited  ? '<span>Edited</span>' : '-'}</td>`;
                let adminControl = '';
                if (window.isAdmin) {
                    adminControl = `<td class="actions">
                                            <a href="${window.baseUrl}task/edit/${tasks[i].id}"
                                               class="btn btn-sm btn-warning edit-task">Edit</a>
                                            <form action="${window.baseUrl}task/destroy/${tasks[i].id}" method="post">
                                                <button class="btn btn-sm btn-danger delete-task">Delete</button>
                                            </form>
                                        </td>`;
                }
                row += adminControl;
                row += "</tr>";
            }
            tasksBody.html(row);
        }
    }

    $(document).on('click', ".delete-task", function (e) {
        let deleteTask = confirm('Are you sure?');
        if (!deleteTask) {
            return false;
        }
    })

    $(document).on("click", ".column-sort", function () {
        let self = $(this);
        let sortColumn = self.attr('data-sort');
        let sortColumnType = self.attr('data-sort-type');
        if (!sortColumnType) sortColumnType = 'desc';
        $.ajax({
            url: window.baseUrl + 'task/sort',
            data: {sortColumn: sortColumn, sortColumnType: sortColumnType},
            method: 'POST',
            success: function (tasks) {
                sortColumnType == 'desc' ? self.attr('data-sort-type', 'asc') : self.attr('data-sort-type', 'desc');
                tasks = JSON.parse(tasks);
                renderTable(tasks)
                window.orderBy = sortColumn;
                window.orderByType = sortColumnType;

            }
        })
    })


    $(document).on("click", ".pageButton", function () {
        let self = $(this);
        let id = self.attr('data-id');
        $.ajax({
            url: window.baseUrl + 'task/pagination',
            data: {
                pageNumber: id,
                sortColumn: window.orderBy,
                sortColumnType: window.orderByType
            },
            method: 'GET',
            success: function (tasks) {
                tasks = JSON.parse(tasks);
                console.log('tasks ', tasks)
                renderTable(tasks)
            }
        })


    })
});

