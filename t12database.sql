SET FOREIGN_KEY_CHECKS=0;
CREATE TABLE Account (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    creation_date DATE NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    email_address VARCHAR(35) NOT NULL,
    username VARCHAR(20),
    rtype varchar(1)
);

CREATE TABLE Password_Hash (
    id INT NOT NULL PRIMARY KEY,
    Hash VARCHAR(255) NOT NULL,
    FOREIGN KEY (id) REFERENCES Account(id)
);

CREATE TABLE Edit_Permissions_List (
    id INT NOT NULL PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES Account(id)
);

CREATE TABLE Login_Token (
    generated_token VARCHAR(60),
    creation_date DATE,
    id INT NOT NULL,
    FOREIGN KEY (id) REFERENCES Account(id)
);

CREATE TABLE Admin (
    id INT NOT NULL,
    FOREIGN KEY (id) REFERENCES Account(id)
);

CREATE TABLE Driver (
    address VARCHAR(80) NOT NULL,
    id INT NOT NULL PRIMARY KEY,
    sponsored TINYINT(1) NOT NULL,
    incident_count INT NOT NULL,
    points INT NOT NULL,
    FOREIGN KEY (id) REFERENCES Account(id)
);

CREATE TABLE Company (
    company_id INT NOT NULL,
    company_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (company_id)
);

CREATE TABLE Sponsor (
    company_id INT NOT NULL,
    id INT NOT NULL,
    FOREIGN KEY (id) REFERENCES Account(id),
    FOREIGN KEY (company_id) REFERENCES Company(company_id)
);

CREATE TABLE Sponsor_List (
    company_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (company_id) REFERENCES Company(company_id)
);

CREATE TABLE Catalog_List (
    item_id INT NOT NULL,
    FOREIGN KEY (item_id) REFERENCES Item(item_id)
);

CREATE TABLE Black_List (
    driver_id INT NOT NULL,
);

CREATE TABLE Transaction_List (
    transaction_id INT NOT NULL,
    FOREIGN KEY (transaction_id) REFERENCES Single_Transaction(id)
);

CREATE TABLE Item (
    item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(256) NOT NULL,
    item_pic VARCHAR(256) NOT NULL,
    item_cost DECIMAL(10,2) NOT NULL,
    item_category VARCHAR(100),
    item_count INT NOT NULL
);

CREATE TABLE Single_Transaction (
    user_id VARCHAR(60) NOT NULL,
    item_id INT NOT NULL,
    id INT NOT NULL,
    cost INT NOT NULL,
    order_status VARCHAR(15) NOT NULL,
    order_date DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (item_id) REFERENCES Item(item_id),
    FOREIGN KEY (id) REFERENCES Driver(id)
);

CREATE TABLE Sponsor_Keys(

    driver_id INT NOT NULL,
    sponsor_id INT NOT NULL

);

CREATE TABLE msg(
    username varchar(20),
    notice varchar(255)
);

SET FOREIGN_KEY_CHECKS=1;