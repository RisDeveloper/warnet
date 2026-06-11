-- PostgreSQL for Supabase
DROP TABLE IF EXISTS transaksi;
DROP TABLE IF EXISTS komputer;
DROP TABLE IF EXISTS member;
DROP TABLE IF EXISTS operator;
DROP TABLE IF EXISTS paket;

CREATE TABLE komputer (
    id_pc SERIAL PRIMARY KEY,
    nama_pc VARCHAR(50),
    status VARCHAR(20) DEFAULT 'Tersedia' CHECK (status IN ('Tersedia','Dipakai'))
);

CREATE TABLE member (
    id_member SERIAL PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    saldo INTEGER DEFAULT 0
);

CREATE TABLE operator (
    id_operator SERIAL PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE paket (
    id_paket SERIAL PRIMARY KEY,
    nama_paket VARCHAR(50),
    durasi_jam INTEGER,
    harga INTEGER
);

CREATE TABLE transaksi (
    id_transaksi SERIAL PRIMARY KEY,
    id_member INTEGER REFERENCES member(id_member) ON DELETE CASCADE,
    id_pc INTEGER REFERENCES komputer(id_pc) ON DELETE CASCADE,
    id_paket INTEGER REFERENCES paket(id_paket) ON DELETE CASCADE,
    metode_bayar VARCHAR(50),
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO komputer (nama_pc, status) VALUES
('PC-01','Dipakai'),('PC-02','Dipakai'),('PC-03','Dipakai');

INSERT INTO member (nama, username, password, saldo) VALUES
('Fadil','fadil','1234',86000),('CAHYO','cahyo','CAHYO',90000);

INSERT INTO operator (nama, username, password) VALUES
('Administrator','admin','12345');

INSERT INTO paket (nama_paket, durasi_jam, harga) VALUES
('Paket 1 jam',1,12000),('Paket 2 jam',2,24000),('Paket hemat',1,10000);
