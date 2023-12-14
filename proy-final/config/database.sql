create table usuarios(
    id smallint(5) unsigned not null auto_increment,
    usuario varchar(20) not null default '',
    clave varchar(20) not null default '',
    primary key (id)
);

insert into usuarios values (1,'testuser','teXB5LK3JWG6g');


create definer=root@localhost procedure sp_validar_usuario (
    in param_user varchar(255),
    in param_pass varchar(255)
)
begin
  set @s = concat("select count(*) from usuarios
                   where usuario = '", param_user,"' and clave = '", param_pass,"'");
   prepare stmt from @s;
   execute stmt;
   deallocate prepare stmt;
end;   


create table departamento(
    id smallint(5) unsigned not null auto_increment,
    descripcion varchar(20) not null default '',
    primary key (id)
);

create table empleado(
    id smallint(5) unsigned not null auto_increment,
    nombre varchar(20) not null default '',
    departamento smallint(5) unsigned not null,
    primary key (id),
    foreign key (departamento) references departamento(id) 
);

create table turno(
    id smallint(5) unsigned not null auto_increment,
    descripcion varchar(20) not null default '',
    hora_inicia time,
    hora_termina time,
    primary key (id)
);

create table horario(
    fecha date,
    turno smallint(5) unsigned not null,
    empleado smallint(5) unsigned not null,
    primary key (fecha,turno,empleado),
    foreign key (turno) references turno(id) ,
    foreign key (empleado) references empleado(id) 
);

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_departamentos_crud$$
create definer=root@localhost procedure sp_departamentos_crud (
    in param_crud varchar(1),
    in param_codigo varchar(255),
    in param_descipcion varchar(255)
)
begin

  if param_crud = 'C' then
    set @s = concat("insert into departamento(descripcion)values('",param_descipcion,"')");
  else
    if param_crud = 'R' then
        set @s = concat("select id,descripcion from departamento where id like if('",param_codigo,"'='','%','",param_codigo,"') and descripcion like if('",param_descipcion,"'='','%','",param_descipcion,"')");
    else
      if param_crud = 'U' then
        set @s = concat("update departamento set descripcion = '",param_descipcion,"' where id = '",param_codigo,"'");
      else
        set @s = concat("delete from departamento where id = '",param_codigo,"'");
      end if;
    end if;
  end if;
  prepare stmt from @s;
  execute stmt;
  deallocate prepare stmt;

END $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_empleados_crud$$
create definer=root@localhost procedure sp_empleados_crud (
    in param_crud varchar(1),
    in param_codigo varchar(255),
    in param_descipcion varchar(255),
    in departamento varchar(3)
)
begin

  if param_crud = 'C' then
    set @s = concat("insert into empleado(nombre)values('",param_descipcion,"')");
  else
    if param_crud = 'R' then
        set @s = concat("select id,nombre from empleado where id like if('",param_codigo,"'='','%','",param_codigo,"') and nombre like if('",param_descipcion,"'='','%','",param_descipcion,"')");
    else
      if param_crud = 'U' then
        set @s = concat("update empleado set nombre = '",param_descipcion,"' where id = '",param_codigo,"'");
      else
        set @s = concat("delete from empleado where id = '",param_codigo,"'");
      end if;
    end if;
  end if;
  prepare stmt from @s;
  execute stmt;
  deallocate prepare stmt;

END



DELIMITER $$
DROP PROCEDURE IF EXISTS sp_horarios_crud$$
create definer=root@localhost procedure sp_horarios_crud (
    in param_crud varchar(1),
    in param_codigo varchar(255),
    in param_descipcion varchar(255)
)
begin

  if param_crud = 'C' then
    set @s = concat("insert into turno(turno)values('",param_descipcion,"')");
  else
    if param_crud = 'R' then
        set @s = concat("select id,descripcion from turno where id like if('",param_codigo,"'='','%','",param_codigo,"') and descripcion like if('",param_descipcion,"'='','%','",param_descipcion,"')");
    else
      if param_crud = 'U' then
        set @s = concat("update turno set descripcion = '",param_descipcion,"' where id = '",param_codigo,"'");
      else
        set @s = concat("delete from turno where id = '",param_codigo,"'");
      end if;
    end if;
  end if;
  prepare stmt from @s;
  execute stmt;
  deallocate prepare stmt;

END



DELIMITER $$
DROP PROCEDURE IF EXISTS sp_planificador_crud$$
create definer=root@localhost procedure sp_planificador_crud (
    in param_anio varchar(5),
    in param_mes varchar(2),
    in param_crud varchar(1)
)
begin
  DECLARE LV_EMPLEADO int(2);
  DECLARE LV_TURNO int(2);
  DECLARE LV_FECHA DATE;

  DECLARE var_final INTEGER DEFAULT 0;
  DECLARE cursor1 CURSOR FOR 
  select a.Date,(select id from turno where id = 1)turno,(select id from empleado where id = 1)empleado
  from (
      select last_day(concat(param_anio,'-',param_mes,'-01')) - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
      from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
      cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
      cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
  ) a 
  where a.Date between concat(param_anio,'-',param_mes,'-01') and last_day(concat(param_anio,'-',param_mes,'-01')) order by a.Date;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET var_final = 1;

  if param_crud = 'C' then

delete from horario;
commit work;

    OPEN cursor1;

    bucle: LOOP

      FETCH cursor1 INTO LV_FECHA,LV_TURNO,LV_EMPLEADO;

      IF var_final = 1 THEN
        LEAVE bucle;
      END IF;

       INSERT INTO horario(fecha,turno,empleado)
                   VALUES(LV_FECHA,LV_TURNO,LV_EMPLEADO);

    END LOOP bucle;
    CLOSE cursor1;
  
    COMMIT WORK;
    select 
max(case when dayofweek(h.fecha)=1 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia1,
max(case when dayofweek(h.fecha)=2 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia2,
max(case when dayofweek(h.fecha)=3 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia3,
max(case when dayofweek(h.fecha)=4 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia4,
max(case when dayofweek(h.fecha)=5 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia5,
max(case when dayofweek(h.fecha)=6 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia6,
max(case when dayofweek(h.fecha)=7 then concat(h.fecha,' - Turno: ',t.descripcion) end) dia7,
d.descripcion departamento,e.nombre empleado,
week(h.fecha)semana
from horario h,turno t ,empleado e, departamento d
where h.turno = t.id
and   h.empleado = e.id
and   e.departamento = d.id
group by week(h.fecha),d.descripcion,e.nombre;
/*
select concat(h.fecha,' - Turno: ',t.descripcion)fecha, d.descripcion departamento,e.nombre empleado
from horario h,turno t ,empleado e, departamento d
where h.turno = t.id
and   h.empleado = e.id
and   e.departamento = d.id;
*/
  else
    set @s = concat("delete from horario");
      prepare stmt from @s;
  execute stmt;
  deallocate prepare stmt;
  end if;


END


