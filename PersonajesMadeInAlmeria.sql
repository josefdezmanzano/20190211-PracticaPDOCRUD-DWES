-- creamos la tabla personajes --
CREATE TABLE personajes (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    biografia varchar(255),
    categoria varchar(50),    
    wanted varchar(2),
    foto varchar(255)
); 
-- datos 
insert into personajes(nombre, apellidos,biografia,categoria,wanted,foto) values ('Moises','La mente pensante','Despues de ganar saber y ganar y pasapalabra desparecio inesperademente, puede que por culpa de jessica pozo','GRANDES SABIOS','SI','img/avatares/moises.jpg');

insert into personajes(nombre, apellidos,biografia,categoria,wanted,foto) values ('Juan','Salmero 14.88','Despues de surcar los montes del destino para tirar el anillo junto con antonio, discutiendo sobre las napolitanas del lidl; desaparecio por un tiempo hasta que se le volvio a ver en 2 de DAW. Pero ahora, Ande andara.','TRAMBOLICOS CON UN CORITO SANO','SI','img/avatares/juan.jpg');

insert into personajes(nombre, apellidos,biografia,categoria,wanted,foto) values ('Jose Abel','El delator','Buscado en 7 paises por chivato, culpable de la desaparicion de moises por haberle dicho a jessica pozo el paradero de moises, Altamente peligroso no le digas ni tu nombre o te delatará','DELATORES','SI','img/avatares/joseabel.jpeg');

insert into personajes(nombre, apellidos,biografia,categoria,wanted,foto) values ('Jessica Pozo','La mas peligrosa de todos sin duda, despues de hackear la nasa y ser culpable de la desaparicion de Moises, nadie sabe su paradero actual. En busca y captura por la INTERPOL','CIBERCRIMINALES','SI','img/avatares/jessica.jpg');

