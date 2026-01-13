db = db.getSiblingDB("appdb");

db.createCollection("employees");

db.employees.insertMany([
  { name: "Satya", email: "satya@example.com", role: "Developer", createdAt: new Date() },
  { name: "Srinath", email: "srinath@example.com", role: "Engineer", createdAt: new Date() }
]);
