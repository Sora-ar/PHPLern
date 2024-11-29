CREATE TABLE orders (
                        id SERIAL PRIMARY KEY,
                        order_number VARCHAR(50) NOT NULL,
                        weight DECIMAL(10, 2) NOT NULL,
                        city_ref VARCHAR(50) NOT NULL,
                        delivery_type VARCHAR(20) NOT NULL,
                        warehouse_ref VARCHAR(50) NOT NULL
);
