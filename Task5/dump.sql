-- Створення бази даних
CREATE DATABASE shop;

-- Підключення до бази даних shop
\c shop;

-- Таблиця для зберігання товарів
CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) CHECK (price >= 0),
    description TEXT,
    discount DECIMAL(5, 2) DEFAULT 0
);

-- Таблиця для зберігання категорій
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Зв’язуюча таблиця для категорій і товарів
CREATE TABLE category_product (
    category_id INT REFERENCES categories(id),
    product_id INT REFERENCES products(id),
    PRIMARY KEY (category_id, product_id)
);
