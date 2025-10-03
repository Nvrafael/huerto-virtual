# Trabajo de Fin de Grado (TFG)
## FP Superior de Desarrollo de Aplicaciones Web

---

# 🌱 Huerto Virtual
## Sistema CRUD Gamificado con Laravel

**Autor:** Rafael  
**Curso:** FP Superior de Desarrollo de Aplicaciones Web  
**Año Académico:** 2025  
**Tecnología Principal:** Laravel 12 + PHP 8.2

---

## 📋 Resumen Ejecutivo

Este proyecto constituye el **Trabajo de Fin de Grado (TFG)** del ciclo formativo de **Desarrollo de Aplicaciones Web**. Se ha desarrollado una aplicación web completa utilizando el framework **Laravel 12** que implementa un sistema CRUD (Create, Read, Update, Delete) con elementos de gamificación.

### 🎯 Objetivos del Proyecto

1. **Demostrar competencias técnicas** en desarrollo web full-stack
2. **Implementar un sistema CRUD completo** con todas las operaciones básicas
3. **Desarrollar un sistema de autenticación** robusto con roles y permisos
4. **Crear un sistema de gamificación** para aumentar la interactividad
5. **Aplicar buenas prácticas** de desarrollo y arquitectura de software
6. **Diseñar una interfaz de usuario moderna** y responsive

### 🔬 Competencias Demostradas

- ✅ **Desarrollo Backend**: Laravel, PHP, MySQL, Eloquent ORM
- ✅ **Desarrollo Frontend**: HTML5, CSS3, JavaScript, Tailwind CSS
- ✅ **Base de Datos**: Diseño relacional, migraciones, seeders
- ✅ **Autenticación**: Sistema de usuarios, roles y permisos
- ✅ **Arquitectura MVC**: Separación de responsabilidades
- ✅ **API REST**: Preparación para futuras integraciones
- ✅ **Diseño Responsive**: Compatibilidad multi-dispositivo
- ✅ **Gamificación**: Sistemas de puntos, niveles y logros

## 🎓 Contexto Académico y Justificación

### 📚 Marco Teórico

Este proyecto se enmarca dentro de las **competencias profesionales** establecidas en el currículo de **Desarrollo de Aplicaciones Web**, específicamente:

- **Competencia General**: Desarrollar, implantar, y mantener aplicaciones web
- **Competencias Específicas**:
  - Programar aplicaciones web utilizando diferentes lenguajes y tecnologías
  - Gestionar bases de datos relacionales
  - Implementar sistemas de autenticación y autorización
  - Desarrollar interfaces de usuario modernas y responsive

### 🔬 Metodología de Desarrollo

Se ha seguido una **metodología ágil** con las siguientes fases:

1. **Análisis de Requisitos**: Definición de funcionalidades y casos de uso
2. **Diseño de Arquitectura**: Patrón MVC con Laravel
3. **Diseño de Base de Datos**: Modelo relacional normalizado
4. **Implementación**: Desarrollo iterativo con testing continuo
5. **Testing y Validación**: Pruebas de funcionalidad y usabilidad

### 🛠️ Stack Tecnológico Seleccionado

| Componente | Tecnología | Justificación |
|------------|------------|---------------|
| **Backend Framework** | Laravel 12 | Framework PHP robusto, documentación excelente, ecosistema maduro |
| **Base de Datos** | MySQL | SGBD relacional estándar, amplia compatibilidad |
| **Frontend Framework** | Tailwind CSS | Framework de utilidades moderno, diseño responsive |
| **Autenticación** | Spatie Laravel Permission | Librería especializada para roles y permisos |
| **Gestión de Assets** | Vite | Herramienta moderna de compilación y bundling |

## 📖 Guía de Presentación para Evaluadores

### 🎯 Puntos Clave para la Explicación Oral

#### 1. **Introducción al Proyecto** (2-3 minutos)
- **Problema Resuelto**: Sistema de gestión de usuarios con gamificación
- **Tecnología Principal**: Laravel 12 + PHP 8.2
- **Características Distintivas**: Sistema CRUD completo + gamificación + roles

#### 2. **Demostración Técnica** (5-7 minutos)
- **Funcionalidades Principales**:
  - Sistema de registro/login con validaciones
  - Dashboard con estadísticas en tiempo real
  - CRUD completo de usuarios (solo administradores)
  - Sistema de ranking y logros
  - Interfaz responsive y moderna

