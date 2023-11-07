create database banhang;
use banhang;

create table sanpham (
    masanpham CHAR(8) primary key,
    tensanpham VARCHAR(50),
    giaca INT UNSIGNED NOT NULL,
    mota varchar(50),
    soluong INT UNSIGNED,
    size char(3)
);
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0001','Áo T-shirt Trắng','1500000','Chất vãi mềm mịn thoải mái','14','S');
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0002','Áo T-shirt đen','1500000','Chất vãi mềm mịn thoải mái','14','M');
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0003','Áo T-shirt hồng','1500000','Chất vãi mềm mịn thoải mái','14','L');
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0004','Quần jean nam','1500000','Chất vãi mềm mịn thoải mái','14','SM');
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0005','Quần jean nữ','1500000','Chất vãi mềm mịn thoải mái','14','XXL');
insert into sanpham (masanpham,tensanpham,giaca,mota,soluong,size) values('ABCD0006','Áo T-shirt hồng','1500000','Chất vãi mềm mịn thoải mái','14','L');

-- drop table sanpham;

create table khachhang (
	makhachhang char(8) primary key ,
    tenkhachhang varchar(50),
    matkhau varchar(20),
    diachi varchar(100) not null,
	sodienthoai int(10),
    email varchar(50),
    capdo char(1) default 0);

insert into khachhang (makhachhang, tenkhachhang, matkhau, diachi, sodienthoai, email, capdo) values ('KH000001', 'Khách hàng 1', '11111111', 'Ninh kiều Cần thơ', '0909091212', 'khachhang@gmail.com', '1');
insert into khachhang (makhachhang, tenkhachhang, matkhau, diachi, sodienthoai, email, capdo) values ('KH000002', 'Khách hàng 2', '22222222', 'Ninh kiều Cần thơ', '0909091212', 'khachhang@gmail.com', '0');
insert into khachhang (makhachhang, tenkhachhang, matkhau, diachi, sodienthoai, email, capdo) values ('KH000003', 'Khách hàng 3', '33333333', 'Ninh kiều Cần thơ', '0909091212', 'khachhang@gmail.com', '0');

-- drop table khachhang;

create table donhang (
	sodonhang char(8) primary key,
    ngaydathang date,
    masanpham CHAR(8),
    makhachhang char(8),
	FOREIGN KEY(makhachhang) REFERENCES khachhang(makhachhang),
	FOREIGN KEY(masanpham) REFERENCES sanpham(masanpham)
);

insert into donhang (sodonhang, ngaydathang, makhachhang, masanpham) values('DH000001','2023-11-30','KH000002','ABCD0001');
insert into donhang (sodonhang, ngaydathang, makhachhang, masanpham) values('DH000004','2023-11-3','KH000002','ABCD0002');
insert into donhang (sodonhang, ngaydathang, makhachhang, masanpham) values('DH000002','2023-11-3','KH000002','ABCD0003');
insert into donhang (sodonhang, ngaydathang, makhachhang, masanpham) values('DH000003','2023-11-3','KH000003','ABCD0004');

create	table giaohang (
	magiaohang	char(8) primary key,
    diachigiao varchar(50),
    sodonhang char(8),
    tientrinhgiao varchar(20),
	FOREIGN KEY(sodonhang) REFERENCES donhang(sodonhang)
);

