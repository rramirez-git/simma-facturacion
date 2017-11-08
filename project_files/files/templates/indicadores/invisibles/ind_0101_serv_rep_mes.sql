# Servicios Reportados Este Mes
# Barras

SELECT 'Total' AS Item,COUNT(DISTINCT idmanifiesto,idgenerador,fecha) AS Cantidad
FROM manifiesto AS man INNER JOIN relgenman USING(idmanifiesto) INNER JOIN generador AS gen USING(idgenerador)
__WHR__ AND YEAR(man.fecha) = YEAR(CURDATE()) AND MONTH(man.fecha) = MONTH(CURDATE())
	AND ((motivo IS NOT NULL AND motivo != '') OR idmanifiesto IN (SELECT idmanifiesto FROM relmanrec))
ORDER BY Cantidad DESC