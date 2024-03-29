const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

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
            <td>${order.orderDate}</td>
            <td class="${order.status === 'Pending' ? 'danger' : order.status === 'Processing' ? 'warning' : 'success'}">${order.status}</td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('table tbody').appendChild(tr);
    });
}



if (typeof Books !== 'undefined' && Books.length > 0) {
    Books.forEach(book => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${book.id}</td>
            <td>${book.title}</td>
            <td>${book.author}</td>
            <td>${book.quantity}</td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('.books-table table tbody').appendChild(tr);
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
        `;
        tr.innerHTML = trContent;
        document.querySelector('.users-table table tbody').appendChild(tr);
    });
}
