	--------------------------------------------------------------------------------------
-- Project Name: Online Vehicle Showroom
-- Name        : 17i-0272 - Hassan Mahmood	
--	       : 17i-0276 - Yaseen Mughal
-- Description : It includes modern cars which usually attract youth as this website is made usually for youth
--               
--------------------------------------------------------------------------------------

`


CREATE TABLE Person(
	PersonID int NOT NULL ,
	PersonName varchar(10),
	PersonAddress varchar(20),
	PNo varchar(8),
	CONSTRAINT pk_Person PRIMARY KEY (PersonID)
);

CREATE TABLE Administrator(
	PersonID int,
	APassword int,
	CONSTRAINT fk_Administrator_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT pk_Administrator PRIMARY KEY (PersonID)
);

CREATE TABLE Employee(
	PersonId int, 
	ManagerId int,
	CONSTRAINT fk_Employee FOREIGN KEY (ManagerId) references Employee(PersonId) ON DELETE CASCADE,
	CONSTRAINT fk_Employee_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT pk_Employee PRIMARY KEY (PersonID)
);

CREATE TABLE Customer(
	PersonId int,
	Cpassword int,
	CONSTRAINT fk_Customer_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT pk_Customer PRIMARY KEY (PersonID)	
);

CREATE TABLE Showroom(
	ShowroomId varchar(4) NOT NULL,
	ShowroomName varchar(10),
	Saddress varchar(20),
	ContactNo int,
	CONSTRAINT pk_Showroom PRIMARY KEY (ShowroomId)
);


Create TABLE Visits(
	PersonId int,
	ShowroomId varchar(4),
	CONSTRAINT fk_Visits_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT fk_Visits_Showroom FOREIGN KEY (ShowroomID) references Showroom (ShowroomId) ON DELETE CASCADE
);


CREATE TABLE WorksIn(
	ShowroomId varchar(4),
	PersonId int,
	CONSTRAINT fk_WorksIn_Showrooom FOREIGN KEY (ShowroomId) references Showroom (ShowroomId) ON DELETE CASCADE,
	CONSTRAINT fk_WorksIn_Employee FOREIGN KEY (PersonId) references Employee (PersonId) ON DELETE CASCADE
);

Create Table ProductCountry(

	CountryId varchar(4) NOT NULL,
	CountryName varchar(10),
	CONSTRAINT pk_ProductCountry PRIMARY KEY(CountryId)
);


CREATE TABLE Product (
	ProductId varchar(4) NOT NULL,
	
	ProductName varchar(10),
	ProductDescription varchar(10),
	ManufacturerId varchar(4),
	AssemblingId varchar(4),
	ProductType varchar(4) UNIQUE,
	CONSTRAINT pk_Product PRIMARY KEY(ProductId),
	CONSTRAINT fk_Product_ProductCountry FOREIGN KEY (ManufacturerId) references ProductCountry (CountryId) ON DELETE CASCADE,	
	CONSTRAINT fk_Product_ProductCon FOREIGN KEY (AssemblingId) references ProductCountry (CountryId) ON DELETE CASCADE
);



CREATE TABLE Orders(
	PersonId int,
	ProductId varchar(4),
	CONSTRAINT fk_Orders_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT fk_Orders_Product FOREIGN KEY (ProductID) references Product (ProductId) ON DELETE CASCADE
);

CREATE TABLE Feedback(
	FeedbackId varchar(4) NOT NULL,
	Subject varchar(30),
	Heading varchar(30),
	CONSTRAINT pk_Feedback PRIMARY KEY (FeedbackId)

);


CREATE TABLE Gives(
	PersonId int,
	FeedbackId varchar(4),
	CONSTRAINT fk_Gives_Person FOREIGN KEY (PersonID) references Person (PersonId) ON DELETE CASCADE,
	CONSTRAINT fk_Gives_Feedback FOREIGN KEY (FeedbackID) references Feedback (FeedbackId) ON DELETE CASCADE
);



CREATE TABLE ProductType (
	ProductT varchar(4),
	ProductId varchar(4),
	Price int,
	
CONSTRAINT fk_ProductId_Product FOREIGN KEY (ProductId ) references Product (ProductId) ON DELETE CASCADE,
	CONSTRAINT fk_ProductType_Product FOREIGN KEY (ProductT ) references Product (ProductType) ON DELETE CASCADE	

);
	
CREATE TABLE ProductModel(
	ProductId varchar(4),
	Model varchar(4),
	CONSTRAINT fk_ProductModel_Product FOREIGN KEY (ProductId) references Product (ProductId) ON DELETE CASCADE
);


CREATE TABLE Image(
	ImageId  varchar(4) NOT NULL,
	ImageName varchar(10),
	ImagePath varchar(150),
	CONSTRAINT pk_Image PRIMARY KEY (ImageId)
);

CREATE TABLE Keeps(
	ProductId varchar(4),
	ImageId varchar(4),
	CONSTRAINT fk_Keeps_Product FOREIGN KEY (ProductId) references Product (ProductId) ON DELETE CASCADE,
	CONSTRAINT fk_Keeps_Image FOREIGN KEY (ImageId) references Image (ImageId) ON DELETE CASCADE

);


CREATE TABLE Contain(
	ShowroomId varchar(4),
	ProductId varchar(4),
	CONSTRAINT fk_Contain_Product FOREIGN KEY (ProductId) references Product (ProductId) ON DELETE CASCADE,
	CONSTRAINT fk_Contain_Showroom FOREIGN KEY (ShowroomId) references Showroom (ShowroomId) ON DELETE CASCADE
);

CREATE TABLE Sale(
	SaleId varchar(4) NOT NULL,
	OrderDate varchar(10),
	DeliverDate varchar(10),
	CONSTRAINT pk_Sale PRIMARY KEY (SaleId)
);

CREATE TABLE Invoice(
	InvoiceId varchar(4) NOT NULL,
	PurchaseDate varchar(10),
	TotalPrice int,
	ClaimDate varchar(10),
	CONSTRAINT pk_Invoice PRIMARY KEY (InvoiceId)
	
);

CREATE TABLE Get(
	SaleId varchar(4),
	ProductId varchar(4),
	InvoiceId varchar(4),
	CONSTRAINT fk_Get_Product FOREIGN KEY (ProductId) references Product (ProductId) ON DELETE CASCADE,
	CONSTRAINT fk_Get_Sale FOREIGN KEY (SaleId) references Sale (SaleId) ON DELETE CASCADE,
	CONSTRAINT fk_Get_Invoice FOREIGN KEY (InvoiceId) references Invoice (InvoiceId) ON DELETE CASCADE

);





CREATE TABLE Has(
	ProductId varchar(4),
	FeedbackId varchar(4),
	CONSTRAINT fk_Has_Product FOREIGN KEY (ProductId) references Product (ProductId) ON DELETE CASCADE,
	CONSTRAINT fk_Has_Feedback FOREIGN KEY (FeedbackId) references Feedback (FeedbackId) ON DELETE CASCADE

);







'''''''''''''''disable fk


ALTER TABLE Administrator DISABLE CONSTRAINT fk_Administrator_Person;
ALTER TABLE Employee DISABLE CONSTRAINT fk_Employee;
ALTER TABLE Employee DISABLE CONSTRAINT fk_Employee_Person;
ALTER TABLE Customer DISABLE CONSTRAINT fk_Customer_Person;
ALTER TABLE Visits DISABLE CONSTRAINT fk_Visits_Person;
ALTER TABLE Visits DISABLE CONSTRAINT fk_Visits_Showroom;
ALTER TABLE WorksIn DISABLE CONSTRAINT fk_WorksIn_Showrooom;
ALTER TABLE WorksIn DISABLE CONSTRAINT fk_WorksIn_Employee;
ALTER TABLE Orders DISABLE CONSTRAINT fk_Orders_Person;
ALTER TABLE Orders DISABLE CONSTRAINT fk_Orders_Product;
ALTER TABLE Gives DISABLE CONSTRAINT fk_Gives_Person;
ALTER TABLE Gives DISABLE CONSTRAINT fk_Gives_Feedback;
ALTER TABLE Product DISABLE CONSTRAINT fk_Product_ProductCountry;
ALTER TABLE Product DISABLE CONSTRAINT fk_Product_ProductCon;
ALTER TABLE ProductType DISABLE CONSTRAINT fk_ProductType_Product;
ALTER TABLE ProductModel DISABLE CONSTRAINT fk_ProductModel_Product;
ALTER TABLE Keeps DISABLE CONSTRAINT fk_Keeps_Product;
ALTER TABLE Keeps DISABLE CONSTRAINT fk_Keeps_Image;
ALTER TABLE Contain DISABLE CONSTRAINT fk_Contain_Product;
ALTER TABLE Contain DISABLE CONSTRAINT fk_Contain_Showroom;
ALTER TABLE Get DISABLE CONSTRAINT fk_Get_Product;
ALTER TABLE Get DISABLE CONSTRAINT fk_Get_Sale;
ALTER TABLE Get DISABLE CONSTRAINT fk_Get_Invoice;
ALTER TABLE Has DISABLE CONSTRAINT fk_Has_Product;
ALTER TABLE Has DISABLE CONSTRAINT fk_Has_Feedback;


.............insertion 


INSERT INTO Person VALUES (1 , 'Hasan' , 'Anwar_Chowk' , 12314);
INSERT INTO Person VALUES (2 , 'Hamza' , 'Pindi' , 12314);
INSERT INTO Person VALUES (3 , 'Abdullah' , 'Islamabad' , 12314);
INSERT INTO Person VALUES (4 , 'Waqas' , 'karachi' , 12314);
INSERT INTO Person VALUES (5 , 'Ahmed' , 'Lahore' , 12314);
INSERT INTO Person VALUES (6 , 'Ali' , 'Murree' , 12314);
INSERT INTO Person VALUES (7 , 'Ibrar' , 'Lahore' , 12314);
INSERT INTO Person VALUES (8 , 'Talha' , 'Murree' , 12314);
INSERT INTO Person VALUES (9 , 'Hassan' , 'Anwar_Chowk' , 12314);
INSERT INTO Person VALUES (10 , 'Hamzi' , 'Pindi' , 12314);
INSERT INTO Person VALUES (11 , 'Abdul' , 'Islamabad' , 12314);
INSERT INTO Person VALUES (12 , 'Waq' , 'karachi' , 12314);
INSERT INTO Person VALUES (13 , 'Ahmad' , 'Lahore' , 12314);
INSERT INTO Person VALUES (14 , 'Aliya' , 'Murree' , 12314);
INSERT INTO Person VALUES (15 , 'Ibrara' , 'Lahore' , 12314);







INSERT INTO Administrator VALUES (1 , 123);



INSERT INTO Employee VALUES (1 , NULL );
INSERT INTO Employee VALUES (2 , 1  );
INSERT INTO Employee VALUES (3 , 1  );
INSERT INTO Employee VALUES (4,2  );
INSERT INTO Employee VALUES (5, 2  );
INSERT INTO Employee VALUES (6 ,1);
INSERT INTO Employee VALUES (7 , 6 );
INSERT INTO Employee VALUES (8 , 6  );
INSERT INTO Employee VALUES (9,6  );
INSERT INTO Employee VALUES (10, 6  );

INSERT INTO Employee VALUES (11,6  );
INSERT INTO Employee VALUES (12 , 11  );
INSERT INTO Employee VALUES (13 , 11 );
INSERT INTO Employee VALUES (14,11  );
INSERT INTO Employee VALUES (15, 11  );






INSERT INTO Customer VALUES (6, 321  );
INSERT INTO Customer VALUES (7, 234  );
INSERT INTO Customer VALUES (8, 908  );
INSERT INTO Customer VALUES (9, 3211  );
INSERT INTO Customer VALUES (10, 2324  );
INSERT INTO Customer VALUES (11, 9208  );
INSERT INTO Customer VALUES (12, 3421  );
INSERT INTO Customer VALUES (13, 23224  );
INSERT INTO Customer VALUES (14, 9028  );
INSERT INTO Customer VALUES (15, 3121  );





INSERT INTO Showroom VALUES ('S1', 'Hamdard' ,'Anwar', 097009 );
INSERT INTO Showroom VALUES ('S2', 'BUTT' , 'Basti' ,09701 );
INSERT INTO Showroom VALUES ('S3', 'Central' ,'Pindi' ,  09002 );
INSERT INTO Showroom VALUES ('S4', 'Indus' ,'Anwar', 09793 );
INSERT INTO Showroom VALUES ('S5', 'River' , 'Basti' ,09003 );
INSERT INTO Showroom VALUES ('S6', 'GTD' ,'Pindi' ,  090094 );
INSERT INTO Showroom VALUES ('S7', 'GTX' ,'Anwar', 097005 );
INSERT INTO Showroom VALUES ('S8', 'China' , 'Basti' ,09706 );
INSERT INTO Showroom VALUES ('S9', 'USA' ,'Pindi' ,  097007 );
INSERT INTO Showroom VALUES ('S10', 'TT' ,'Anwar', 09789 );




INSERT INTO Visits VALUES (6,'S1' );
INSERT INTO Visits VALUES (7,'S1' );
INSERT INTO Visits VALUES (8,'S2' );
INSERT INTO Visits VALUES (9,'S2' );
INSERT INTO Visits VALUES (10,'S3' );
INSERT INTO Visits VALUES (11,'S3' );
INSERT INTO Visits VALUES (12,'S4' );
INSERT INTO Visits VALUES (13,'S5' );
INSERT INTO Visits VALUES (14,'S6' );
INSERT INTO Visits VALUES (15,'S2' );



INSERT INTO WorksIn VALUES ('S1',1 );
INSERT INTO WorksIn VALUES ('S2',2 );
INSERT INTO WorksIn VALUES ('S2',3 );
INSERT INTO WorksIn VALUES ('S3',4 );
INSERT INTO WorksIn VALUES ('S4',5 );
INSERT INTO WorksIn VALUES ('S5',6 );
INSERT INTO WorksIn VALUES ('S6',7 );
INSERT INTO WorksIn VALUES ('S7',8 );
INSERT INTO WorksIn VALUES ('S8',9 );
INSERT INTO WorksIn VALUES ('S9',10 );
INSERT INTO WorksIn VALUES ('S10',11 );


INSERT INTO ProductCountry VALUES ('C1' , 'USA');
INSERT INTO ProductCountry VALUES ('C2' , 'Pakistan');
INSERT INTO ProductCountry VALUES ('C3' , 'China');
INSERT INTO ProductCountry VALUES ('C4' , 'Japan');

INSERT INTO Product VALUES ('P1', 'City' , 'desdf' , 'C1' , 'C2','Ve1' );
INSERT INTO Product VALUES ('P2', 'City' , 'desdf' , 'C1' , 'C2', 'Ve2' );
INSERT INTO Product VALUES ('P3',  'Honda' , 'desdf' , 'C1' , 'C2','Ve3' );
INSERT INTO Product VALUES ('P4',  'PRIUS' , 'desdf' , 'C1' , 'C2' ,'Ve4');
INSERT INTO Product VALUES ('P5',  'Wheel' , 'desdf' , 'C3' , 'C2','Sp1' );
INSERT INTO Product VALUES ('P6' , 'Nuts' , 'desdf' , 'C3' , 'C2','Sp2' );
INSERT INTO Product VALUES ('P7' , 'Mirror' , 'desdf' , 'C3' , 'C2','Sp3' );
INSERT INTO Product VALUES ('P8', 'Bonet' , 'desdf' , 'C3' , 'C2' ,'Sp4');




INSERT INTO ProductType VALUES ('Ve1' ,'P1',100000);
INSERT INTO ProductType VALUES ('Ve2', 'P2',90000);
INSERT INTO ProductType VALUES ('Ve3', 'P3',800000);
INSERT INTO ProductType VALUES ('Ve4' ,'P4',1000000);
INSERT INTO ProductType VALUES ('Sp1' ,'P5',1000);
INSERT INTO ProductType VALUES ('Sp2' ,'P6',2000);
INSERT INTO ProductType VALUES ('Sp3' ,'P7',1500);
INSERT INTO ProductType VALUES ('Sp4' ,'P8',1700);




INSERT INTO ProductModel VALUES ('P1',2018);
INSERT INTO ProductModel VALUES ('P2',2017);
INSERT INTO ProductModel VALUES ('P3',2016);
INSERT INTO ProductModel VALUES ('P4',2018);
INSERT INTO ProductModel VALUES ('P5',2001);
INSERT INTO ProductModel VALUES ('P6',2002);
INSERT INTO ProductModel VALUES ('P7',2001);
INSERT INTO ProductModel VALUES ('P8',2010);





INSERT INTO Orders VALUES ( 6,'P1');
INSERT INTO Orders VALUES ( 7,'P2');
INSERT INTO Orders VALUES ( 8,'P7');
INSERT INTO Orders VALUES ( 7,'P8');
INSERT INTO Orders VALUES ( 8,'P3');
INSERT INTO Orders VALUES ( 9,'P4');
INSERT INTO Orders VALUES ( 10,'P5');
INSERT INTO Orders VALUES ( 11,'P8');



INSERT INTO Feedback VALUES ( 'F1' , 'Maintaince' , 'Not properly maintian');
INSERT INTO Feedback VALUES ( 'F2' , 'Milage' , 'Fuel boht khati ha');
INSERT INTO Feedback VALUES ( 'F3' , 'Tire Grip' , 'Drift nai lag rahi');
INSERT INTO Feedback VALUES ( 'F4' , 'Maintaince' , 'Not properly maintian');
INSERT INTO Feedback VALUES ( 'F5' , 'Milage' , 'Fuel boht khati ha');
INSERT INTO Feedback VALUES ( 'F6' , 'Tire Grip' , 'Drift nai lag rahi');
INSERT INTO Feedback VALUES ( 'F7' , 'Maintaince' , 'Not properly maintian');
INSERT INTO Feedback VALUES ( 'F8' , 'Milage' , 'Fuel boht khati ha');
INSERT INTO Feedback VALUES ( 'F9' , 'Tire Grip' , 'Drift nai lag rahi');




INSERT INTO Gives VALUES ( 6,'F1');
INSERT INTO Gives VALUES ( 7,'F2');
INSERT INTO Gives VALUES ( 8,'F3');
INSERT INTO Gives VALUES ( 9,'F4');
INSERT INTO Gives VALUES ( 10,'F5');
INSERT INTO Gives VALUES ( 11,'F6');
INSERT INTO Gives VALUES ( 12,'F7');
INSERT INTO Gives VALUES ( 13,'F8');
INSERT INTO Gives VALUES ( 14,'F9');




INSERT INTO Image VALUES ( 'I1' , 'City' , 'wersdf');
INSERT INTO Image VALUES ( 'I2' , 'City' , 'wersdf');
INSERT INTO Image VALUES ( 'I3' , 'Honda' , 'wersdf');
INSERT INTO Image VALUES ( 'I4' , 'Prius' , 'wersdf');
INSERT INTO Image VALUES ( 'I5' , 'Wheel' , 'wersdf');
INSERT INTO Image VALUES ( 'I6' , 'Nuts' , 'wersdf');
INSERT INTO Image VALUES ( 'I7' , 'Mirror' , 'wersdf');
INSERT INTO Image VALUES ( 'I8' , 'Bonet' , 'wersdf');




INSERT INTO Keeps VALUES ('P1' ,'I1' );
INSERT INTO Keeps VALUES ('P2' ,'I2' );
INSERT INTO Keeps VALUES ('P3' ,'I3' );
INSERT INTO Keeps VALUES ('P4' ,'I4' );
INSERT INTO Keeps VALUES ('P5' ,'I5' );
INSERT INTO Keeps VALUES ('P6' ,'I6' );
INSERT INTO Keeps VALUES ('P7' ,'I7' );
INSERT INTO Keeps VALUES ('P8' ,'I8' );



INSERT INTO Contain VALUES ('S1' ,'P1' );
INSERT INTO Contain VALUES ('S1' ,'P2' );
INSERT INTO Contain VALUES ('S1' ,'P3' );
INSERT INTO Contain VALUES ('S2' ,'P1' );
INSERT INTO Contain VALUES ('S2' ,'P4' );
INSERT INTO Contain VALUES ('S2' ,'P2' );
INSERT INTO Contain VALUES ('S3' ,'P5' );
INSERT INTO Contain VALUES ('S3' ,'P6' );
INSERT INTO Contain VALUES ('S3' ,'P7' );
INSERT INTO Contain VALUES ('S3' ,'P8' );






INSERT INTO Sale VALUES ('Sal1' ,'22-1-2019' , '15-2-2019' );
INSERT INTO Sale VALUES ('Sal2' ,'2-5-2019' , '15-6-2019' );
INSERT INTO Sale VALUES ('Sal3' ,'12-8-2019' , '15-9-2019' );
INSERT INTO Sale VALUES ('Sal4' ,'10-11-2019' , '15-11-2019' );
INSERT INTO Sale VALUES ('Sal5' ,'4-10-2019' , '15-11-2019' );
INSERT INTO Sale VALUES ('Sal6' ,'2-1-2019' , '15-2-2019' );
INSERT INTO Sale VALUES ('Sal7' ,'1-5-2019' , '15-6-2019' );
INSERT INTO Sale VALUES ('Sal8' ,'1-8-2019' , '15-9-2019' );
INSERT INTO Sale VALUES ('Sal9' ,'1-11-2019' , '15-11-2019' );






INSERT INTO Invoice VALUES ( 'Inv1', '22-1-2019', 120000,'15-2-2019'  );
INSERT INTO Invoice VALUES ( 'Inv2', '2-5-2019', 200000, '15-6-2019'  );
INSERT INTO Invoice VALUES ( 'Inv3', '12-8-2019', 2000, '15-9-2019'  );
INSERT INTO Invoice VALUES ( 'Inv4', '10-11-2019', 5000, '15-12-2019' );
INSERT INTO Invoice VALUES ( 'Inv5', '4-10-2019', 7000, '15-11-2019'  );
INSERT INTO Invoice VALUES ( 'Inv6', '22-1-2019', 120000,'15-2-2019' );
INSERT INTO Invoice VALUES ( 'Inv7', '2-5-2019', 200000, '15-6-2019'  );
INSERT INTO Invoice VALUES ( 'Inv8', '12-8-2019', 2000, '15-9-2019' );
INSERT INTO Invoice VALUES ( 'Inv9', '10-11-2019', 5000, '15-12-2019' );






INSERT INTO Get VALUES ('Sal1' ,'P1' , 'Inv1' );
INSERT INTO Get VALUES ('Sal2' ,'P2' , 'Inv2' );
INSERT INTO Get VALUES ('Sal3' ,'P4' , 'Inv3' );
INSERT INTO Get VALUES ('Sal4' ,'P5' , 'Inv4' );
INSERT INTO Get VALUES ('Sal5' ,'P8' , 'Inv5' );
INSERT INTO Get VALUES ('Sal7' ,'P8' , 'Inv2' );
INSERT INTO Get VALUES ('Sal9' ,'P3' , 'Inv4' );







INSERT INTO Has VALUES ( 'P1', 'F1' );
INSERT INTO Has VALUES ( 'P2', 'F2' );
INSERT INTO Has VALUES ( 'P4', 'F2' );
INSERT INTO Has VALUES ( 'P5', 'F3' );
INSERT INTO Has VALUES ( 'P6', 'F5' );
INSERT INTO Has VALUES ( 'P7', 'F4' );
INSERT INTO Has VALUES ( 'P8', 'F8' );




'''''''''''''''enable fk
ALTER TABLE Has  ENABLE CONSTRAINT fk_Has_Product;
ALTER TABLE Has  ENABLE CONSTRAINT fk_Has_Feedback;
ALTER TABLE Get ENABLE CONSTRAINT fk_Get_Sale;
ALTER TABLE Get  ENABLE CONSTRAINT fk_Get_Product;
ALTER TABLE Contain  ENABLE CONSTRAINT fk_Contain_Showroom;
ALTER TABLE Contain  ENABLE CONSTRAINT fk_Contain_Product;
ALTER TABLE Keeps ENABLE CONSTRAINT fk_Keeps_Image;
ALTER TABLE Keeps  ENABLE CONSTRAINT fk_Keeps_Product;
ALTER TABLE Gives ENABLE CONSTRAINT fk_Gives_Feedback;
ALTER TABLE Gives ENABLE CONSTRAINT fk_Gives_Person;
ALTER TABLE Orders  ENABLE CONSTRAINT fk_Orders_Product;
ALTER TABLE Orders  ENABLE CONSTRAINT fk_Orders_Person;
ALTER TABLE Product ENABLE CONSTRAINT fk_Product_ProductCountry;
ALTER TABLE Product ENABLE CONSTRAINT fk_Product_ProductCon;
ALTER TABLE ProductModel  ENABLE CONSTRAINT fk_ProductModel_Product;
ALTER TABLE ProductType  ENABLE CONSTRAINT fk_ProductType_Product;
ALTER TABLE WorksIn  ENABLE CONSTRAINT fk_WorksIn_Employee;
ALTER TABLE WorksIn  ENABLE CONSTRAINT fk_WorksIn_Showrooom;
ALTER TABLE Visits  ENABLE CONSTRAINT fk_Visits_Showroom;
ALTER TABLE Visits  ENABLE CONSTRAINT fk_Visits_Person;
ALTER TABLE Customer  ENABLE CONSTRAINT fk_Customer_Person;
ALTER TABLE Employee  ENABLE CONSTRAINT fk_Employee_Person;
ALTER TABLE Employee  ENABLE CONSTRAINT fk_Employee;
ALTER TABLE Administrator ENABLE CONSTRAINT fk_Administrator_Person;




Incase to delete table follow this sequence


drop table get;
drop table invoice;
drop table Sale;
drop table ProductType;
drop table ProductModel;
drop table contain;
drop table Keeps;
drop table gives;
drop table orders;
drop table worksIn;
drop table visits;
drop table image;
drop table showroom;
drop table has;
drop table feedback;
drop table ProductCountry;
drop table product;
drop table customer;
drop table employee;
drop table administrator;
drop table person;




