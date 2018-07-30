create database DIYdatabase;

use DIYdatabase;


create table if not exists `Crop` (
	`crop_Id` int(20) not null auto_increment,
    `crop_Name` varchar(50) not null,
    `min_Hum` varchar(20) not null,
    `max_Hum` varchar(20) not null,
    `min_Temp` varchar(20) not null,
    `max_Temp` varchar(20) not null,
    `min_PH` varchar(20) not null,
	`max_PH` varchar(20) not null,
primary key (`crop_Id`),
unique key (`crop_Id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

Insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values ('Tomato','30','45','15','32','6','7'); 
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Potatoes','50','85','7','27','5.8','6.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Rice’','50','85','7','27','5.8','6.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Lady Finger','50','85','7','27','5.8','6.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Corn','25','38','25','35','5.8','6.8');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Sun flower','20','40','22','28','6','7.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Pea Nuts','25','38','25','35','5.0','7.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Grapres','30','40','25','40','5.5','6.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Spinach','70','80','22','30','6.0','7.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Pea','50','60','12','22','6.0','7.5');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Chilli pepper','28','36','21','38','5.5','7');
insert into Crop (cropName,minHum,maxHum,minTemp,maxTemp,minPH,maxPH) values('Cucumber','22','39','25','28','6.0','7.0');



create table if not exists `farmer` (
	`Farmer_id` int(11) not null auto_increment,
    `F_name` varchar(70) not null,
    `Mobile_No` varchar(13) not null,
    `Password` varchar(20) not null,
primary key (`Farmer_id`),
unique key (`Mobile_No`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


create table `pH_Test` (
	`Ph_Test_id` int(11) not null auto_increment,
    `c_id` int(11) not null,
    `pH_value` varchar(50) not null,
primary key (`Ph_Test_id`),
     FOREIGN KEY (`c_id`) REFERENCES `farmer`(`Farmer_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


create table if not exists `Climatic_Test` (
	`Clim_Test_id` int(11) not null auto_increment,
     `c_id` int(11) not null,
    `Humidity` varchar(50) not null,
    `Temperature` varchar(50) not null,
    `Moisture` varchar(50) not null,
    `Light` varchar(50) not null,
primary key (`Clim_Test_id`),
    FOREIGN KEY (`c_id`) REFERENCES `farmer`(`Farmer_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