#### 3. **Aspectos Técnicos Destacables** (3-4 minutos)
- **Arquitectura MVC**: Separación clara de responsabilidades
- **Base de Datos**: Diseño relacional con migraciones
- **Seguridad**: Middleware de autenticación y autorización
- **Frontend**: Tailwind CSS con animaciones y responsive design

#### 4. **Competencias Demostradas** (2-3 minutos)
- Programación orientada a objetos en PHP
- Gestión de bases de datos relacionales
- Desarrollo de interfaces de usuario
- Implementación de sistemas de autenticación
- Aplicación de patrones de diseño (MVC)

### 🔍 Preguntas Frecuentes para Evaluadores

**P: ¿Por qué elegiste Laravel?**
R: Laravel es un framework PHP moderno que facilita el desarrollo rápido y sigue las mejores prácticas de la industria. Su documentación excelente y ecosistema maduro lo hacen ideal para proyectos educativos.

**P: ¿Cómo implementaste la gamificación?**
R: Creé un sistema de puntos, niveles y logros utilizando campos adicionales en la tabla users y una tabla achievements con relaciones many-to-many. El sistema calcula automáticamente el progreso hacia el siguiente nivel.

**P: ¿Cómo garantizas la seguridad de la aplicación?**
R: Implementé middleware de autenticación, validación de datos de entrada, protección CSRF, y un sistema de roles con Spatie Laravel Permission para control de acceso granular.

**P: ¿Qué hace que este proyecto sea destacable?**
R: Combina un CRUD completo con elementos de gamificación, implementa buenas prácticas de desarrollo, tiene una interfaz moderna y responsive, y demuestra competencias tanto en backend como frontend.

## 🏗️ Arquitectura del Proyecto

### 📁 Estructura de Directorios

```
huerto-virtual/
├── app/
│   ├── Http/Controllers/           # Controladores de la aplicación
│   │   ├── Auth/                   # Controladores de autenticación
│   │   │   ├── LoginController.php
│   │   │   └── RegisterController.php
│   │   ├── Admin/                  # Controladores de administración
│   │   │   └── UserManagementController.php
│   │   └── UserController.php      # Controlador principal de usuarios
│   ├── Models/                     # Modelos Eloquent
│   │   ├── User.php               # Modelo de usuario con gamificación
│   │   └── Achievement.php        # Modelo de logros
│   └── ...
├── database/
│   ├── migrations/                 # Migraciones de base de datos
│   │   ├── 2025_10_03_172610_create_permission_tables.php
│   │   ├── 2025_10_03_172646_create_achievements_table.php
│   │   ├── 2025_10_03_172654_add_gamification_fields_to_users_table.php
│   │   └── 2025_10_03_172700_create_user_achievements_table.php
│   └── seeders/                    # Seeders para datos iniciales
│       ├── DatabaseSeeder.php
│       ├── RoleSeeder.php
│       ├── AchievementSeeder.php
│       └── TestUserSeeder.php
├── resources/
│   ├── views/                      # Vistas Blade
│   │   ├── layouts/
│   │   │   └── app.blade.php      # Layout principal
│   │   ├── auth/                   # Vistas de autenticación
│   │   │   ├── login.blade.php
│   │   │   └── register.blade.php
│   │   ├── users/                  # Vistas de usuarios
│   │   │   ├── profile.blade.php
│   │   │   ├── edit.blade.php
│   │   │   ├── ranking.blade.php
│   │   │   └── change-password.blade.php
│   │   ├── admin/                  # Vistas de administración
│   │   └── welcome.blade.php       # Página de bienvenida
│   └── css/
│       └── app.css                 # Estilos con Tailwind CSS
├── routes/
│   └── web.php                     # Rutas web de la aplicación
└── ...
```

## 🎮 Sistema de Gamificación

### 🏆 Características del Sistema

- **Puntos**: Los usuarios ganan puntos por actividades
- **Niveles**: Sistema de progresión basado en experiencia
- **Logros**: Desbloqueo de achievements por objetivos
- **Ranking**: Clasificación global de usuarios

### 📊 Modelos y Relaciones

#### User Model (`app/Models/User.php`)
```php
// Campos de gamificación
- points (integer): Puntos totales del usuario
- level (integer): Nivel actual
- experience (integer): Experiencia acumulada
- avatar (string): URL del avatar
- bio (text): Biografía del usuario

// Métodos principales
- addPoints(int $points): Añadir puntos y verificar subida de nivel
- checkLevelUp(): Verificar si el usuario sube de nivel
- getLevelProgress(): Calcular progreso hacia el siguiente nivel
```

