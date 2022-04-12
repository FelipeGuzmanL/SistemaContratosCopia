CREATE TABLE establecimientos(
    establecimiento VARCHAR(40),
    abreviacion VARCHAR(20),
    cod_deis INTEGER PRIMARY KEY
);

CREATE TABLE usuarios(
    nombre VARCHAR(40),
    apellido1 VARCHAR(40),
    apellido2 VARCHAR(40),
    run VARCHAR(10) PRIMARY KEY,
    perfil VARCHAR(40)
);

CREATE TABLE referentes(
    nombre VARCHAR(40),
    apellido1 VARCHAR(40),
    apellido2 VARCAHR(40),
    run VARCHAR(10) PRIMARY KEY,
    perfil VARCHAR(20)
);

CREATE TABLE proveedores(
    proveedores VARCHAR(40),
    rut VARCHAR(10) PRIMARY KEY,
    rep_legal VARCHAR(40),
    run_rep VARCHAR(10),
    direccion_nomb VARCHAR(50),
    direccion_num INT,
    comuna VARCHAR(40),
    region VARCHAR(40)
);

CREATE TABLE convenios(
    id_licitacion VARCHAR(40) PRIMARY KEY,
    convenio TEXT,
    proveedores TEXT,
    referente VARCHAR(40),
    vigencias DATE,
    monto INT,
    administrador VARCHAR(40)
);

CREATE TABLE resolucion_adjudicacion(
    num_res_exenta INT,
    date_make_doc DATE,
    adjudicacion TEXT,
    id_compra VARCHAR(40),
    empresa TEXT,
    rut_empresa VARCHAR(10),
    representante VARCHAR(40),
    rut_representante VARCHAR(10),
    nomb_direc_empresa VARCHAR(50),
    num_direc_empresa INT,
    nomb_direc_rep VARCHAR(50),
    num_direc_rep INT,
    presupuesto INT,
    inicio_contrato DATE,
    termino_contrato DATE,
    valor_multa INT
);

CREATE TABLE aprueba_contrato( --Hereda los datos de la tabla RESOLUCUÓN DE ADJUDICACIÓN, segun flujograma entregado por el cliente.
    num_res_exenta INT,
    date_make_doc DATE,
);

insert into establecimientos(id,created_at,updated_at,establecimiento,abreviacion,codigo_deis) values (1,now(),NULL,'Osorno','OS',123);

INSERT INTO establecimientos(id,created_at,updated_at,establecimiento,abreviacion,codigo_deis) VALUES --Se insertan los establecimientos a la base de datos de forma manual
(1,now(),NULL,'Servicio Salud Osorno','DSSO',123010),
(2,now(),NULL,'Hospital Base San José Osorno','HBSJO',123100),
(3,now(),NULL,'Hospital Futa Sruka Lawenche Kunko Mapu Mo','HFSLKMM',123104),
(4,now(),NULL,'Hospital Purranque','HPU',123101),
(5,now(),NULL,'Hospital Pu Mülen Quilacahuín','HPMQ',123105),
(6,now(),NULL,'Hospital Puerto Octay','HPO',123103),
(7,now(),NULL,'Hospital Río Negro','HRN',123102);

INSERT INTO roles(id,created_at,updated_at,roles) VALUES --Creamos los roles en al base de datos de forma manual
(1,now(),NULL,'Super Administrador'),(2,now(),NULL,'Administrador'),(3,now(),NULL,'Referente');


