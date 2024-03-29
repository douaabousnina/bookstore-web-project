class Order {
    constructor(userName, bookName, orderDate, status) {
        this.userName = userName;
        this.bookName = bookName;
        this.orderDate = orderDate;
        this.status = status;
    }
}

const Orders = [
    new Order('Foulan', 'Aramsee', '14-03-2024', 'Pending'),
    new Order('Falten', 'Solo', '04-03-2024', 'Processing'),
    new Order('Firas', 'Les miserables', '01-03-2024', 'Delivered'),
    new Order('Farida', 'Pride and Prejudice', '20-03-2024', 'Pending'),
    new Order('Fadi', 'To Kill a Mockingbird', '10-03-2024', 'Processing'),
    new Order('Fawzi', 'The Great Gatsby', '05-03-2024', 'Delivered'),
    new Order('Fahad', '1984', '18-03-2024', 'Pending'),
    new Order('Faten', 'The Catcher in the Rye', '08-03-2024', 'Processing'),
    new Order('Fadiyah', 'The Hobbit', '03-03-2024', 'Delivered'),
    new Order('Faisal', 'The Alchemist', '12-03-2024', 'Pending'),
    new Order('Feroz', 'The Lord of the Rings', '06-03-2024', 'Processing'),
    new Order('Fizza', 'Harry Potter and the Sorcerer\'s Stone', '15-03-2024', 'Delivered'),
    new Order('Fadel', 'Crime and Punishment', '02-03-2024', 'Pending'),
    new Order('Fatima', 'The Picture of Dorian Gray', '17-03-2024', 'Processing'),
    new Order('Fahim', 'Brave New World', '07-03-2024', 'Delivered'),
    new Order('Fadiel', 'Moby', '09-03-2024', 'Pending'),
    new Order('Fenella', 'Anna Karenina', '11-03-2024', 'Processing'),
    new Order('Fizza', 'The Hunger Games', '19-03-2024', 'Delivered'),
    new Order('Fadiya', 'Gone with the Wind', '13-03-2024', 'Pending'),
    new Order('Farouk', 'The Odyssey', '16-03-2024', 'Processing')
];
