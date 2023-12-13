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
