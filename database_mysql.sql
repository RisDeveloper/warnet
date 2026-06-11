-- MySQL for XAMPP (MariaDB)
DROP TABLE IF EXISTS transaksi;
DROP TABLE IF EXISTS komputer;
DROP TABLE IF EXISTS member;
DROP TABLE IF EXISTS operator;
DROP TABLE IF EXISTS paket;

CREATE TABLE komputer (
    id_pc INT AUTO_INCREMENT PRIMARY KEY,
    nama_pc VARCHAR(50),
    status VARCHAR(20) DEFAULT 'Tersedia'
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE member (
    id_member INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    saldo INT DEFAULT 0
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE operator (
    id_operator INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE paket (
    id_paket INT AUTO_INCREMENT PRIMARY KEY,
    nama_paket VARCHAR(50),
    durasi_jam INT,
    harga INT
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_member INT REFERENCES member(id_member) ON DELETE CASCADE,
    id_pc INT REFERENCES komputer(id_pc) ON DELETE CASCADE,
    id_paket INT REFERENCES paket(id_paket) ON DELETE CASCADE,
    metode_bayar VARCHAR(50),
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARSET=utf8mb4;

INSERT INTO komputer (nama_pc, status) VALUES
('PC-01','Dipakai'),('PC-02','Dipakai'),('PC-03','Dipakai');

INSERT INTO member (nama, username, password, saldo) VALUES
('Fadil','fadil','1234',86000),('CAHYO','cahyo','CAHYO',90000);

INSERT INTO operator (nama, username, password) VALUES
('Administrator','admin','12345');

INSERT INTO paket (nama_paket, durasi_jam, harga) VALUES
('Paket 1 jam',1,12000),('Paket 2 jam',2,24000),('Paket hemat',1,10000);
