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

update reporte set plantilla = concat( substr( plantilla, 1, length( plantilla ) - 4 ), 'csv' );

ALTER TABLE `cfdi_comprobante` DROP FOREIGN KEY fk_cfdi_comprobante_manifiesto1;
ALTER TABLE `cfdi_comprobante` DROP INDEX `fk_cfdi_comprobante_manifiesto1_idx`;
ALTER TABLE `cfdi_comprobante` CHANGE `idmanifiesto` `idcliente` BIGINT UNSIGNED NOT NULL;
ALTER TABLE `cfdi_comprobante` ADD INDEX `idx_cte_cfdi_1` (`idcliente`);
DELETE FROM cfdi_comprobante;
ALTER TABLE `cfdi_comprobante` ADD FOREIGN KEY `fk_cte_cfdi_1`( idcliente ) REFERENCES cliente( idcliente ) ON DELETE RESTRICT ON UPDATE RESTRICT;

create or replace view opciones_gv as select idopcion as idopciones, idcatalogo, opcion, catalogo as lbl_catalogo from v_catalogo;
create or replace view catalogo_gv as select idcatalogo, descripcion as nombre from catalogo;

ALTER TABLE `cfdi_concepto_impuestos` ADD `tasaocuota` DECIMAL(7,3) NOT NULL ;


