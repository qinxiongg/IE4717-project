CREATE TABLE users (
    username char(50) not null primary key,
    password char(50) not null,
    myname char(50) not null,
    DOB date not null
);

CREATE TABLE products (
    product_name char(50) not null primary key,
    brand char(30) not null,
    category char(30) not null,
    price float (6, 2) not null,
    product_desc varchar(1000) not null,
    img_link varchar(50) not null
);

CREATE TABLE orders (
    id int not null AUTO_INCREMENT primary key,
    username VARCHAR(50) not null ,
    product_name VARCHAR(100)  not null,
    quantity INT not null,
    price float(10, 2) not null,
    order_date date not null,
    status char(30) not null,
    img_link varchar(50),
    FOREIGN KEY (product_name) REFERENCES products(product_name)
);