insert into giaohang (magiaohang, diachigiao, sodonhang, sanphamduocdat,tientrinhgiao) values('GH000001','Ninh kiều Cần thơ', 'DH000001', 'Áo T-shirt Trắng', 'đang vận chuyển');
insert into giaohang (magiaohang, diachigiao, sodonhang, sanphamduocdat,tientrinhgiao) values('GH000002','Ninh kiều Cần thơ', 'DH000004', 'Áo T-shirt Đen', 'đang vận chuyển');
insert into giaohang (magiaohang, diachigiao, sodonhang, sanphamduocdat,tientrinhgiao) values('GH000003','Ninh kiều Cần thơ', 'DH000002', 'Áo T-shirt Hồng', 'đang vận chuyển');
insert into giaohang (magiaohang, diachigiao, sodonhang, sanphamduocdat,tientrinhgiao) values('GH000004','Ninh kiều Cần thơ', 'DH000003', 'Quần jean nam', 'đã giao');
USE `banhang`$$
-- procedure dang ky tai khoan
DELIMITER $$
CREATE PROCEDURE THEM_KH(IN makhachhang char(8), tenkhachhang varchar(50), matkhau varchar(20),diachi varchar(100), sodienthoai int(10),email varchar(50))
begin 
	insert into banhang.khachhang values(makhachhang,tenkhachhang,matkhau,diachi, sodienthoai,email,'0');
end$$
DELIMITER ;
call THEM_KH('KH000004','Khách hàng 4','44444444','Hưng lợi Cần Thơ','0909090909','Khachhang4@gmail.com');

-- Cập nhật tài khoản 

DELIMITER $$
CREATE PROCEDURE CapNhatTK(IN makhachhang char(8), matkhau varchar(20),capdo char(1))
begin 
	UPDATE banhang.khachhang SET khachhang.capdo=capdo WHERE khachhang.makhachhang=makhachhang and khachhang.matkhau=matkhau;
end$$
DELIMITER ;
call CapNhatTK('KH000002','22222222','1');
-- procedure them san pham
DELIMITER $$
CREATE PROCEDURE THEM_SP(IN masanpham char(8), tensanpham VARCHAR(50), giaca INT, mota varchar(50), soluong INT, size char(3) )
begin 
	insert into banhang.sanpham values(masanpham,tensanpham,giaca,mota, soluong,size);
end$$
DELIMITER ;

call THEM_SP('SAKDSADH','T-shirt violet','250000','Một chiếc áo màu violet','24','L');


-- ham kiem tra tai khoan ton tai 
DELIMITER $$
CREATE FUNCTION TonTaiKH( makhachhang char(8),matkhau varchar(20))
RETURNS int
BEGIN
	if exists (select * from banhang.khachhang where khachhang.makhachhang = makhachhang AND khachhang.matkhau = matkhau)
		then
			return 1;
		else
			return 0;
	end if;
END;
select TonTaiKH('KH000002','22222222') as KQ;

delimiter $$

create trigger KXoa_QTV after delete on banhang.khachhang
for each row
begin 
	if old.capdo = '1'
		then
			signal sqlstate '45000'
            set message_text = 'Không được xóa Quản trị viên';
	else 
		signal sqlstate '01000';
    end if;
end;

CREATE TABLE giohang(
	magiohang char(8),
    makhachhang char(8),
    masanpham CHAR(8),
    tensanpham VARCHAR(50),
    giaca INT UNSIGNED NOT NULL,
    soluong INT UNSIGNED,
    primary key (magiohang, makhachhang, masanpham),
    constraint fk_1 foreign key (makhachhang) references khachhang(makhachhang),
    constraint fk_2 foreign key (masanpham) references sanpham(masanpham));

DELIMITER $$
create procedure themvaogiohang(
	magiohang char(8),
	makhachhang char(8),
	masanpham CHAR(8),
    tensanpham VARCHAR(50),
    giaca INT UNSIGNED,
    soluong INT UNSIGNED) 
begin
	insert into giohang values (magiohang, makhachhang, masanpham, tensanpham, giaca, soluong);
end$$
DELIMITER ;
-- drop procedure themvaogiohang;
CALL themvaogiohang('KH000001', 'KH000001', 'ABCD0006', 'Áo T-shirt hồng', '1500000', '1');

-- delete FROM khachhang where makhachhang like 'KH000004';
SELECT * FROM banhang.sanpham ORDER BY sanpham.tensanpham DESC;
SELECT * FROM banhang.sanpham ORDER BY sanpham.tensanpham ASC;