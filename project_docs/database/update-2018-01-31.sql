INSERT INTO `reporte` (`idreporte`, `titulo`, `descripcion`, `categoria`, `plantilla`, `sql`, `parametros`) VALUES
(8, 'Captura de Manifiestos', 'Captura de Manifiestos con base en la fecha de captura y el capturista', 'Manifiestos', 'rep_captura_manifiestos.xlsx', 
'select \n	DATE_FORMAT( m.fecha_captura,''%d/%m/%Y %H:%i'') as Fecha_Captura,\n	m.identificador as Manifiesto,\n    m.capturista as Capturista,\n    sum( r.cantidad ) as Cantidad\nfrom manifiesto m\n	inner join relmanrec using( idmanifiesto )\n    inner join recoleccion r using( idrecoleccion )\n__WHR__\ngroup by m.idmanifiesto\norder by m.fecha_captura', 
'[{\r\n	"parametro": "fecha_captura_inicio",\r\n	"campo": "m.fecha_captura",\r\n	"tipo": "date",\r\n	"etiqueta": "Fecha Inicial",\r\n	"default": "_HOY_",\r\n	"operador": ">="\r\n},\r\n{\r\n	"parametro": "fecha_captura_final",\r\n	"campo": "m.fecha_captura",\r\n	"tipo": "date",\r\n	"etiqueta": "Fecha Final",\r\n	"default": "_HOY_+365",\r\n	"operador": "<="\r\n},\r\n{\r\n	"parametro": "capturista",\r\n	"campo": "m.capturista",\r\n	"tipo": "text",\r\n	"etiqueta": "Capturista",\r\n	"default": "",\r\n	"operador": "like"\r\n}]');

INSERT INTO `permiso` (`idpermiso`, `nombre`, `descripcion`, `permisopadre`) VALUES
(128, 'Reporte de Captura', 'Reporte de Captura de manifiestos', 101);

INSERT INTO `relpermperf` (`idpermiso`, `idperfil`) VALUES
(128, 1),
(128, 3),
(128, 4),
(128, 5),
(128, 6),
(128, 8);