SELECT * FROM VENTAS v
INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote
INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
WHERE m.IdManzana = 'M07';
