Demo-php
========

Un pequeño demo de php

//TABLA llamada

CREATE TABLE IF NOT EXISTS `llamada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anexo` varchar(4) NOT NULL,
  `fecha` datetime NOT NULL,
  `movil` int(9) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


//STORED PROCEDURE

/*Procedimiento almacenado para las llmadas del tablet*/
DELIMITER $$
CREATE PROCEDURE Sp_llamada
(
in aid int(11),
in aanexo VARCHAR(4),
in afecha DATETIME,
in amovil int(9),
in aconsulta VARCHAR(500),
in arespuesta VARCHAR(500)
)
if exists(select * from woo.llamada where id=aid) then
	update woo.llamada
		set
			anexo=aanexo,
			fecha=afecha,
			movil=amovil,
			consulta=aconsulta,
			respuesta=arespuesta
			where id=aid;
else
	insert into woo.llamada(
		anexo,fecha,movil,consulta,respuesta)
		values(
				aanexo,
				afecha,
				amovil,
				aconsulta,
				arespuesta);
END IF $$
DELIMITER ;


//
