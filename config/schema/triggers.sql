/*===== tabla articulo_precios=====*/
/*===== trigger que se ejecuta en la tabla articulo_precios y actualiza la tabla articulos-info para el control del stock =====*/
CREATE TRIGGER `insert_existencia_articulos_ap` AFTER INSERT ON `articulo_precios`
 FOR EACH ROW begin
	INSERT INTO articulos_info(deposito_id, articulo_id, lista_precio_id,articulo_precio_id) values(NEW.deposito_id, NEW.articulo_id, NEW.lista_precio_id,NEW.id);
END;
/* ======= end articulo_precios ========*/


/*===== tabla ingresos=====*/
/*===== trigger que se ejecuta en la tabla ingresos y actualiza la tabla ingresos_detalle =====*/
CREATE TRIGGER `update_ingreso_detalle_after_infert` AFTER INSERT ON `ingresos`
 FOR EACH ROW begin
	IF new.estado=1 THEN
	 update ingresos_detalle set deposito_id=new.deposito_id, estado=1 where ingreso_id=new.id;
	END IF;
END;

CREATE TRIGGER `update_ingreso_detalle_after_update` AFTER UPDATE ON `ingresos`
 FOR EACH ROW begin
	IF new.estado = 1 THEN
	 update ingresos_detalle set deposito_id=new.deposito_id, estado=1 where ingreso_id=new.id;
	END IF;
END;
/* ======= end ingresos ========*/


/*===== tabla ingresos_detalle=====*/
/*===== trigger que se ejecuta en la tabla ingresos_detalle y actualiza la tabla articulos-info para el control del stock =====*/
CREATE TRIGGER `update_existencia_articulos_after_insert` AFTER INSERT ON `ingresos_detalle`
 FOR EACH ROW begin
	IF new.estado = 1 THEN
	 update articulos_info set existencia=(existencia+new.cantidad), disponible=(disponible+new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
	END IF;
END;

CREATE TRIGGER `update_existencia_articulos_after_update` AFTER UPDATE ON `ingresos_detalle`
 FOR EACH ROW begin 
	 IF new.estado = 1 THEN 
		update articulos_info set existencia=(existencia+new.cantidad), disponible=(disponible+new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
	 END IF; 
END;
/* ======= end ingresos_detalle ========*/

/*===== tabla guias =====*/
/*===== trigger que se ejecuta en la tabla guias y actualiza la tabla guias_detalle =====*/
CREATE TRIGGER `update_guia_detalle_after_infert` AFTER INSERT ON `guias`
 FOR EACH ROW begin
	IF new.estado=1 THEN
	 update guias_detalle set deposito_id=new.deposito_id, estado=1 where guia_id=new.id;
	END IF;
END;

CREATE TRIGGER `update_guia_detalle_after_update` AFTER UPDATE ON `guias`
 FOR EACH ROW begin
	IF new.estado=1 THEN
	 update guias_detalle set deposito_id=new.deposito_id, estado=1 where guia_id=new.id;
	END IF;
END;
/*======= end guias ========*/


/*===== tabla ventas=====*/
/*===== trigger que se ejecuta en la tabla ventas y actualiza el correlativo de la serie de documentos =====*/
CREATE TRIGGER `update_numero_documento_venta` BEFORE INSERT ON `ventas`
 FOR EACH ROW begin
 update docseries set numero=numero+1 where id=new.docserie_id;
end;
/*======= end ventas ========*/


/*===== tabla compras=====*/
/*===== trigger que se ejecuta en la tabla compras y actualiza el la orden de compra compra_id =====*/
CREATE TRIGGER `update_orden_compra_after_infert` AFTER INSERT ON `compras`
 FOR EACH ROW begin
 if new.orden_compra_id then
 	update orden_compras set estado=2, compra_id=new.id where id=new.orden_compra_id;
 end if;
end;
/*======= end compras ========*/


/*===== tabla orden ventas detalle=====*/
/*===== trigger que se ejecuta en la tabla orden_ventas_detalle y actualiza la existencia y reserva productos si la orden es 1=Orden Estándar =====*/
CREATE TRIGGER `actualiza_existencia_articulos_after_insert_orden_estandar` AFTER INSERT ON `orden_ventas_detalle`
 FOR EACH ROW begin
	if new.estado=1 then
		update articulos_info set reservada=(reservada+new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
    end if;
end;

CREATE TRIGGER `actualiza_existencia_articulos_after_update_orden_estandar` AFTER UPDATE ON `orden_ventas_detalle`
 FOR EACH ROW begin
	if new.estado=1 then
		update articulos_info set reservada=(reservada+new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
    end if;
end;
/*======= end orden ventas detalle ========*/
