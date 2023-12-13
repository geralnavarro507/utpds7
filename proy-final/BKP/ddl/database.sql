create table usuarios(
    id smallint(5) unsigned not null auto_increment,
    usuario varchar(20) not null default '',
    clave varchar(20) not null default '',
    primary key (id)
);

insert into usuarios values (1,'admin','admin');


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