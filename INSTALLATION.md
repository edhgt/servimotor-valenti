# Instalación y configuración de una aplicación Laravel

## 1. Clonar el proyecto

Clonar el repositorio y entrar al directorio:

```bash
git clone https://github.com/edhgt/servimotor-valenti
cd servimotor-valenti
```

---

## 2. Instalar las dependencias de PHP

Instalar las dependencias definidas en `composer.json`:

```bash
composer install
```

> Si el proyecto ya tiene un `composer.lock`, se recomienda utilizar `composer install` en lugar de `composer update`, para instalar exactamente las versiones utilizadas por el proyecto.

---

## 3. Crear el archivo `.env`

Copiar el archivo de configuración de ejemplo:

```bash
cp .env.example .env
```

En Windows CMD:

```cmd
copy .env.example .env
```

En PowerShell:

```powershell
Copy-Item .env.example .env
```

---

## 4. Configurar las variables de entorno

Abrir el archivo `.env`:

```bash
nano .env
```

o utilizar el editor de código correspondiente.

Configurar la conexión a la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

Por ejemplo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=servimotor_valenti
DB_USERNAME=root
DB_PASSWORD=
```

> Los valores de `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` deben corresponder a una base de datos que exista y a un usuario que tenga permisos sobre ella.

---

## 5. Crear la base de datos

Crear la base de datos utilizando MySQL/MariaDB, phpMyAdmin, Docker u otra herramienta.

Por ejemplo, desde MySQL:

```sql
CREATE DATABASE servimotor_valenti
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Luego verificar que los datos configurados en `.env` sean correctos.

---

## 6. Generar la clave de Laravel

Ejecutar:

```bash
php artisan key:generate
```

Esto generará automáticamente el valor de `APP_KEY` en el archivo `.env`.

Se debería obtener algo similar a:

```env
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

No es necesario generar esta clave manualmente.

---

## 7. Ejecutar las migraciones

Crear las tablas definidas por las migraciones:

```bash
php artisan migrate
```

Si el proyecto incluye seeders y se necesita cargar datos iniciales:

```bash
php artisan db:seed
```

O ejecutar migraciones y seeders juntos:

```bash
php artisan migrate --seed
```

### Si se necesita reconstruir completamente la base de datos

En un entorno de desarrollo, si se puede eliminar toda la información existente:

```bash
php artisan migrate:fresh --seed
```

> **Precaución:** `migrate:fresh` elimina todas las tablas de la base de datos y vuelve a crearlas. No utilizarlo en producción salvo que se tenga plena certeza de sus consecuencias.

---

## 8. Crear el enlace simbólico de Storage

Si la aplicación utiliza archivos almacenados públicamente:

```bash
php artisan storage:link
```

Esto crea el enlace:

```text
public/storage -> storage/app/public
```

---

## 9. Limpiar y reconstruir las cachés

Después de configurar el `.env`, es recomendable limpiar las cachés de Laravel:

```bash
php artisan optimize:clear
```

En versiones/proyectos donde sea necesario, también se pueden ejecutar:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 10. Instalar las dependencias de frontend

Si el proyecto tiene `package.json`, instalar las dependencias de Node:

```bash
npm install
```

Para desarrollo:

```bash
npm run dev
```

Para generar los assets de producción:

```bash
npm run build
```

Dependiendo del proyecto, puede utilizarse otro gestor como `yarn` o `pnpm`.

---

## 11. Iniciar el servidor de Laravel

Para levantar la aplicación localmente:

```bash
php artisan serve
```

Por defecto estará disponible en:

```text
http://127.0.0.1:8000
```

Si se necesita especificar host y puerto:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

---

# Procedimiento resumido

Para una instalación típica, el flujo sería:

```bash
# 1. Clonar
git clone <URL_DEL_REPOSITORIO>
cd <NOMBRE_DEL_PROYECTO>

# 2. Dependencias PHP
composer install

# 3. Crear .env
cp .env.example .env

# 4. Configurar .env
# DB_DATABASE=...
# DB_USERNAME=...
# DB_PASSWORD=...

# 5. Generar APP_KEY
php artisan key:generate

# 6. Ejecutar migraciones
php artisan migrate

# 7. Ejecutar seeders si aplica
php artisan db:seed

# 8. Crear enlace de storage
php artisan storage:link

# 9. Limpiar cachés
php artisan optimize:clear

# 10. Dependencias frontend, si aplica
npm install

# 11. Compilar frontend
npm run build

# 12. Levantar aplicación
php artisan serve
```

## Checklist de instalación

Antes de considerar terminada la instalación, verificar:

* [ ] El repositorio fue clonado correctamente.
* [ ] `composer install` terminó sin errores.
* [ ] Existe el archivo `.env`.
* [ ] `APP_KEY` fue generado.
* [ ] La base de datos existe.
* [ ] Las variables `DB_*` están correctamente configuradas.
* [ ] `php artisan migrate` terminó correctamente.
* [ ] Los seeders fueron ejecutados si son necesarios.
* [ ] `php artisan storage:link` fue ejecutado si la aplicación utiliza archivos públicos.
* [ ] Las dependencias de Node fueron instaladas si el proyecto tiene frontend.
* [ ] Los assets fueron compilados.
* [ ] La aplicación abre correctamente con `php artisan serve`.

## Comandos útiles para verificar la instalación

Verificar la versión de Laravel:

```bash
php artisan --version
```

Verificar el estado de las migraciones:

```bash
php artisan migrate:status
```

Verificar las rutas:

```bash
php artisan route:list
```

Verificar que PHP y Composer estén disponibles:

```bash
php -v
composer --version
```

Verificar Node y npm:

```bash
node -v
npm -v
```

Si todo está correctamente configurado, la aplicación debería estar lista para ejecutarse localmente.
