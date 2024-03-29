class Book {
    constructor(id, title, author, quantity) {
        this.id = id;
        this.title = title;
        this.author = author;
        this.quantity = quantity;
    }
}


const Books = [
    new Book(1, "Le Petit Prince", "Antoine de Saint-Exupéry", 10),
    new Book(2, "L'Étranger", "Albert Camus", 5),
    new Book(3, "Les Misérables", "Victor Hugo", 8)
];
