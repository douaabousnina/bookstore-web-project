class Order {
    constructor(userName, bookName, bookId, orderDate, status) {
        this.userName = userName;
        this.bookName = bookName;
        this.bookId = bookId;
        this.orderDate = orderDate;
        this.status = status;
    }
}

const Orders = [
    new Order('Foulan', 'Aramsee', '001', '14-03-2024', 'Pending'),
    new Order('Falten', 'Solo', '002', '04-03-2024', 'Processing'),
    new Order('Firas', 'Les miserables', '003', '01-03-2024', 'Delivered'),
    new Order('Farida', 'Pride and Prejudice', '004', '20-03-2024', 'Pending'),
    new Order('Fadi', 'To Kill a Mockingbird', '005', '10-03-2024', 'Processing'),
    new Order('Fawzi', 'The Great Gatsby', '006', '05-03-2024', 'Delivered'),
    new Order('Fahad', '1984', '007', '18-03-2024', 'Pending'),
    new Order('Faten', 'The Catcher in the Rye', '008', '08-03-2024', 'Processing'),
    new Order('Fadiyah', 'The Hobbit', '009', '03-03-2024', 'Delivered'),
    new Order('Faisal', 'The Alchemist', '010', '12-03-2024', 'Pending'),
    new Order('Feroz', 'The Lord of the Rings', '011', '06-03-2024', 'Processing'),
    new Order('Fizza', 'Harry Potter and the Sorcerer\'s Stone', '012', '15-03-2024', 'Delivered'),
    new Order('Fadel', 'Crime and Punishment', '013', '02-03-2024', 'Pending'),
    new Order('Fatima', 'The Picture of Dorian Gray', '014', '17-03-2024', 'Processing'),
    new Order('Fahim', 'Brave New World', '015', '07-03-2024', 'Delivered'),
    new Order('Fadiel', 'Moby', '016', '09-03-2024', 'Pending'),
    new Order('Fenella', 'Anna Karenina', '017', '11-03-2024', 'Processing'),
    new Order('Fizza', 'The Hunger Games', '018', '19-03-2024', 'Delivered'),
    new Order('Fadiya', 'Gone with the Wind', '019', '13-03-2024', 'Pending'),
    new Order('Farouk', 'The Odyssey', '020', '16-03-2024', 'Processing')
];