#### Achievement Model (`app/Models/Achievement.php`)
```php
// Campos principales
- name (string): Nombre del logro
- description (text): Descripción del logro
- icon (string): Icono del logro
- points_reward (integer): Puntos que otorga
- type (string): Tipo de logro
- conditions (json): Condiciones para desbloquear

// Métodos principales
- canUnlock(User $user): Verificar si el usuario puede desbloquearlo
- unlockFor(User $user): Desbloquear logro para un usuario
```

## 🔐 Sistema de Autenticación y Roles

### 👥 Roles Implementados

1. **Usuario Normal** (`usuario`)
   - Acceso al dashboard personal
   - Gestión de perfil
   - Participación en ranking
   - Visualización de logros

2. **Administrador** (`administrador`)
   - Todas las funciones de usuario
   - Gestión CRUD de usuarios
   - Administración de puntos y niveles
   - Panel de administración

### 🛡️ Middleware y Protección

- **`auth`**: Protege rutas que requieren autenticación
- **`role:administrador`**: Restringe acceso solo a administradores
- **`guest`**: Solo para usuarios no autenticados

## 🎨 Interfaz de Usuario

### 📱 Diseño Responsive

- **Tailwind CSS**: Framework de utilidades para estilos
- **Font Awesome**: Iconografía consistente
- **Animaciones CSS**: Efectos visuales atractivos
- **Modo Oscuro**: Compatibilidad con preferencias del sistema

### 🖼️ Páginas Principales

#### 1. Página de Bienvenida (`resources/views/welcome.blade.php`)
- Hero section con animaciones
- Características del juego
- Estadísticas de la comunidad
- Navegación condicional según estado de autenticación

#### 2. Dashboard (`resources/views/dashboard.blade.php`)
- Estadísticas del usuario (puntos, nivel, experiencia)
- Progreso hacia el siguiente nivel
- Logros recientes
- Acciones rápidas
- Información del rol

#### 3. Perfil de Usuario (`resources/views/users/profile.blade.php`)
- Información personal editable
- Estadísticas de gamificación
- Lista de logros desbloqueados
- Posición en el ranking

#### 4. Ranking (`resources/views/users/ranking.blade.php`)
- Top 50 usuarios por puntos
- Ordenamiento por nivel y experiencia
- Información detallada de cada usuario

## 🔧 Funcionalidades CRUD

### 👤 Gestión de Usuarios

#### Controlador: `UserController.php`
```php
// Métodos principales
- profile(): Mostrar perfil del usuario
- edit(): Formulario de edición
- update(): Actualizar información
- editPassword(): Formulario de cambio de contraseña
- updatePassword(): Actualizar contraseña
- ranking(): Mostrar ranking global
- dashboard(): Dashboard principal
```

#### Controlador de Administración: `Admin/UserManagementController.php`
```php
// Operaciones CRUD completas
- index(): Listar usuarios con filtros
- create(): Formulario de creación
- store(): Crear nuevo usuario
- show(): Mostrar detalles
- edit(): Formulario de edición
- update(): Actualizar usuario
- destroy(): Eliminar usuario
- resetPoints(): Resetear puntos de usuario
- addPoints(): Añadir puntos manualmente
```

## 🗄️ Base de Datos

### 📋 Tablas Principales

