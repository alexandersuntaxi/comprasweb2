delete from almacen;
delete from almacena;
delete from compra;
delete from producto;
delete from categoria;
delete from login;
select DISTINCT nombre from producto,almacena where producto.Id_producto=almacena.Id_producto;