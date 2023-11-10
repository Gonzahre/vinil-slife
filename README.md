# Índice

- [Colección Vinilos](#colección-vinilos)
  - [Obtener datos de la colección (métodos GET)](#obtener-datos-de-la-colección-métodos-get)
  - [Otros métodos (POST, PUT, DELETE)](#otros-métodos-post-put-delete)

- [Colección Autores](#colección-autores)
  - [Obtener datos de la colección (métodos GET)](#obtener-datos-de-la-colección-métodos-get-1)
  - [Otros métodos (POST, PUT, DELETE)](#otros-métodos-post-put-delete-1)


# Colección Vinilos

Esta documentación describe las operaciones disponibles para gestionar una colección de vinilos a través de una API.

## Obtener datos de la colección (métodos GET)

### Obtener todos los vinilos
- **Método:** GET
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos
- **Descripción:** Obtiene todos los vinilos en la colección.

### Obtener un vinilo específico
- **Método:** GET
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos/{id}
- **Descripción:** Obtiene un vinilo específico por su ID.

### Obtener vinilos con paginación
- **Método:** GET
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos/paginacion
- **Descripción:** Obtiene los vinilos con paginación para una navegación más fácil.

### Obtener vinilos ordenados por campos
- **Método:** GET
- **Ruta:**  localhost/(Nombre de la carpeta)/api/vinilos/ordenar/(nombre de columna a ordenar)?order=(asc o desc)
- **Descripción:** Obtiene los vinilos ordenados según campos específicos.

### Obtener vinilos con filtros
- **Método:** GET
- **Ruta:**  localhost/(Nombre de la carpeta)/api/vinilos/filtro?(nombre de columna a filtrar)=(Valor deseado para esa columna)
- **Descripción:** Obtiene vinilos que coincidan con ciertos criterios de filtrado.

## Otros métodos (POST, PUT, DELETE)

### Agregar un nuevo vinilo
- **Método:** POST
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos
- **Descripción:** Agrega un nuevo vinilo a la colección.

### Actualizar un vinilo existente
- **Método:** PUT
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos/{id}
- **Descripción:** Actualiza la información de un vinilo existente.

### Eliminar un vinilo
- **Método:** DELETE
- **Ruta:** localhost/(Nombre de la carpeta)/api/vinilos/{id}
- **Descripción:** Elimina un vinilo de la colección por su ID.

## Ejemplo de solicitud (POST):

http
POST /vinilos
Content-Type: application/json

{
"imagen": "a",
"nombreDisco": "Pipes of Peace2",
"fechaDisco": 1983,
"genero":"pop",
"idAutor":5
}
# Colección Autores

Esta documentación describe las operaciones disponibles para gestionar una colección de autores a través de una API.

## Obtener datos de la colección (métodos GET)

### Obtener todos los autores
- **Método:** GET
- **Ruta:** /autores
- **Descripción:** Obtiene todos los autores en la colección.

### Obtener un autor específico
- **Método:** GET
- **Ruta:** /autores/{id}
- **Descripción:** Obtiene un autor específico por su ID.

### Obtener autores con paginación
- **Método:** GET
- **Ruta:** /autores/paginacion
- **Descripción:** Obtiene los autores con paginación para una navegación más fácil.

### Obtener autores ordenados por campos
- **Método:** GET
- **Ruta:** /autores/ordenar
- **Descripción:** Obtiene los autores ordenados según campos específicos.

### Obtener autores con filtros
- **Método:** GET
- **Ruta:** /autores/filtrar
- **Descripción:** Obtiene autores que coincidan con ciertos criterios de filtrado.

## Otros métodos (POST, PUT, DELETE)

### Agregar un nuevo autor
- **Método:** POST
- **Ruta:** /autores
- **Descripción:** Agrega un nuevo autor a la colección.

### Actualizar un autor existente
- **Método:** PUT
- **Ruta:** /autores/{id}
- **Descripción:** Actualiza la información de un autor existente.

### Eliminar un autor
- **Método:** DELETE
- **Ruta:** /autores/{id}
- **Descripción:** Elimina un autor de la colección por su ID.

## Ejemplo de solicitud (POST):

http
POST /autores
Content-Type: application/json

{
    "nombre": "Nombre del autor",
    "nacionalidad": "Nacionalidad del autor",
    "nacimiento": "Fecha de nacimiento"
}

# Autenticación de la API
En la pestaña "Authorization", seleccionar Basic Auth e ingresar las credenciales almacenadas en la base de datos. Si el ingreso es valido, devolverá un token:"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwibmFtZSI6IkFkbWluIiwiZXhwIjoxNjk5NTgxNTA5fQ.DdRyq_De4l_sLFVtE2bomBnq62WIivDRKpBRwrvDxsU"

Este token deberá ser ingresado en la pestaña Authorization en la sección "Bearer Token" al ejecutar un metodo POST, PUT o DELETE
