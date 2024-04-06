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

const Orders = [
    {
        userName: 'Foulan',
        bookName: 'Aramsee',
        bookId: 1,
        orderDate: '14-03-2024',
        status: 'Pending'
    },
    {
        userName: 'Falten',
        bookName: 'Solo',
        bookId: 2,
        orderDate: '04-03-2024',
        status: 'Processing'
    },
    {
        userName: 'Firas',
        bookName: 'Les miserables',
        bookId: 3,
        orderDate: '01-03-2024',
        status: 'Delivered'
    },
]

if (typeof Orders !== 'undefined' && Orders.length > 0) {
    Orders.forEach(order => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${order.userName}</td>
            <td>${order.bookName}</td>
            <td>${order.bookId}</td>
            <td>${order.orderDate}</td>
            <td class="${order.status === 'Pending' ? 'danger' : order.status === 'Processing' ? 'warning' : 'success'}">${order.status}</td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('table tbody').appendChild(tr);
    });
}
