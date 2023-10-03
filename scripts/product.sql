-- Buat tabel untuk produk
CREATE TABLE product (
  prod_id VARCHAR(6) PRIMARY KEY,
  prod_name VARCHAR(50),
  price INT,
  prod_quant INT,
  prod_desc VARCHAR(100),
  prod_image VARCHAR(255)
);

-- Masukkan data produk ke dalam tabel dengan data yang sama untuk 100 baris
INSERT INTO product (prod_id, prod_name, price, prod_quant, prod_desc, prod_image)
SELECT '00001', 'bts stay gold album', 1000000, 5, 'New, includes BTS sticker', 'bts_stay_gold.jpeg'
FROM generate_series(1, 100);
