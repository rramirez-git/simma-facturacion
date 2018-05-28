ALTER TABLE `recoleccion` CHANGE `cantidad` `cantidad` DECIMAL(10,3) NULL;

ALTER TABLE `recoleccion` ADD `cantidad_unidad` DECIMAL(10,3) NULL ;

ALTER TABLE `residuo` ADD `mostrar_default` BOOLEAN NULL DEFAULT FALSE ;

select * from residuo where nom052 like 'bi%';

UPDATE residuo SET tiporesiduo = 98, mostrar_default = 1 WHERE nom052 like 'bi%';

insert into catalogodet values ( 161, 'XVL | Contenedor para líquidos a granel' );
insert into relcatcatdet values ( 17, 161 );

/*
unidad	desc			new_und	desc
  null					121		E48 | Unidad de servicio
     0					121		E48 | Unidad de servicio
   145	Kilogramo		156		58 | Kilogramo neto, después de las deducciones
   146	Metro Cúbico	120		MTQ | Metro cúbico
   147	Contenedor		161		XVL | Contenedor para líquidos a granel
   148	Tambo			158		XDR | Tambor
*/
-- To DO

update facturacion set unidad = 121 where unidad = 0 or unidad is null;
update facturacion set unidad = 156 where unidad = 145;
update facturacion set unidad = 120 where unidad = 146;
update facturacion set unidad = 161 where unidad = 147;
update facturacion set unidad = 158 where unidad = 148;
update recoleccion set unidad = 156 where unidad = 'kg';
update recoleccion set cantidad_unidad = cantidad;
delete from relpermperf where idpermiso in (select idpermiso from permiso where nombre like '%import%');


