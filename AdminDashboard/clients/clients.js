class Client {
    constructor(id,username,email,role) {
        this.id=id;
        this.username=username;
        this.email=email;
        this.role=role
    }
}

const Clients = [
    new Client(1, "john_doe", "john.doe@example.com", "admin"),
    new Client(2, "jane_smith", "jane.smith@example.com", "user"),
    new Client(3, "alice_walker", "alice.walker@example.com", "user"),
    new Client(4, "bob_jackson", "bob.jackson@example.com", "user"),
    new Client(5, "emma_davis", "emma.davis@example.com", "user"),
    new Client(6, "michael_johnson", "michael.johnson@example.com", "user"),
    new Client(7, "sarah_white", "sarah.white@example.com", "user"),
    new Client(8, "william_brown", "william.brown@example.com", "user"),
    new Client(9, "olivia_wilson", "olivia.wilson@example.com", "user"),
    new Client(10, "david_martinez", "david.martinez@example.com", "user")
];
