# Limage Beauty Salon & Supply

## Descripción del Proyecto

Este proyecto es una aplicación web diseñada para un salón de belleza, proporcionando una plataforma integral tanto para clientes como para administradores. La aplicación ofrece las siguientes funcionalidades:

### Funcionalidades para Clientes

1. **Landing Page**: Una página de inicio atractiva e informativa que presenta los servicios y promociones del salón de belleza.
2. **Agendamiento de Citas**: Los clientes pueden ver la disponibilidad y agendar citas en línea de manera fácil y rápida.

### Funcionalidades para Administradores

1. **Gestión de Citas**: Los administradores pueden ver, editar y gestionar todas las citas agendadas por los clientes.
2. **Reportes Financieros**: Generación de reportes financieros detallados para ayudar en la toma de decisiones y el análisis de rendimiento del negocio.
3. **Registro de Transacciones**: Registro y seguimiento de todas las transacciones financieras realizadas en el salón.
4. **Administración de Promociones**: Crear, editar y publicar promociones para atraer y retener clientes.

Esta aplicación está construida con Laravel 11 y utiliza Vite para la gestión de activos, ofreciendo una experiencia de usuario fluida y rápida. El sistema de autenticación asegura que solo usuarios autorizados puedan acceder a las funcionalidades administrativas, manteniendo la seguridad y confidencialidad de la información.

## Requisitos

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL o cualquier otra base de datos soportada por Laravel

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/ramxv/limage-webapp.git
    ```

2. Cambia al directorio del proyecto:

    ```bash
    cd limage-webapp
    ```

3. Instala las dependencias de Composer:

    ```bash
    composer install
    ```

4. Instala las dependencias de npm:

    ```bash
    npm install
    ```

5. Copia el archivo de entorno:

    ```bash
    cp .env.example .env
    ```

6. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

7. Configura tu archivo `.env` con las credenciales de tu base de datos.

8. Ejecuta las migraciones en orden:

   ```bash
   php artisan migrate:reset
   ```

    Ejecuta las migraciones en el siguiente orden para evitar conflictos con claves foráneas:

- Crear `tipos_tx`

  ```bash
   # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000000_create_tipos_tx_table.php
  ```

- Crear `empleados`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000001_create_empleados_table.php
  ```

- Crear `servicio`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000002_create_servicio_table.php
  ```

- Crear `forma_pago`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000003_create_forma_pago_table.php
  ```

- Crear `proveedores`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000004_create_proveedores_table.php
  ```

- Crear `clientes`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000005_create_clientes_table.php
  ```

- Crear `productos`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000006_create_productos_table.php
  ```

- Crear `transaccion`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000007_create_transaccion_table.php
  ```

- Crear `registro_tx_empleados`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000008_create_registro_tx_empleados_table.php
  ```

- Crear `agendar_cita`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000009_create_agendar_cita_table.php
  ```

- Crear `reporte_financiero`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000010_create_reporte_financiero_table.php
  ```

- Crear `comprobante_digital`

  ```bash
  # Copia el path relativo del archivo de migración y pégalo aquí:
  php artisan migrate --path=/database/migrations/2024_06_22_000011_create_comprobante_digital_table.php
  ```

9. Ejecuta Vite para el desarrollo:

    ```bash
    npm run dev
    ```

10. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

## Creación de Ramas

Para mantener un flujo de trabajo organizado, seguiremos estas reglas al crear ramas:

1. **Rama Principal (`main`)**:
    - La rama principal que siempre debe estar en un estado de producción estable.

2. **Rama de Desarrollo (`develop`)**:
    - La rama principal para el desarrollo. Todas las nuevas características y correcciones deben fusionarse aquí primero.

3. **Ramas de Características (`feature/<nombre-de-la-caracteristica>`)**:
    - Usa ramas de características para desarrollar nuevas funcionalidades.
    - Crea una nueva rama desde `develop`:

        ```bash
        git checkout develop
        git pull origin develop
        git checkout -b feature/<nombre-de-la-caracteristica>
        ```

    - Cuando termines, fusiona la rama de características de nuevo a `develop`.

4. **Ramas de Corrección de Errores (`bugfix/<descripcion-del-error>`)**:
    - Usa ramas de corrección de errores para solucionar problemas.
    - Crea una nueva rama desde `develop`:

        ```bash
        git checkout develop
        git pull origin develop
        git checkout -b bugfix/<descripcion-del-error>
        ```

    - Cuando termines, fusiona la rama de corrección de errores de nuevo a `develop`.

5. **Ramas de Hotfix (`hotfix/<descripcion-del-hotfix>`)**:
    - Usa ramas de hotfix para solucionar problemas críticos en producción.
    - Crea una nueva rama desde `main`:

        ```bash
        git checkout main
        git pull origin main
        git checkout -b hotfix/<descripcion-del-hotfix>
        ```

    - Cuando termines, fusiona la rama de hotfix de nuevo a `main` y `develop`.

## Convenciones para Commits

Para mantener un historial de commits claro y consistente, seguiremos estas reglas:

1. **Formato de Mensajes de Commit**:
    - Usa el siguiente formato para los mensajes de commit:

      ```
      <tipo>(<área>): <descripción corta>
      ```

    - Tipos comunes:
        - `feat`: Una nueva característica
        - `fix`: Una corrección de error
        - `docs`: Cambios en la documentación
        - `style`: Cambios que no afectan la lógica del código (espacios en blanco, formato, etc.)
        - `refactor`: Cambios en el código que no corrigen errores ni añaden características
        - `test`: Añadir o corregir tests
        - `chore`: Actualizaciones de tareas de construcción o configuraciones auxiliares

2. **Ejemplos de Mensajes de Commit**:
    - Añadir una nueva característica:

      ```
      feat(auth): añadir funcionalidad de inicio de sesión con OAuth
      ```

    - Corregir un error:

      ```
      fix(api): corregir error en la ruta de actualización de usuario
      ```

3. **Commits Atómicos**:
    - Haz commits pequeños y atómicos que hagan un solo cambio claro.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.
