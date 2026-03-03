-- ==========================================
-- MyMoney - SQLite Schema
-- ==========================================

CREATE TABLE direccion (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    pais TEXT NOT NULL,
    departamento TEXT NOT NULL,
    ciudad TEXT NOT NULL,
    calle TEXT,
    numero TEXT,
    referencia TEXT
);

CREATE TABLE infoPersonal (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    apellido TEXT NOT NULL,
    fechaNacimiento DATE,
    genero TEXT CHECK(genero IN ('Masculino','Femenino','Otro')),
    telefono TEXT,
    email TEXT,
    tipoDocumento TEXT CHECK(tipoDocumento IN ('CC','CE','Pasaporte','Otro')),
    numeroDocumento TEXT,
    direccionId INTEGER REFERENCES direccion(id)
);

CREATE TABLE usuario (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT NOT NULL DEFAULT 'user',
    infoPersonalId INTEGER NOT NULL REFERENCES infoPersonal(id)
);

CREATE TABLE categoriasFinanzas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    descripcion TEXT,
    userId INTEGER NOT NULL REFERENCES usuario(id)
);

CREATE TABLE categoriasContactos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    descripcion TEXT,
    userId INTEGER NOT NULL REFERENCES usuario(id)
);

CREATE TABLE contactos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    userId INTEGER NOT NULL REFERENCES usuario(id),
    infoPersonalId INTEGER NOT NULL REFERENCES infoPersonal(id),
    categoriaId INTEGER REFERENCES categoriasContactos(id)
);

CREATE TABLE transaccion (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    monto REAL NOT NULL,
    categoriaId INTEGER REFERENCES categoriasFinanzas(id),
    fecha DATE NOT NULL,
    tipo TEXT NOT NULL CHECK(tipo IN ('Gasto','Ingreso','Deuda','AporteMeta','Salario')),
    userId INTEGER NOT NULL REFERENCES usuario(id)
);

CREATE TABLE gastos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaccionId INTEGER NOT NULL UNIQUE REFERENCES transaccion(id),
    tipo TEXT NOT NULL CHECK(tipo IN ('Fijo','Variable','Diario'))
);

CREATE TABLE deudas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaccionId INTEGER NOT NULL UNIQUE REFERENCES transaccion(id),
    fechaLimite DATE,
    deudorId INTEGER REFERENCES contactos(id),
    tipo TEXT NOT NULL CHECK(tipo IN ('Propia','Ajena')),
    estado TEXT NOT NULL DEFAULT 'Pendiente' CHECK(estado IN ('Pendiente','Pagada','Vencida'))
);

CREATE TABLE ingresos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaccionId INTEGER NOT NULL UNIQUE REFERENCES transaccion(id),
    tipo TEXT NOT NULL CHECK(tipo IN ('Extra','Deuda','Otro'))
);

CREATE TABLE metas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    descripcion TEXT,
    montoObjetivo REAL NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE,
    userId INTEGER NOT NULL REFERENCES usuario(id)
);

CREATE TABLE aporteMeta (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaccionId INTEGER NOT NULL UNIQUE REFERENCES transaccion(id),
    metaId INTEGER NOT NULL REFERENCES metas(id)
);

CREATE TABLE salarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    empresa TEXT NOT NULL,
    fechaLimite DATE NOT NULL,
    estado TEXT NOT NULL DEFAULT 'Pendiente' CHECK(estado IN ('Pendiente','Pagado','Vencido')),
    userId INTEGER NOT NULL REFERENCES usuario(id)
);

CREATE TABLE pagoSalario (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    salarioId INTEGER NOT NULL REFERENCES salarios(id),
    transaccionId INTEGER NOT NULL UNIQUE REFERENCES transaccion(id)
);