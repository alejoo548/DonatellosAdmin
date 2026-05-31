# Donatellos Admin Panel

Donatellos Admin Panel es una plataforma de administración web diseñada específicamente para gestionar el catálogo (categorías y productos) de la aplicación de Donatello's. Proporciona una interfaz gráfica premium, oscura (Dark Mode) y con estética neón que incluye funcionalidades modernas de UI como *Dropify* para arrastrar y soltar imágenes de forma amigable.

## 🚀 Tecnologías Utilizadas

El proyecto está construido sobre un stack robusto y moderno, dockerizado para un despliegue sin fricciones.

### Backend
- **PHP 8.4**
- **Laravel 11.x**: Framework PHP principal.
- **Base de Datos**: MySQL (conectado a través de una red externa de Docker a un servicio de BD).
- **Seguridad Antivirus en Imágenes**: Validación "Magic Bytes" de Mimetypes nativa y un escáner Polyglot a nivel binario para evitar inyección de código PHP en metadatos de imágenes (`.jpg`, `.png`, `.gif`, `.webp`).

### Frontend
- **Blade Templates**: Motor de plantillas nativo de Laravel.
- **Bootstrap 5 + CSS Custom**: Estructura de la UI con un fuerte tema oscuro (Dark Theme) personalizado (`custom-dark-theme.css`) utilizando esquemas de colores vibrantes y efectos *glassmorphism*.
- **Vite & Tailwind CSS**: Compilador de assets.
- **Dropify**: Implementado con estilo "Dark" para la previsualización y carga arrastrar/soltar de imágenes.
- **Iconify (Solar Icons)**: Para la iconografía dinámica.
- **Google Fonts (Outfit)**: Tipografía principal de alta calidad.

### Infraestructura
- **Docker & Docker Compose**: Configuración en contenedores para correr la aplicación sin necesidad de instalar dependencias locales en tu máquina.
- **Apache2**: Servidor web principal incrustado en el contenedor PHP.

---

## 💻 Guía de Instalación y Ejecución con Docker

Sigue estos pasos para descargar y levantar el proyecto de cero en cualquier computadora.

### Requisitos Previos
1. Tener [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo en tu computadora.
2. Tener [Git](https://git-scm.com/) instalado.
3. Asegurarte de que el puerto `8000` de tu máquina esté libre.

### 1. Clonar el repositorio
Abre tu terminal (o consola de comandos) y ejecuta:
```bash
git clone <URL_DE_TU_REPOSITORIO>
cd DrugStore
```

### 2. Configurar la Red Externa de Base de Datos
El proyecto asume que existe una red de Docker y un contenedor MySQL externo de donde toma la base de datos (por la configuración en `docker-compose.yml`). Para que el contenedor pueda iniciar sin errores, debes crear primero esa red:
```bash
docker network create backend_default
```

### 3. Construir y Levantar los Contenedores
Dentro de la carpeta raíz del proyecto clonado, levanta la aplicación. Este comando descargará Node, PHP, Composer y compilará automáticamente todos los archivos estáticos y dependencias de PHP.

```bash
docker compose up -d --build
```

### 4. Configurar Base de Datos (Opcional si ya la red externa tiene los datos)
Si es la primera vez que levantas la aplicación y la base de datos MySQL (host: `donatellos_mysql`) ya está conectada a la red, debes correr las migraciones:
```bash
docker compose exec app php artisan migrate
```

### 5. Acceder al Panel
Abre tu navegador de preferencia y visita:
[http://localhost:8000](http://localhost:8000)

¡Listo! Verás la pantalla de inicio de sesión de Donatellos Admin.