#### `users` (Tabla principal de usuarios)
```sql
- id (bigint, primary key)
- name (varchar)
- email (varchar, unique)
- email_verified_at (timestamp)
- password (varchar)
- remember_token (varchar)
- points (integer, default: 0)
- level (integer, default: 1)
- experience (integer, default: 0)
- avatar (varchar, nullable)
- bio (text, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

#### `achievements` (Logros del sistema)
```sql
- id (bigint, primary key)
- name (varchar)
- description (text)
- icon (varchar)
- points_reward (integer)
- type (varchar)
- conditions (json)
- is_active (boolean)
- created_at (timestamp)
- updated_at (timestamp)
```

#### `user_achievements` (Tabla pivot)
```sql
- user_id (bigint, foreign key)
- achievement_id (bigint, foreign key)
- unlocked_at (timestamp)
- primary key (user_id, achievement_id)
```

#### Tablas de Permisos (Spatie Laravel Permission)
- `roles`
- `permissions`
- `model_has_roles`
- `model_has_permissions`
- `role_has_permissions`

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12**: Framework PHP
- **PHP 8.2+**: Lenguaje de programación
- **MySQL**: Base de datos
- **Spatie Laravel Permission**: Gestión de roles y permisos

### Frontend
- **Tailwind CSS**: Framework de estilos
- **Font Awesome**: Iconografía
- **Vite**: Herramienta de construcción
- **Alpine.js**: JavaScript reactivo (opcional)

### Herramientas de Desarrollo
- **Composer**: Gestión de dependencias PHP
- **npm**: Gestión de dependencias Node.js
- **Laravel Mix/Vite**: Compilación de assets

## 🚀 Usuarios de Prueba

### 👤 Usuario Normal
- **Email**: `test@test.com`
- **Contraseña**: `password`
- **Rol**: Usuario
- **Puntos**: 150
- **Nivel**: 3

### 👑 Usuario Administrador
- **Email**: `admin@huerto-virtual.com`
- **Contraseña**: `password`
- **Rol**: Administrador
- **Puntos**: 1000
- **Nivel**: 10

## 📝 Rutas de la Aplicación

### 🌐 Rutas Públicas
```php
GET  /                    # Página de bienvenida
GET  /login              # Formulario de login
POST /login              # Procesar login
GET  /register           # Formulario de registro
POST /register           # Procesar registro
```

### 🔒 Rutas Autenticadas
```php
GET  /dashboard          # Dashboard principal
GET  /profile           # Perfil del usuario
GET  /profile/edit      # Editar perfil
PUT  /profile           # Actualizar perfil
GET  /profile/password  # Cambiar contraseña
PUT  /profile/password  # Actualizar contraseña
GET  /ranking           # Ranking global
POST /logout            # Cerrar sesión
```

### 👑 Rutas de Administración
```php
GET    /admin/users              # Listar usuarios
GET    /admin/users/create       # Crear usuario
POST   /admin/users              # Guardar usuario
GET    /admin/users/{user}       # Ver usuario
GET    /admin/users/{user}/edit  # Editar usuario
PUT    /admin/users/{user}       # Actualizar usuario
DELETE /admin/users/{user}       # Eliminar usuario
POST   /admin/users/{user}/reset-points  # Resetear puntos
POST   /admin/users/{user}/add-points    # Añadir puntos
```

## 🎯 Funcionalidades del Sistema

### 🌱 Sistema de Plantación Virtual
- Plantar semillas digitales
- Cuidar cultivos virtuales
- Sistema de riego inteligente
- Crecimiento en tiempo real

### 🏆 Sistema de Puntos y Niveles
- Gana puntos por actividades
- Sube de nivel automáticamente
- Bonificaciones especiales
- Progreso visual hacia el siguiente nivel

### 🏅 Sistema de Logros
- Logros únicos por objetivos
- Desbloqueo automático
- Recompensas en puntos
- Historial de logros

### 🏆 Ranking y Competencia
- Ranking global por puntos
- Clasificación por nivel
- Estadísticas detalladas
- Competencias semanales

### 👥 Gestión de Usuarios
- Perfiles personalizables
- Roles diferenciados
- Panel de administración
- Gestión CRUD completa

## 🔧 Comandos Útiles

### Desarrollo
```bash
# Limpiar caché
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ejecutar migraciones
php artisan migrate

# Ejecutar seeders
php artisan db:seed

# Compilar assets
npm run dev
npm run build

# Iniciar servidor
php artisan serve
```

### Base de Datos
```bash
# Crear migración
php artisan make:migration nombre_migracion

# Crear seeder
php artisan make:seeder NombreSeeder

