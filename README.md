# proyecto-tienda
Proyecto backend de ecommerce online / PHP

Proyecto Tienda Online - UP! Estudio Store
Descripción del Proyecto
Este proyecto es una tienda online completa desarrollada con PHP y MySQL/MariaDB, diseñada para la comercialización de productos de belleza y moda. El sistema incluye:

Catálogo de productos con imágenes

Panel de administración (CRUD)

Sistema de filtrado por categorías y marcas

Integración con WhatsApp para compras

Carrito de compras básico

Características principales
Frontend
Interfaz responsive con Bootstrap 5

Galería de productos con carrusel de imágenes

Filtros por categoría y marca

Botones de compra directa vía WhatsApp

Modo oscuro/claro (toggle implementado)

Backend
Sistema CRUD completo (Crear, Leer, Actualizar, Eliminar)

Gestión de productos con múltiples imágenes

Autenticación básica para el panel de administración

Validación de formularios

Subida segura de archivos

Entorno de Desarrollo
Servidor local: XAMPP

Base de datos: MariaDB (administrada mediante phpMyAdmin)

Lenguajes: PHP, HTML, CSS, JavaScript

Framework CSS: Bootstrap 5

Estructura del Proyecto
proyecto-tienda/
├── admin/
│   ├── agregar.php         # Formulario para añadir productos
│   ├── borrar.php          # Lógica para eliminar productos
│   ├── editar.php          # Formulario para editar productos
│   └── listar.php          # Listado de productos para administración
├── filtros/
│   ├── filtro-dapop.php    # Filtro por marca Dapop
│   ├── filtro-iwoo.php     # Filtro por marca I'Woo
│   └── ...                 # Más filtros por marca
├── categorias/
│   ├── accesorios.php      # Filtro por categoría Accesorios
│   ├── cejas.php           # Filtro por categoría Cejas
│   └── ...                 # Más filtros por categoría
├── includes/               # Archivos compartidos
├── uploads/                # Carpeta para imágenes subidas
├── index.php               # Página principal
├── login.html              # Sistema de autenticación básico
├── admin.php               # Panel de administración
└── productos.php           # Vista detallada de productos
Requisitos del Sistema
Servidor web con PHP (≥7.4 recomendado)

MariaDB/MySQL

phpMyAdmin (opcional pero recomendado)

Extensiones PHP: mysqli, fileinfo

Configuración Inicial
Clonar el repositorio:

bash
git clone https://github.com/Etiketaa/proyecto-tienda.git
Importar la base de datos:

Crear una base de datos llamada c2640463_upestu en phpMyAdmin

Importar la estructura desde el archivo SQL proporcionado

Configurar conexión a la base de datos:

Editar los archivos PHP que contienen mysqli_connect() con tus credenciales

Asegurar permisos de escritura en la carpeta uploads/

Personalización
El sistema puede extenderse fácilmente para:

Añadir filtros por rango de precios

Implementar un sistema de usuarios completo

Integrar pasarelas de pago

Añadir sistema de valoraciones

Implementar búsqueda avanzada

Notas importantes
El sistema de login actual utiliza autenticación básica y debería reforzarse para entornos de producción

Se recomienda implementar medidas de seguridad adicionales como:

Prepared statements para todas las consultas SQL

Validación más estricta de archivos subidos

Protección contra CSRF

Contribución
Las contribuciones son bienvenidas. Por favor, abre un issue o envía un pull request al repositorio en GitHub.

Licencia
Este proyecto está disponible bajo la licencia MIT. Consulta el archivo LICENSE para más información.

Nota: Este proyecto fue desarrollado como parte de un trabajo práctico y puede requerir ajustes para su implementación en producción.
