CREATE DATABASE IF NOT EXISTS examen_ud2;
USE examen_ud2;

CREATE TABLE IF NOT EXISTS alumnos(
    dni CHAR(9) PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    apellido1 VARCHAR(30) NOT NULL,
    apellido2 VARCHAR(30),
    email VARCHAR(320) UNIQUE NOT NULL,
    contrasena CHAR(40) NOT NULL
);
DELETE FROM alumnos;
INSERT INTO alumnos(dni, nombre, apellido1, apellido2, email, contrasena)
VALUES ('10001563J','ABEL','SANCHEZ','ARGUELLES','asanchez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10018115M','PAULA','CAN','CALVO','pcan@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10018536N','MARIA BEGOÑA','VILA','GRANDA','mbvila@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10029811V','GABRIEL','ROMERO','GIL','gromero@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10040463C','SAMUEL','GIL','DIEZ','sgil@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10046877V','JOSE JAVIER','NUÑEZ','LAGO','jjnunez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10064295R','IRINA','RIVAS','RODRIGUEZ','irivas@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10068251R','ALBERTO','ALVAREZ','LOPES','aalvarez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10096315M','ANA ISABEL','NUÑEZ','TORRES','ainunez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10096657W','GABRIELA','PEREZ','TORRES','gperez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10102951V','JAIME','PAZ','PILSUSKI','jpaz@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10110421N','LOIS','REY','CASTRO','lrey@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10111963J','MARIA FERNANDA','MOSQUERA','DE TODOS LOS SANTOS','mfmosquera@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10117840W','GUILLERMO','NOCELO','MARIÑO','gnocelo@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10122815D','JULIA','FERREIRO','GARRIDO','jferreiro@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10125036E','HECTOR','COMESAÑA','PENA','hcomesana@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10130374R','MARTIÑO','PINTOS','GOMEZ','mpintos@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10130566D','BLANCA','GONZALEZ','VEIGA','bgonzalez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10137089T','JESUS','BURLIDO','SANTOS','jburlido@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10159406F','ABEL','NUÑEZ','ARIAS','anunez2@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10159712Z','MARCO','VILA','VIDAL','mvila2@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10163577S','FATIMA','CARRERA','VILA','fcarrera@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10165071Z','MARIA ANGELES','PARENTE','NOVAL','maparente@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10175614T','LUCAS','RIVAS','BOI','lrivas@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10176073E','MUSTAPHA','ESTEVEZ','PEREZ','mestevez@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10177831D','ABRAHAM','CARDOSO','DURAN','acardoso@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10185195J','JOAQUINA','PIÑEIRO','VELLO','jpineiro@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10185368W','MARIA LOURDES','IRAGO','NUÑEZ','mlirago@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('10194782D','SERGIO','LAGO','PRADO','slago@edu.gal','6367c48dd193d56ea7b0baad25b19455e529f5ee');