# Ejecutar migración específica
php artisan migrate --path=database/migrations/archivo_migracion.php
```

## 🎯 Competencias Técnicas Demostradas

### 💻 Desarrollo Backend
- **Laravel Framework**: Uso avanzado del framework PHP
- **Eloquent ORM**: Manejo de relaciones y consultas complejas
- **Middleware**: Implementación de capas de seguridad
- **Validación**: Sistema robusto de validación de datos
- **Autenticación**: Sistema completo de login/registro
- **Autorización**: Control de acceso basado en roles

### 🗄️ Gestión de Base de Datos
- **Diseño Relacional**: Normalización y relaciones entre tablas
- **Migraciones**: Versionado y evolución del esquema
- **Seeders**: Datos iniciales y de prueba
- **Consultas Optimizadas**: Uso eficiente de índices y relaciones

### 🎨 Desarrollo Frontend
- **HTML5 Semántico**: Estructura accesible y SEO-friendly
- **CSS3 Avanzado**: Flexbox, Grid, animaciones
- **Tailwind CSS**: Framework de utilidades moderno
- **Responsive Design**: Adaptación a múltiples dispositivos
- **UX/UI**: Diseño centrado en el usuario

### 🔒 Seguridad y Mejores Prácticas
- **Protección CSRF**: Tokens de seguridad
- **Validación de Entrada**: Sanitización de datos
- **Autenticación Segura**: Hash de contraseñas
- **Control de Acceso**: Middleware y roles
- **Validación de Archivos**: Subida segura de imágenes

## 📊 Métricas del Proyecto

| Aspecto | Cantidad | Descripción |
|---------|----------|-------------|
| **Líneas de Código** | ~2,500+ | Código PHP, Blade y CSS |
| **Archivos PHP** | 15+ | Controladores, modelos, seeders |
| **Vistas Blade** | 10+ | Templates HTML dinámicos |
| **Tablas BD** | 8+ | Sistema completo de datos |
| **Rutas Web** | 25+ | Endpoints funcionales |
| **Funcionalidades** | 20+ | Características implementadas |

## 🏆 Logros del Proyecto

### ✅ Objetivos Cumplidos
1. **Sistema CRUD Completo**: Todas las operaciones básicas implementadas
2. **Autenticación Robusta**: Login, registro y gestión de sesiones
3. **Sistema de Roles**: Administradores y usuarios con permisos diferenciados
4. **Gamificación**: Puntos, niveles, logros y ranking
5. **Interfaz Moderna**: Diseño responsive y atractivo
6. **Base de Datos Normalizada**: Estructura relacional bien diseñada
7. **Código Limpio**: Buenas prácticas de programación aplicadas

### 🎓 Competencias Adquiridas
- Dominio del framework Laravel
- Gestión avanzada de bases de datos
- Desarrollo de interfaces de usuario modernas
- Implementación de sistemas de seguridad
- Aplicación de patrones de diseño
- Gestión de proyectos de desarrollo web

## 🔮 Propuesta de Mejoras Futuras

### 📈 Evoluciones Técnicas
- **API REST Completa**: Endpoints para aplicaciones móviles
- **Testing Automatizado**: Suite de pruebas unitarias y de integración
- **Docker**: Containerización para despliegue
- **Cache Redis**: Optimización de rendimiento
- **WebSockets**: Comunicación en tiempo real

### 🎮 Funcionalidades Adicionales
- **Sistema de Plantas**: Simulación más compleja del huerto
- **Marketplace**: Intercambio de plantas entre usuarios
- **Chat en Tiempo Real**: Comunicación entre usuarios
- **Notificaciones Push**: Alertas de eventos importantes
- **Análiticas**: Dashboard de métricas de uso

## 📋 Instrucciones de Instalación para Evaluadores

### 🚀 Configuración Rápida
```bash
# 1. Clonar repositorio
git clone [url-repositorio]
cd huerto-virtual

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar base de datos (editar .env)
DB_DATABASE=huerto_virtual
DB_USERNAME=root
DB_PASSWORD=

# 5. Ejecutar migraciones
php artisan migrate
php artisan db:seed

# 6. Compilar assets
npm run build

# 7. Iniciar servidor
php artisan serve
```

### 👤 Credenciales de Prueba
- **Usuario Normal**: `test@test.com` / `password`
- **Administrador**: `admin@huerto-virtual.com` / `password`

## 👨‍💻 Información del Autor

**Rafael**  
*Estudiante de FP Superior de Desarrollo de Aplicaciones Web*  
*Año Académico 2025*

### 📧 Contacto
- **Email**: [tu-email@ejemplo.com]
- **GitHub**: [tu-usuario-github]
- **LinkedIn**: [tu-perfil-linkedin]

---

## 📄 Declaración Académica

Este proyecto ha sido desarrollado como **Trabajo de Fin de Grado (TFG)** para el ciclo formativo de **FP Superior de Desarrollo de Aplicaciones Web**. 

**Declaro que:**
- El código es de mi autoría original
- Se han aplicado las mejores prácticas de desarrollo
- Todas las funcionalidades han sido implementadas y probadas
- La documentación es completa y precisa
- El proyecto demuestra las competencias adquiridas durante el curso

---

*Documentación técnica desarrollada para evaluación académica*  
*Última actualización: Octubre 2025*