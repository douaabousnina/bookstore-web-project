const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');
const editBtn = document.getElementById('edit-btn');
const deleteBtn = document.getElementById('delete-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    
})



if (typeof Orders !== 'undefined' && Orders.length > 0) {
    Orders.forEach(order => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${order.userName}</td>
            <td>${order.bookName}</td>
            <td>${order.bookId}</td>
            <td>${order.orderDate}</td>
            <td class="${order.status === 'Pending' ? 'danger' : order.status === 'Processing' ? 'warning' : 'success'}">${order.status}</td>
            <td class="action-btns">
                <button class="edit-btn" onClick="location.href='editOrder.php'">
                    <span class="material-symbols-outlined">
                        edit
                    </span>
                </button>

                <button class="delete-btn" onClick='deleteButtonHandler(this)' > 
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                </button>
            </td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('table tbody').appendChild(tr);
    });
}



if (typeof Clients !== 'undefined' && Clients.length > 0) {
    Clients.forEach(user => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>${user.role}</td>
            <td>
                <button class="edit-btn" onClick="location.href='editClient.php'">
                    <span class="material-symbols-outlined">
                        edit
                    </span>
                </button>

                <button class="delete-btn" onClick='deleteButtonHandler(this)' > 
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                </button>
            </td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('.users-table table tbody').appendChild(tr);
    });
}



const deleteButtonHandler = (btn) => {
    let row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
} 
