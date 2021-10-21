CREATE TABLE estore.Users(
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pwd LONGTEXT NOT NULL,
    contact_number INT not NULL,
    city VARCHAR(255) not NULL,
    user_address VARCHAR(255) not NULL 
);

ALTER TABLE users 
MODIFY COLUMN contact_number VARCHAR(255);

ALTER TABLE users
ADD COLUMN signup_date DATE;

CREATE TABLE estore.products(
    prod_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name MEDIUMTEXT NOT NULL,
    product_desc MEDIUMTEXT not NULL,
    product_manufact TEXT NOT NULL,
    price INT NOT NULL,
    product_image MEDIUMTEXT
);


INSERT INTO products(product_name ,product_desc, product_manufact , price,product_image)
VALUES('laptop 1','MSI Bravo 15 Ryzen 7 4800H 15.6" (39.62cms) FHD Gaming Laptop (16GB/512GB SSD/144 Hz/Windows 10/ RX5500M,GDDR6 4GB/Black/1.86 kg), A4DDR-212IN' ,'MSI' , 80000,'..\/images\/71b46EnIzBL._SL1500_.jpg'),
('laptop 2','OMEN by HP Gaming Laptop, Ryzen 5-4600H, 8 GB DDR6 RAM, 4GB NVIDIA 1650ti Graphics, 512 GB SSD, 15.6"(39.62cms) FHD Screen, Windows 10,15-en0001AX' ,'HP' , 79000,'..\/images\/71dG2zTOI6L._SL1500_.jpg'),
('laptop 3','HP Pavilion Gaming 15.6-inch FHD Gaming Laptop (Ryzen 5-4600H/8GB/1TB HDD + 256GB SSD/Windows 10/144Hz/NVIDIA GTX 1650 4GB/Shadow Black), 15-ec1048AX' ,'HP',66990,'..\/images\/71FeUtw+TPL._SL1500_.jpg'),
('laptop 4','ASUS ROG Zephyrus G14, 14" FHD 120Hz, Ryzen 5 4600HS, GTX 1650Ti 4GB Graphics, Gaming Laptop (8GB/512GB SSD/Office 2019/Windows 10/Gray/Anime Matrix/1.7 Kg), GA401II-HE111TS' ,'ASUS',90990,'..\/81i1XE-J04L._SL1500_.jpg'),
('laptop 5','Acer Aspire 5 AMD Ryzen 5 5500U Processor 15.6" (39.62 cms) - (8 GB/512 GB SSD/Windows 10 Home/AMD Radeon Graphics /Microsoft Office 2019/1.76Kg/Silver) A515-45','ACER',59000,'..\/images\/71WbatK7HVL._SL1500_.jpg'),
('laptop 6','HP 15 (2021) Thin & Light Ryzen 5 4500U Processor, 8GB RAM, 512GB SSD, Radeon Graphics, 15.6-inch (39.6 cms) FHD Screen, Windows 10, MS Office, Natural Silver(15s-er1006AU)','HP',51000,'..\/images\/81SdJG3OUjL._SL1500_.jpg');



CREATE TABLE estore.order(
    order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    userid INT NOT NULL ,
    status_prod VARCHAR(255)
    
);



