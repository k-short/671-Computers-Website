create database Project;
use Project;


create table Customer
        (cID        varchar(40),
        cName        varchar(25),
        email        varchar(25),
        phone        varchar (8),
        mailingAddress        varchar(50),
        primary key (cID));


create table Admin
        (aID        varchar(40),
        aName        varchar(25),
        primary key (aID));


create table CreditCard
        (cID                 varchar (10),
        cardNumber         char(16),
        primary key (cardNumber),
        foreign key (cID) references Customer (cID));


create table CreditCardInfo
        (cardNumber        char(16),
        cardType        varchar(10),
        nameOnCard        varchar(25),
        expDate                date,
        billingAddress        varchar(50),
        foreign key (cardNumber) references CreditCard (cardNumber));


-- need to indicate that cID + itemNo is key
-- storType + storSize is foreign key
create table WishListItem
        (cID                varchar(10),
        itemNo                varchar(10),
        dateAdded        date,
        chNumber        varchar(5),
        memSize                int,
        storType        char(11),
        storSize        int,
        foreign key (cID) references Customer(cID),
        foreign key (memSize) references Memory(memSize));


create table Purchase
        (cID                varchar(10),
        purchaseDT                DATETIME,
        purchaseID                varchar(5),
        cardNumber        char(16),
        primary key (purchaseID),
        foreign key (cID) references Customer(cID),
        foreign key (cardNumber) references CreditCard(cardNumber));


-- storSize, storType is two-element foreign key
create table ItemPurchase
        (purchaseID        varchar(5),
        chNumber        varchar(5),
        memSize                int,
        storSize        int,
        storType        char(11),
        price                DECIMAL(7, 2),
        quantity        int,
        purchaseStatus                varchar(10),
        primary key         (purchaseID),
        foreign key        (memSize) references Memory(memSize));


create table Chassis
        (chNumber        varchar(5),
        style                char(6),
        processorSpeed        float,
        measures        float,
        weight                float,
        chPrice                DECIMAL(7, 2),
        maxMem                int,
        maxStor                int,
        hardDrivePossible        int,
        chInventory        int,
        chAlertLevel        int,
        primary key         (chNumber));


-- foreign key for storage
create table DefaultSystem
        (defaultNo        varchar(5),
        chNumber        varchar(5),
        storType        char(11),
        storSize        int,
        memSize                int,
        primary key (defaultNo),
        foreign key (chNumber) references Chassis(chNumber),
        foreign key (memSize) references Memory(memSize));         


create table Memory
        (memSize        int,
        memPrice        DECIMAL(7, 2),
        memInventory        int,
        memAlertLevel        int,
        primary key        (memSize));


create table Storage
        (storSize        int,
        storType        char(11),
        storPrice        DECIMAL(7, 2),
        storInventory        int,
        storAlertLevel        int);


-- create sample customers
insert into Customer values ("12345", "John Smith", "john@smith.com", "555-123", "123 John Street Smithtown NC");
insert into Customer values ("31415", "Pi R. Square", "pi@squaremail.com", "022-0007", "27 Irrational Street Somewhere VA");
insert into Customer values ("112358", "Fib O. Nacci", "bunny@bunnymail.net", "112-3589", "112 Bunny Way \n Athens, Greece");


-- create sample admin
insert into Admin values ("admin-12345", "Mr. Admin");


-- create sample chassises
insert into Chassis values ("L700", "laptop", 2.5, 14, 5, 699.95, 8, 2000, 1, 100, 10);
insert into Chassis values ("H900", "hybrid", 2.2, 12, 3, 895.98, 6, 1600, 1, 20, 2);
insert into Chassis values ("T300", "tablet", 1.2, 8, .2, 280.75, 4, 1000, 0, 50, 5); 




-- create sample default systems
insert into DefaultSystem values ("LD701", "L700", "hard drive", 1600, 4);
insert into DefaultSystem values ("HD900", "H900", "SSD", 800, 3);
insert into DefaultSystem values ("TD300", "T300", "SSD", 500, 2);




-- create sample memories
insert into Memory values (4, 200.00, 500, 50);
insert into Memory values (6, 300.00, 500, 50);
insert into Memory values (8, 400.00, 500, 50);
insert into Memory values (3, 150.00, 500, 50);
insert into Memory values (2, 100.00, 500, 50);
insert into Memory values (16, 800.00, 500, 50);
insert into Memory values (32, 1600.00, 500, 50);

-- create sample storages
insert into Storage values (2000, "SSD", 200.00, 500, 50);
insert into Storage values (2000, "hard drive", 100.00, 500, 50);
insert into Storage values (1600, "SSD", 160.00, 500, 50);
insert into Storage values (1600, "hard drive", 80.00, 500, 50);
insert into Storage values (1000, "SSD", 100.00, 500, 50);
insert into Storage values (1000, "hard drive", 50.00, 500, 50);
insert into Storage values (800, "SSD", 80.00, 500, 50);
insert into Storage values (800, "hard drive", 40.00, 500, 50);
insert into Storage values (500, "SSD", 50.00, 500, 50);
insert into Storage values (500, "hard drive", 25.00, 500, 50);


-- Create view
create view DefaultFullInfo As        
        Select chNumber, style, processorSpeed, measures, weight, chPrice, defaultNo, Storage.storType, Storage.storSize, Memory.memSize, Memory.memPrice, Storage.storPrice
        From (DefaultSystem natural join Chassis natural join Memory), Storage
        Where DefaultSystem.storType=Storage.storType AND DefaultSystem.storSize=Storage.storSize;

select *
from Customer;


select *
from Chassis;


select *
from DefaultSystem;


select *
from Memory;